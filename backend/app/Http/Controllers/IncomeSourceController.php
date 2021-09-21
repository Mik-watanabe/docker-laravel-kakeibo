<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Income;
use App\Models\IncomeSource;
use App\Http\Requests\IncomeSourceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IncomeSourceController extends Controller
{
    public function show(): View
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())
            ->get();
        return view('incomeSources.index', ['incomeSources' => $incomeSources]);
    }

    public function store(IncomeSourceRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $incomeSource = new IncomeSource();
        $incomeSource->user_id = Auth::id();
        $incomeSource->name = $validated['income_source'];
        $incomeSource->save();

        return redirect()->route('incomeSource');
    }

    public function destroy(IncomeSource $incomeSource): RedirectResponse
    {
        IncomeSource::where('id', $incomeSource->id)
        ->first()
        ->delete();

        return redirect()->route('incomeSource');
    }
}
