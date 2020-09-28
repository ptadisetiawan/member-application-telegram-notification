<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];

    public function getDaftarCollection($data){
        $lastNumber = intval(substr($this->getLastNumber(), 1)) + 1;
        $number = 'A' . $lastNumber;
        $data['class'] = '3';
        $data['balance'] = '0';
        $data['isBlackList'] = 0;
        $data['kode'] = $number;
        return $data;

    }

    private function getLastNumber(){
        $data = $this->latest('id')->first();
        return $data->kode;
    }
}
