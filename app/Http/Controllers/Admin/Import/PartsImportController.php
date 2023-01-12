<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parts\ImportPartsRequest;
use App\Imports\PartsImport;
use App\Models\Parts;
use Maatwebsite\Excel\Facades\Excel;

class PartsImportController extends Controller
{
    public function __invoke(ImportPartsRequest $request)
    {
        $data = $request->validated();
        Excel::import(new PartsImport, $data);

        return response(['message'=> 'Прайс було додано в базу']);
    }
}
