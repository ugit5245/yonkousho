<div id="header-area">

  <div id="common-bar">
    <div>
      <ul>
        @guest
        <li>
          <a class="nav-link" href="{{ route('register') }}">登録</a>
        </li>
        <li>
          <a href="{{ route('login') }}">ログイン</a>
        </li>
        <hr>
        <li>
          <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
        </li>
        <li class="nav-item mr-5">
          <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
        </li>
        @else
        <li>
          <span>{{ Auth::user()->name }}</span>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @endguest
      </ul>
    </div>
  </div>

  <div id="site-title">
    <a href=#><span>Yonkousho</span></a>
  </div>

  <div id="global-nav">
    <nav>
      <ul>
        <li><a><span>トップ</span></a></li>
        <li><a href="{{ route('posts.index') }}"><span>記事一覧</span></a></li>
        <li><a><span>このサイトについて</span></a></li>
        <li><a><span>サイトの使い方</span></a></li>

    </nav>
  </div>



</div>