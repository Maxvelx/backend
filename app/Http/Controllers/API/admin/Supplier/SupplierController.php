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
        return Supplier::select('canDelivery','convert', 'title', 'id')->orderBy('id', 'desc')
            ->paginate(10, ['*'], 'page');
    }

    /**
     * Store a newly created resource in storage.
     *
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'convert'     => 'required|max:255',
            'canDelivery' => 'required|max:255',
        ]);
        Supplier::firstOrCreate($data);
        Parts::where('label', $data['title'])->update(['convert' => $data['convert']]);

        return response(status: 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Supplier  $category
     */

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'convert' => 'required|max:255',
            'canDelivery' => 'required|max:255',
        ]);

        $supplier->update($data);

        if ($supplier->convert != $data['convert']) {
            Parts::where('label', $data['title'])->update(['convert' => $data['convert']]);
        }

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $category
     */

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response(status: 200);
    }
}
