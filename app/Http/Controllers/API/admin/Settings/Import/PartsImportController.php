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

        $file = $data['file_import'];
        unset($data['file_import']);


        dispatch(new DeleteImportRows($data['label']));

        $rows = SimpleExcelReader::create($file, 'csv')
            ->trimHeaderRow()
            ->getRows()
            ->map(function ($row) use ($data) {
                $row                = array_intersect_key($row, array_flip([
                    'brand_part',
                    'num_part',
                    'name_parts',
                    'quantity',
                    'price_1',
                ]));
                $row['price_1'] && $row['price_1'] > 0 ? false : $row['price_1'] = 0;
                $data['price_show'] = $row['price_1'];
                $row                += $data;

                return $row;
            });


        $chunks = $rows->chunk(990)->toArray();
        foreach ($chunks as $chunk) {
            $this->dispatch(new ImportParts($chunk));
        }

        return response(['message' => 'Прайс було додано в базу']);
    }
}
