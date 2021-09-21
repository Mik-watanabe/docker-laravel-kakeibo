<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Income;
use App\Models\IncomeSource;
use App\Http\Requests\IncomeRequest;
use Illuminate\Support\Facades\Auth;

class IncomeSourceController extends Controller
{
    public function show(): View
    {
        $incomeSources = IncomeSource::where('user_id', Auth::id())
            ->get();
        return view('incomeSources.index', ['incomeSources' => $incomeSources]);
    }
}
