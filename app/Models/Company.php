<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function products()
    {
    return $this->hasMany(Product::class);
    }

    //会社情報の名前データ取得
    public function getCompanyData(){
        $company = Company::select('id','company_name')->get();
        return $company;
    }
}
