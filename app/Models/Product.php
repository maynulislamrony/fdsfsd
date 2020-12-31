<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'name', 'cat_id', 'code', 'buyDate', 'expireDate', 'buyPrice', 'selPrice', 'description', 'photo'
    // ];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(purchaseDetails::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

}
