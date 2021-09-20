@extends('layouts.app')

@section('title')
  TOP
@endsection

@section('content')
  <div class="top-container c-list-content">
      <h1 class="c-list-content-title">収支リスト</h1>
      <form action="{{ route('top') }}" class="search-section" method="GET">
        <div class="search-section-wrapper">
          <label class="search-section-label">
              <select name="year" class="c-form-input top-select">
                  @foreach ($years as $year)
                    <option value="{{ $year }}" @if (request()?->get('year') == $year) selected @endif>{{ $year }}</option>
                  @endforeach
              </select>
              <span class="top-search-txt">年の収支一覧</span>
          </label>
          <div class="top-btn-wrapper">
              <button class="c-btn top-btn">検索</button>
          </div>
        </div>
      </form>

      <div>
          <table class="top-table">
            <tr>
                <th width="10%">月</th>
                <th width="30%">収入</th>
                <th width="30%">支出</th>
                <th width="30%">収支</th>
            </tr>
            @foreach ($kakeiboList as $kakeibo)
              <tr>
                <td>{{ $kakeibo['month'] }}</td>
                <td>{{ $kakeibo['income'] }}</td>
                <td>{{ $kakeibo['spending'] }}</td>
                <td>{{ $kakeibo['total'] }}</td>
              </tr>
            @endforeach
          </table>
      </div>
  </div>
@endsection
