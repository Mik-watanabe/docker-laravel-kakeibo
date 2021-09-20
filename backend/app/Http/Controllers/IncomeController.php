<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Income;
use App\Models\IncomeSource;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function show(Request $request): View
    {
        $requests = null;
        // $requests = array_filter($request->all);
        $userId = Auth::id();
        $incomeSources = IncomeSource::where('user_id', $userId)->get();
        $builder = Income::query();

        // 検索している時
        if (!empty($requests)) {
            $builder = $builder->OfType($requests);
        }
        $incomes = $builder->where('user_id', $userId)
            ->with(['incomeSource'])
            ->orderBy('accrual_date')
            ->get();

        return view('incomes.index', [
            'incomes' => $incomes,
            'incomeSources' => $incomeSources,
            'incomeSourceId' => $requests['income_source_id'] ?? null,
            'dateStart' => $requests['date_start'] ?? null,
            'dateFinish' => $requests['date_finish'] ?? null
        ]);
    }
}
