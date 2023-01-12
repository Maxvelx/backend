<?php

namespace App\Imports;

use App\Models\Parts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PartsImport implements ToModel, WithBatchInserts, WithChunkReading
{

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $time = $row['time'];
        $currency = $row['currency'];
        $label = $row['label'];

        return new Parts([
            'brand_part'     => $row['brand'],
            'num_part'       => $row['number_part'],
            'num_oem'        => $row['number_oem'],
            'name_parts'     => $row['name'],
            'quantity'       => $row['qty'],
            'price_1'        => $row['price'],
            'delivery_time'  => $time,
            'price_currency' => $currency,
            'label'          => $label,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
