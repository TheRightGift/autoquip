<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\UserService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $userService)
    {
        $users = $userService->allUsers();
        return response($users);
    }

    public function paginatedUsers()
    {
        // return User::with('category')->orderBy('created_at', 'desc')->paginate(20);
    }

    public function sort(Request $request, $sortBy, UserService $userService)
    {
        $users = $UserService->sortUsers($request, $sortBy);
        return response($Users);        
    }

    /**
     * Filter items by class or category or subject.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, UserService $userService)
    {
        $users = $userService->filterUsers($request);
        return response($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserService $userService)
    {
        $users = $UserService->storeUsers($request);
        return response($Users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, UserService $userService)
    {
        $user = $userService->updateUser($request, $id);
        return response($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $userService->destroyUser($id);
        return response($user);
    }

     /**
     * Remove the specified User from storage.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        $user = $userService->refreshUser($id);
        return response($user);
    }
}
