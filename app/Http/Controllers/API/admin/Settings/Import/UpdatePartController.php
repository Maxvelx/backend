<?php

namespace App\Http\Controllers\API\admin\Settings\Import;

use App\Http\Controllers\Controller;
use App\Models\Parts;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class UpdatePartController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'file_import' => 'file|required',
        ]);

        $rows = SimpleExcelReader::create($data['file_import'], 'xlsx')
            ->trimHeaderRow()
            ->getRows()
            ->map(function ($row) {
                $price['price_show'] = $row['price_1'];
                $row                 += $price;

                return $row;
            })
            ->toArray();

        foreach ($rows as $row) {
            Parts::where('num_part', $row['num_part'])
                ->where('label', null)
                ->update($row);
        }

        return response(['message' => 'Запчастини оновлені']);
    }
}
