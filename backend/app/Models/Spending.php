<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeOfType($query, array $requests): Builder
    {
        // カテゴリ絞り込み
        if (!empty($requests['category_id'])) {
            $query->where('category_id', $requests['category_id']);
        }
        if (!empty($requests['date_start'])) {
            $query->whereDate('accrual_date', '>=', $requests['date_start']);
        }
        if (!empty($requests['date_finish'])) {
            $query->whereDate('accrual_date', '<=', $requests['date_finish']);
        }
        return $query;
    }
}
