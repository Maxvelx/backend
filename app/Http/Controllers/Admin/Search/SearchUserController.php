<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Search\SearchUserRequest;
use App\Models\User;

class SearchUserController extends Controller
{
    public function __invoke(SearchUserRequest $request)
    {
        $data  = $request->validated();
        $users = User::where('phone_number', 'LIKE', $data['search'] . '%')
            ->orWhere('name', 'LIKE', '%' . $data['search'] . '%')
            ->paginate(10)
            ->setPath('admin/search_user'.'?'.'search='.$data['search']);

        return view('admin.user.index', compact('users'));
    }
}
