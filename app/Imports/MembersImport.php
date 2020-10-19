<?php

namespace App\Imports;

use App\Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToCollection, WithHeadingRow
{
    use Importable;
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $blacklist = 0;
            if($row['blacklist'] == 'TRUE'){
                $blacklist = 1;
            }else{
                $blacklist = 0;
            }
            Member::updateOrCreate([
                'kode' => $row['kode'],
            ], [
                'nama' => $row['customer'],
                'alamat' => $row['alamat'],
                'ktp' => $row['fax'],
                'telepon' => $row['telp'],
                'tgl_lahir' => $row['kota'],
                'class' => $row['class'],
                'balance' => $row['balance'],
                'isBlackList' => $blacklist
            ]);
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
