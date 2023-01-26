<?php

namespace App\Http\Controllers\API\admin\DeliveryCompanies;

use App\Http\Controllers\Controller;
use App\Models\DeliveryCompany;
use Illuminate\Http\Request;

class DeliveryCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DeliveryCompany::select('title','id','is_active')->orderBy('id', 'desc')->paginate(10, ['*'], 'page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required|max:255|string',
            'is_active' => 'required|max:5|integer',
        ]);

        DeliveryCompany::firstOrCreate($data);

        return response(status: 200);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryCompany  $deliveryCompany
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryCompany $deliveryCompany)
    {
        $data = $request->validate([
            'title'     => 'required|max:255|string',
            'is_active' => 'max:255',
        ]);

        $deliveryCompany->update($data);

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryCompany  $deliveryCompany
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCompany $deliveryCompany)
    {
        $deliveryCompany->delete();

        return response(status: 200);
    }
}
