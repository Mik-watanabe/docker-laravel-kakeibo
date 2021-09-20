<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Income extends Model
{
    use HasFactory;

    public function scopeOfAmountSumPerMonth($query, int $year)
    {
        return $query->whereYear('accrual_date', $year)
                    ->orderBy('created_at')
                    ->get()
                    ->groupBy(function ($row) {
                        $carbon = new Carbon($row->accrual_date);
                        return $carbon->format('n');
                    })
                    ->map(function ($day) {
                        return $day->sum('amount');
                    });
    }
}
