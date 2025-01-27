<div id="header-area">
  
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mr-5 mt-2">
      @guest
      <li class="nav-item mr-5">
        <a class="nav-link" href="{{ route('register') }}">登録</a>
      </li>
      <li class="nav-item mr-5">
        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
      </li>
      <hr>
      <li class="nav-item mr-5">
        <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
      </li>
      <li class="nav-item mr-5">
        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
      </li>
      @else
      <li class="nav-item mr-5">
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


  <div id="site-title">
    <a href=#>Yonkousho</a>
  </div>


</div>