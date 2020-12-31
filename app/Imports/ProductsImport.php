<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'=>$row[0],
            'cat_id'=>$row[1],
            'code'=>$row[2],
            'buyDate'=>$row[3],
            'expireDate'=>$row[4],
            'buyPrice'=>$row[5],
            'selPrice'=>$row[6],
            'description'=>$row[7],
            'photo'=>$row[8],
        ]);
    }
}
