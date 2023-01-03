<?php

namespace App\Imports;

use App\Models\Parts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PartsImport implements ToModel, WithBatchInserts,WithChunkReading
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model( array $row )
    {
        return new Parts( [
            'brand_part' => $row[0],
            'num_part' => $row[1],
            'num_oem' => $row[1],
            'name_parts' => $row[2],
            'quantity' => $row[3],
            'price_1' => $row[5],
            'price_currency' => '1',
//            'distributor' => 'meka',
        ] );
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
