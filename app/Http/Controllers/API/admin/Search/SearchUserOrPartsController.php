<?php

namespace App\Http\Controllers\API\admin\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Search\SearchUserOrPartsRequest;
use App\Http\Resources\API\admin\parts\PartsAdminResource;
use App\Http\Resources\API\client\Personal\UserResource;
use App\Models\Parts;
use App\Models\User;

class SearchUserOrPartsController extends Controller
{
    public function __invoke(SearchUserOrPartsRequest $request)
    {
        $data       = $request->validated();

        $searchData = User::where('phone_number', 'LIKE', $data['search'])
            ->orWhere('name', 'LIKE', $data['search'].'%')
            ->paginate(10, ['*'], 'page', $data['page']);
        if ($searchData->count() > 0) {
            return UserResource::collection($searchData)->additional(['info' => 'users']);
        }

        $parts = Parts::where('num_part', $data['search'])
            ->paginate(10, ['*'], 'page', $data['page']);

        return PartsAdminResource::collection($parts)->additional(['info' => 'parts']);
    }
}
