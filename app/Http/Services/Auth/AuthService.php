<?php
namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;
use App\Models\Verifier;

use Carbon\Carbon;
use Cookie;

class AuthService {

    protected function dataToValidate(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'firstname' => 'nullable',
            'lastname' => 'nullable',
            'othername' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable|confirmed', 
            'phone' => 'nullable',
            'email' => 'nullable',
            'avatar' => 'nullable',
            'gender' => 'nullable',
            'plan' => 'nullable',
            'DOB' => 'nullable|date'  
		]);
        return $validator;
    }

    protected function emailDataValidation(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => 'email|required',
		]);
        return $validator;
    }

    protected function passwordResetDataValidation(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required',
		]);
        return $validator;
    }

    protected function regDataToValidate(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:8',
            'role' => 'required'
		]);
        return $validator;
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);        

        if (!auth()->attempt($loginData)) {
            return ['status' => 501, 'error' => 'Invalid Credentials'];
        }
        $accessToken = auth()->user()->createToken('accessToken')->accessToken;
        $user = User::find(auth()->user()->id);
        
        $user->accessToken = $accessToken;
        $user->save();
        return ['status' => 200, 'user' => auth()->user(), 'access_token' => $accessToken];
    }

    public function register(Request $request){
        $regData = $this->regDataToValidate($request);

        if ($regData->fails()){
            return ['status' => 501, 'error' => $regData->errors()->all()];
        } else {
            $findUser = User::where('email', $request->email)->get();
            
            if(count($findUser) < 1){
                $input = $regData->validated();
                $input['password'] = Hash::make($request->password);
                $user = User::create($input);

                $accessToken = $user->createToken('accessToken')->accessToken;

                return ['status' => 200, 'user' => $user, 'access_token' => $accessToken];
            } else {
                return ['status' => 501, 'error' => 'An account with this detail exists.'];
            }
        }
    }

    public function updateEmailValidation($id){
        $user = new User();
        $userDetails = $user->where('id', $id)->first();

        if (!empty($userDetails)) {
            $now = Carbon::now()->timestamp;
            $updateUser = $userDetails->update(['email_verified_at' => $now]);
            if ($updateUser == true){
                return ['status' => 200, 'user' => $updateUser];
            }
        } else {
            return ['status' => 404, 'error'=>'Not Found'];
        }
    }

    public function verifyUserEmail($request){
        $data = $this->emailDataValidation($request);
        if ($data->fails()){
            return response()->json(['errors' => $data->errors()->all()]);
        } else {
            $input = $data->validated();
            $userVerified = $this->confirmEmail($input['email']);

            if($userVerified == 200){//verified
                $otp = $this->genOTP();
                return ['status' => 200, 'otp' => $otp];
                // TODO: mail OTP to $input['email']
                
                // Create verifier Mode, Migration and save otp against email
            } else {//!verified
                return ['status' => 404, 'error' => 'User with this email not found.'];
            }
        }        
    }

    public function verifyEmailForRegistration($request){
        $data = $this->emailDataValidation($request);
        if ($data->fails()){
            return response()->json(['errors' => $data->errors()->all()]);
        } else {
            $input = $data->validated();
            $userVerified = $this->confirmEmail($input['email']);

            if($userVerified == 404){//verified that email doesnt exist
                $otp = $this->genOTP();
                $crypted = Crypt::encryptString($otp);
                $this->maileOTP($input['email'], $otp);
                
                return ['status' => 200, 'otp' => $crypted];
            } else {//!verified
                return ['status' => 404, 'error' => 'Account with this email exists.'];
            }
        }        
    }

    public function resetPassword($request){
        $data = $this->passwordResetDataValidation($request);
        if ($data->fails()){
            return ['status' => 501, 'error' => $data->errors()->all()];
        } else {
            $input = $data->validated();
            $verifyUserEmail = $this->confirmEmail($input['email']);

            if($verifyUserEmail['status'] == 200){//verified
                $encryptedPass = bcrypt($request->password);
                $updateUser = $verifyUserEmail['user']->update(['password' => $encryptedPass]);
                if ($updateUser == true){
                    return ['status' => 200, 'msg' => 'Password successfully reset.'];
                }
            } else {//!verified
                return ['status' => 404, 'error' => 'User with this email not found.'];
            }
        }  
    }

    public function sendOtpForUserResetPassword($request){
        $data = $this->emailDataValidation($request);
        if ($data->fails()){
            return ['status' => 501, 'error' => $regData->errors()->all()];
        } else {
            $input = $data->validated();
            $verifyUserEmail = $this->confirmEmail($input['email']);
            if($verifyUserEmail['status'] == 200){//verified
                $otp = $this->genOTP();
                // TODO: Store  the OTP in a verifier TB
                $verifier = new Verifier();
                $existingUserVerifier = $verifier->where('user_id', $verifyUserEmail['user']->id)->first();
                $this->maileOTP($input['email'], $otp);
                if ($existingUserVerifier == null) {
                    return $this->createVerifier($verifier, $verifyUserEmail['user']->id, $otp);
                }
                else {
                    return $this->createVerifier($existingUserVerifier, $existingUserVerifier->id, $otp);
                }

                return ['status' => 200, 'message' => 'OTP sent to '.$input['email']];
            } else {//!verified
                return ['status' => 404, 'error' => 'This email does not exist.'];
            }
        }  
    }

    private function createVerifier ($verifier, $user_id, $otp) {
        $verifier->user_id = $user_id;
        $verifier->otp = $otp;
        $verifier->expiry = Carbon::now()->addMinutes(60);
        $verifier->save();
        
        return ['status' => 200, 'message' => 'OTP Verified'];
    }

    private function confirmEmail($email){
        $user = new User();
        $userEmail = $user->where('email', $email)->first();

        if (!empty($userEmail)) {
            return ['user' => $userEmail, 'status' => 200];
        } else {
            return 404;
        }
    }

    public function verifyOtPs (Request $request) {
        $veriferData = $request->validate([
            'email' => 'email|required',
            'otp' => 'required'
        ]);
        $userIdToVerify = User::where('email', $request->email)->first();
        $verifier = new Verifier();
        $checker = $verifier->where([['otp', $request->otp], ['user_id', $userIdToVerify->id]])->first();
        if (!empty($checker)) {
            return ['message' => 'OTP Verified', 'status' => 200];
        }
        else {
            return ['message' => 'OTP mismatch', 'status' => 404];
        }
    }

    private function update($request, $id){
        $data = $this->dataToValidate($request);
        if ($data->fails()){
            return response()->json(['errors' => $data->errors()->all()]);
        } else {
            $input = $data->validated();
            $user = new User();
            $userDetails = $user->where('id', $id)->first();

            if (!empty($userDetails)) {
                $updateUser = $userDetails->update($input);
                if ($updateUser == true){
                    return ['status' => 200, 'user' => $updateUser];
                }
            }
            else return ['status' => 404, 'error'=>'Not Found'];
        }
    }

    private function genOTP(){
        return sprintf("%06d", mt_rand(1, 999999));
    }

    private function maileOTP($email, $otp) {
        //  Get the $email and $otp generated
        (new User)->forceFill([
            'otp' => $otp,
            'email' => $email,
        ])->notify(new MailOTP($otp));
    }

    /**
     * This function request for old password in order to change to new one
     */
    public function changePassword(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];
        $user = Auth::user();
        if ($user) {
            // dd($request->oldPass, $user->password);
            $password = $user->password;
            $old_pass = $request->oldPass;
            if (Hash::check($old_pass, $password)) {
                // The passwords match...
                $data = $request->password;
                
                $newPass = $request->user()->fill([
                    'password' => Hash::make($data)
                ])->save();
                return [
                    'user' => $newPass,
                    'message' => 'Password Changed Successfully'
                ];
            }
            else {
                return ['error' => $status];
            }
        }
        else {
            return response()->json($response);
        }
    }

    public function check_password () {
        $user = Auth::user();
        if ($user) {
            if (Hash::check($user->email, $user->password)) {
                return ['status' => 401, 'message' => 'Update password'];
            }
            else {
                return ['status' => 200, 'message' => 'Ok'];
            }
        }
    }
}