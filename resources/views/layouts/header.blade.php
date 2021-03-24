<!-- Top bar Start -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-envelope"></i>
                tanawit.w@ku.th
            </div>
            <div class="col-sm-6">
                <i class="fa fa-phone-alt"></i>
                1112
            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->
<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">เมนู</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route('pages.home')}}"
                        class="nav-item nav-link {{ (request()->routeIs('pages.home')) ? 'active' : '' }}">
                        <i class="fa fa-hom"></i> หน้าแรก
                    </a>
                    <a href="{{route('products.all')}}" class="nav-item nav-link 
                {{ (request()->routeIs('products.all') || request()->routeIs('products.category')) ? 'active' : '' }}">
                        <i class="fa fa-cart-pls"></i> สินค้า
                    </a>
                    <a href="{{route('carts.checkout.index')}}" class="nav-item nav-link
                {{ (request()->routeIs('carts.checkout.index')) ? 'active' : '' }}">
                        <i class="fa fa-credit-crd"></i> ชำระเงิน
                    </a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="{{route('pages.organizer')}}" class="nav-item nav-link">ผู้จัดทำ</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{route('pages.home')}}">
                        <img src="{{asset('img/logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <form class="search" method="get" action="{{ route('products.search') }}">
                    <input type="text" name="keyword" placeholder="ค้นหาที่นี่" autofocus
                        value="{{ request()->get('keyword') }}">
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="{{route('carts.all')}}" class="btn btn-lg">
                        <i class="fa fa-shopping-cart"></i>
                        <span>
                            @if (isset(Session::get('cart')->totalQuantity))
                            <span class="badge badge-warning">{{Session::get('cart')->totalQuantity}}</span>
                            @else 0 @endif
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->