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

        return redirect()->route('incomeSource.top');
    }

    public function edit(IncomeSource $incomeSource): View
    {
        $this->authorize('manage', $incomeSource);

        return view('incomeSources.edit', ['incomeSource' => $incomeSource]);
    }

    public function update(IncomeSourceRequest $request): RedirectResponse
    {
        $incomeSource = IncomeSource::find($request->income_source_id);
        $incomeSource->name = $request->income_source;

        $this->authorize('manage', $incomeSource);
        $incomeSource->save();

        return redirect()->route('incomeSource.top');
    }

    public function destroy(IncomeSource $incomeSource): RedirectResponse
    {
        $this->authorize('manage', $incomeSource);
        
        IncomeSource::where('id', $incomeSource->id)
        ->first()
        ->delete();

        return redirect()->route('incomeSource.top');
    }
}
