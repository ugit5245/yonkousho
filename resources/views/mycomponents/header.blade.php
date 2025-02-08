<div id="header-area">

  <div id="common-bar">
    <div id="common-bar-user">
      <ul>

        @guest
        <li>
          <a class="nav-link" href="{{ route('register') }}">登録</a>
        </li>

        <li>
          <a href="{{ route('login') }}">ログイン</a>
        </li>

        <li>
          <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
        </li>
        <li class="nav-item mr-5">
          <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
        </li>


        @else
        <li><a><span>{{ Auth::user()->name }}</span>
          </a>
        </li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>ログアウト</span>
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
    <a href="{{ route('posts.index') }}"><span>Yonkousho</span></a>
  </div>

  <div id="global-nav">
    <nav>
      <ul>
        <li><a><span>トップ</span></a></li>
        <li><a href="{{ route('posts.index') }}"><span>記事一覧</span></a></li>
        <li><a><span>このサイトについて</span></a></li>
        <li><a><span>サイトの使い方</span></a></li>
      </ul>
    </nav>
  </div>



</div>