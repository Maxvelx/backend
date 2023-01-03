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
        Excel::import(new PartsImport, $request->file('file_import'));

        return redirect(route ('admin.index'))->with('success', 'Вітаємо! Прайс був завантажений!');
    }
}
