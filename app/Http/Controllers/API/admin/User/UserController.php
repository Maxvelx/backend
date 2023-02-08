<?php

namespace App\Http\Controllers\API\admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Http\Resources\API\admin\Notification\OrderResource;
use App\Http\Resources\API\admin\parts\PartsAdminResource;
use App\Http\Resources\API\client\Personal\UserResource;
use App\Models\Garage;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10, ['*'], 'page');

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
        $data             = $request->validated();
        $data['password'] = \Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], $data);
        return response(status: 200);
    }


    public function show(User $user)
    {
        $orders = Order::where('user_id', $user->id)->paginate(10, ['*'], 'page');
        $cars = Garage::where('user_id', $user->id)->paginate(10, ['*'], 'page');
        $wishlist = $user->GetLikedParts()->paginate(10, ['*'], 'page');


        return [
            'orders' => OrderResource::collection($orders),
            'cars' => $cars,
            'wishlist' => PartsAdminResource::collection($wishlist),

        ];
    }

    public function edit(User $user)
    {
        return  new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response(status: 200);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return response(status: 200);
    }
}
