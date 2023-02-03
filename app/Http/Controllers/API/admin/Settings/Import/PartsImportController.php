<?php

namespace App\Http\Controllers\API\admin\Settings\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parts\ImportPartsRequest;
use App\Jobs\DeleteImportRows;
use App\Jobs\ImportParts;
use Spatie\SimpleExcel\SimpleExcelReader;

class PartsImportController extends Controller
{
    public function __invoke(ImportPartsRequest $request)
    {
        $data = $request->validated();


        dispatch(new DeleteImportRows($data['label']));

        $rows = SimpleExcelReader::create($data['file_import'], 'csv')
            ->trimHeaderRow()
            ->getRows()
            ->toArray();

//
//        foreach ($rows as $row) {
//            return $row;
//        }

        $data['created_at'] = now();
        $data['updated_at'] = now();
        if ($data['brand']){
            $data['brand_part'] = $data['brand'];
            unset($data['brand']);
        }

        unset($data['file_import']);
        foreach ($rows as &$row) {
            $row = array_intersect_key($row, array_flip([
                'brand_part',
                'num_part',
                'name_parts',
                'quantity',
                'price_1',
            ]));

            $row += $data;
            $row['price_show'] = $row['price_1'];
        }

        foreach (array_chunk($rows, 990) as $chunk) {
            $this->dispatch(new ImportParts($chunk));
        }

        return response(['message' => 'Прайс було додано в базу']);
    }
}
