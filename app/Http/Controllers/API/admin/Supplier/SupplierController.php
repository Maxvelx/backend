<?php

namespace App\Http\Controllers\API\admin\Supplier;

use App\Http\Controllers\Controller;
use App\Imports\PartsImport;
use App\Models\Parts;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return Supplier::orderBy('id', 'desc')
            ->paginate(10, ['*'], 'page');
    }

    /**
     * Store a newly created resource in storage.
     *
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'convert'       => 'nullable|max:255',
            'canDelivery'   => 'nullable|max:255',
            'coefficient'   => 'nullable|max:255',
            'delivery_time' => 'nullable|max:255',
        ]);
        Supplier::firstOrCreate($data);

        return response(status: 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Supplier  $category
     */

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'convert'       => 'nullable|max:255',
            'canDelivery'   => 'nullable|max:255',
            'coefficient'   => 'nullable|max:255',
            'delivery_time' => 'nullable|max:255',

        ]);

        $supplier->update($data);

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $category
     */

    public function destroy(Supplier $supplier)
    {
        Parts::where('label', $supplier->title)->delete();

        $supplier->delete();

        return response(status: 200);
    }
}
