<?php

namespace App\Http\Controllers\API\admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Http\Resources\API\client\Personal\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10, ['*'], 'page');

        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    //create here

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\User\StoreUserRequest $request
     */
    public function store(StoreUserRequest $request)
    {
        $data             = $request->validated();
        $data['password'] = \Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], $data);
        return response(status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     */
    public function show(User $user)
    {
        $likedParts = $user->GetLikedParts;
        return view('admin.user.show', compact('user','likedParts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     */
    public function edit(User $user)
    {
        return  new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\User\UpdateUserRequest $request
     * @param \App\Models\User $user
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(status: 200);
    }
}
