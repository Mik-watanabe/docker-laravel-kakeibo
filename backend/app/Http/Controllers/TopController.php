<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spending;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;

class TopController extends Controller
{
    public function show(Request $request): View
    {
        $thisYear = Carbon::now()->year;
        $year = $request->year ?? $thisYear;

        $spendings = Spending::where('user_id', Auth::id())
            ->OfAmountSumPerMonth($year);
        $incomes = Income::where('user_id', Auth::id())
            ->OfAmountSumPerMonth($year);

        $kakeiboList = [];
        // 家計簿リストの作成
        for ($i = 1; $i <= 12; $i++) {
            $income = $incomes->pull($i) ?? 0;
            $spending = $spendings->pull($i) ?? 0;
            $total = $income - $spending;
            $kakeiboList[] = [
                'month' => $i,
                'income' => number_format($income),
                'spending' => number_format($spending),
                'total' => number_format($total)
            ];
        }

        $years = range($thisYear, 2015);
        return view('top', [
            'years' => $years,
            'kakeiboList' => $kakeiboList
        ]);
    }
}
