<header class="header-container">
    <a href="{{ route('top') }}" class="header-icon-wrapper">
        <img src="/images/kakeibo_icon.svg" alt="家計簿のロゴ" class="header-icon">
    </a>
    <nav class="header-right">
        <ul class="header-list">
            <li class="list-item"><a href="{{ route('income') }}" class="list-item-link">収入TOP</a></li>
            <li class="list-item"><a href="" class="list-item-link">収入源リスト</a></li>
            <li class="list-item"><a href="{{ route('spendings') }}" class="list-item-link">支出TOP</a></li>
            <li class="list-item"><a href="{{ route('category') }}" class="list-item-link">カテゴリ</a></li>
            <li class="list-item"><a href="" class="list-item-link">ログアウト</a></li>
        </ul>
    </nav>
</header>
