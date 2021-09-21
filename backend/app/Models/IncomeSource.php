<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeSource extends Model
{
    use HasFactory;

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function delete()
    {
        $this->incomes()->delete();
        return Parent::delete();
    }
}
