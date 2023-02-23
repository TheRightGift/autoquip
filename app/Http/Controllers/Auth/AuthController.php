<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function getstarted(){
        return view('auth.getstarted');
    }

    public function signin(){
        if (Auth::user()) {
            return redirect('/dashboard');
        } else {
            return view('auth.signin');
        }        
    }
    
    public function forgotpassword(){
        return view('auth.forgotpassword');
    }

    public function login(Request $request, AuthService $authService)
    {
        $user = $authService->login($request);
        return response($user);
    }

    public function changePassword (Request $request, AuthService $authService) {
        $service = $authService->changePassword($request);
        return response($service);
    }

    public function check_password (AuthService $authService) {
        $service = $authService->check_password();
        return response($service);
    }

    public function tenantlogin(Request $request, AuthService $authService)
    {
        $user = $authService->tenantlogin($request);
        return response($user);
    }

    public function register(Request $request, AuthService $authService){
        $user = $authService->register($request);
        return response($user);
    }

    public function verifyEmailForRegistration(Request $request, AuthService $authService){
        $verifierRes = $authService->verifyEmailForRegistration($request);
        return response($verifierRes);
    }

    public function sendOtpForUserResetPassword(Request $request, AuthService $authService){
        $sendOtpres = $authService->sendOtpForUserResetPassword($request);
        return response($sendOtpres);
    }

    public function resetPassword(Request $request, AuthService $authService){
        $passResetRes = $authService->resetPassword($request);
        return response($passResetRes);
    }

    public function verifyOTP(Request $request, AuthService $authService) {
        $verifier = $authService->verifyOtps($request);
        return response()->json($verifier);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        auth()->logout();
        return response()->json(['status' => 401]);
    }
}
