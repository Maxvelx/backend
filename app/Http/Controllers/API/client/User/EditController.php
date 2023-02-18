<?php

namespace App\Http\Controllers\API\client\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserEditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditController extends Controller
{
    public function __invoke(UserEditRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        try {
            DB::beginTransaction();

        if (!empty($data['image'])) {
            $image = $data['image'];
            $path = $image->hashName();
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            Image::make($image)->resize(null, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/image/users/'.$path));
            $data['image'] = '/image/users/'.$path;
        }

        $user->update($data);


            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }


        return response(['message' => 'Ви успішно оновили профіль']);
    }
}
