<?php

namespace App\Imports;

use App\Models\Parts;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartsImport implements ToModel, WithBatchInserts, WithChunkReading, WithHeadingRow
{
    use Importable;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $delivery_time  = $this->data['delivery_time'];
        $price_currency = $this->data['price_currency'];
        $label          = $this->data['label'];
        $convert        = $this->data['convert'];

        return new Parts([
            'brand_part'     => $row['brand'],
            'num_part'       => $row['number'],
            'name_parts'     => $row['name'],
            'quantity'       => $row['qty'] ? $row['qty'] : 0,
            'price_1'        => $row['price'],
            'price_show'     => $row['price'],
            'delivery_time'  => $delivery_time,
            'price_currency' => $price_currency,
            'label'          => $label,
            'convert'        => $convert,
        ]);
    }

    public function chunkSize(): int
    {
        return 20000;
    }

    public function batchSize(): int
    {
        return 1000;
    }


}
