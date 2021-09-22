<header class="header-container">
    <a href="{{ route('top') }}" class="header-icon-wrapper">
        <img src="/images/kakeibo_icon.svg" alt="家計簿のロゴ" class="header-icon">
    </a>
    <nav class="header-right">
        <ul class="header-list">
            <li class="list-item"><a href="{{ route('income.top') }}" class="list-item-link">収入TOP</a></li>
            <li class="list-item"><a href="{{ route('incomeSource.top') }}" class="list-item-link">収入源リスト</a></li>
            <li class="list-item"><a href="{{ route('spendings.top') }}" class="list-item-link">支出TOP</a></li>
            <li class="list-item"><a href="{{ route('category.top') }}" class="list-item-link">カテゴリ</a></li>
            <li class="list-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-item-link">ログアウト</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
</header>
