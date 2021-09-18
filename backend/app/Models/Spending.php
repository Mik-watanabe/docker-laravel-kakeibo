<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Spending extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function accrualDateForView(): string
    {
        $dt = Carbon::create($this->accrual_date);
        return $dt->format('Y/m/d');
    }
}
