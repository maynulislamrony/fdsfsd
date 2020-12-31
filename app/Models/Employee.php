<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advanceSalary()
    {
        return $this->hasMany(AdvanceSalary::class);
    }

    public function paySalary()
    {
        return $this->hasOne(PaySalary::class);
    }
}
