<?php

namespace App\Http\Controllers\API\admin\Replace;

use App\Http\Controllers\Controller;
use App\Models\Replace;
use Illuminate\Http\Request;

class ReplaceController extends Controller
{

    public function index()
    {
        return Replace::orderByDesc('id')->paginate(10, ['*'], 'page');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'numbers' => 'string',
            'part'    => 'string',
        ]);
        Replace::firstOrCreate($data);

        return response(status: 200);
    }


    public function update(Request $request, Replace $replace)
    {
        $data = $request->validate([
            'numbers' => 'string',
            'part'    => 'string',
        ]);

        $replace->update($data);

        return response(status: 200);
    }


    public function destroy(Replace $replace)
    {
        $replace->delete();

        return response(status: 200);
    }
}
