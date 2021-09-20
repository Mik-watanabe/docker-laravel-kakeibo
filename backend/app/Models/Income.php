<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Income extends Model
{
    use HasFactory;

    public function incomeSource()
    {
        return $this->belongsTo(IncomeSource::class);
    }

    public function scopeOfType($query, array $requests): Builder
    {
        // カテゴリ絞り込み
        if (!empty($requests['income_source_id'])) {
            $query->where('income_source_id', $requests['income_source_id']);
        }
        if (!empty($requests['date_start'])) {
            $query->whereDate('accrual_date', '>=', $requests['date_start']);
        }
        if (!empty($requests['date_finish'])) {
            $query->whereDate('accrual_date', '<=', $requests['date_finish']);
        }
        return $query;
    }

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

    public function getAccrualDateForViewAttribute(): string
    {
        $dt = Carbon::create($this->accrual_date);
        return $dt->format('Y/m/d');
    }
}
