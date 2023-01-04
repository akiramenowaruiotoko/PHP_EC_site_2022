<div class="container-fluid sticky-top bg-success p-3">
  <div class="row d-flex align-items-center">
    <div class="col">
        <div class="dropdown">
            <!-- 切替ボタンの設定 -->
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="h2 bi bi-list"></i>
            </button>
            <!-- ドロップメニューの設定 -->
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?page_select=page_category&category=リスト">商品一覧</a></li>
                <li><a class="dropdown-item" href="index.php?page_select=page_category&category=ボードゲーム">カテゴリー ボードゲーム</a></li>
                <li><a class="dropdown-item" href="index.php?page_select=page_category&category=カードゲーム">カテゴリー カードゲーム</a></li>
                <li><a class="dropdown-item" href="index.php?page_select=page_cart">カート</a></li>
                <li><a class="dropdown-item" href="index.php?page_select=page_history">購入履歴</a></li>
            </ul>
        </div>
    </div>
    <div class="col-8">
        <div><a href="index.php?page_select=page_category&category=リスト" class="h2 text-light text-decoration-none">board game shop</a></div>
    </div>
    <div class="col text-end">
        <div><a href="index.php?page_select=page_cart" class="h2 text-light"><i class="bi bi-cart"></i></a></div>
    </div>
  </div>
</div>