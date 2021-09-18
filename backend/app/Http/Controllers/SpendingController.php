<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spending  $spending
     * @return \Illuminate\View\View
     */
    public function show(Request $request): View
    {
        $requests = array_filter($request->all());
        $userId = Auth::id();
        $categories = Category::where('user_id', $userId)->get();
        $builder = Spending::query();
        // 検索している時
        if (!empty($requests)) {
            $builder = $builder->OfType($requests);
        }
        $spendings = $builder->where('user_id', $userId)
            ->with(['category'])
            ->orderBy('accrual_date')
            ->get();

        $rankings = $spendings?->groupBy('category.name')
            ->sortByDesc(function ($spending) {
                return $spending->sum('amount');
            })
        ->take(3);

        return view('spendings.index', [
            'spendings' => $spendings,
            'rankings' => $rankings,
            'categories' => $categories,
            'categoryId' => $requests['category_id'] ?? null,
            'dateStart' => $requests['date_start'] ?? null,
            'dateFinish' => $requests['date_finish'] ?? null
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function edit(Spending $spending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spending $spending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spending $spending)
    {
        //
    }
}
