<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Income;
use App\Models\IncomeSource;
use App\Http\Requests\IncomeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function show(Request $request): View
    {
        $requests = array_filter($request->all());
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

    public function create(): View
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())
            ->get();
        return view('incomes.create', ["incomeSources" => $incomeSources]);
    }

    public function store(IncomeRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $income = new Income();
        $income->user_id = Auth::id();
        $income->income_source_id = $validated['income_source_id'];
        $income->amount = $validated['amount'];
        $income->accrual_date = $validated['date'];
        $income->save();

        return redirect()->route('income.top');
    }

    public function edit(Income $income): View
    {
        $this->authorize('manage', $income);

        $incomeSources = IncomeSource::where('user_id', $income->user_id)
            ->get();

        return view('incomes.edit', [
            'income' => $income,
            'incomeSources' => $incomeSources
        ]);
    }

    public function update(IncomeRequest $request): RedirectResponse
    {
        $income = Income::find($request->income_id);
        $income->income_source_id = $request->income_source_id;
        $income->amount = $request->amount;
        $income->accrual_date = $request->date;

        $this->authorize('manage', $income);

        $income->save();

        return redirect()->route('income.top');
    }

    public function destroy(Income $income): RedirectResponse
    {
        $this->authorize('manage', $income);

        $income = Income::find($income->id);
        $income->delete();

        return redirect()->route('income.top');
    }
}
