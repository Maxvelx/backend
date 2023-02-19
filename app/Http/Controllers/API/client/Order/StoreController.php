<?php

namespace App\Http\Controllers\API\client\Order;

use App\Http\Controllers\API\telegram\TelegramController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\StoreOrderRequest;
use App\Http\Resources\API\client\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreOrderRequest $request)
    {

        try {

            DB::beginTransaction();
            $data = $request->validated();

            $total = implode(",",$data['total']);
            unset($data['total']);

            if (auth()->user()) {
                $user = auth()->user();
                $user->update(
                    [
                        'name'             => $data['name'],
                        'lastName'         => $data['lastName'],
                        'patronymic'       => $data['patronymic'],
                        'phone_number'     => $data['phone_number'],
                        'address'          => $data['address'],
                        'delivery_company' => $data['delivery_company'],
                    ]);
            } else {
                $data['password'] = \Hash::make($data['password']);
                $user             = User::firstOrCreate(
                    ['email' => $data['email']],
                    [
                        'name'             => $data['name'],
                        'password'         => $data['password'],
                        'lastName'         => $data['lastName'],
                        'patronymic'       => $data['patronymic'],
                        'phone_number'     => $data['phone_number'],
                        'address'          => $data['address'],
                        'delivery_company' => $data['delivery_company'],
                    ]);
            }



            $order = Order::create([
                'user_id'       => $user->id,
                'parts'         => json_encode($data['parts']),
                'message_order' => $data['message_order'],
                'order_number'  => fake()->randomNumber(8, true),
            ]);

            DB::commit();

            TelegramController::sendMessage($user->phone_number, $total);

            return new OrderResource($order);

        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }
}
