<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function spendings()
    {
        return $this->hasMany(Spending::class);
    }

    public function delete()
    {
        $this->spendings()->delete();
        return Parent::delete();
    }
}
