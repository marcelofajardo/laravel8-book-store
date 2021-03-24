@extends('layouts.index')
@section('title', 'หน้าแรก')

@section('content')
<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.all')}}">
                                <i class="fa fa-border-all"></i>ทั้งหมด
                            </a>
                        </li>
                        @foreach ($categories as $cat)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.category', ['id' => $cat->id])}}">
                                <i class="fa fa-{{$cat->icon}}"></i>{{$cat->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="header-slider normal-slider">
                    @forelse ($products as $pro)
                    <div class="header-slider-item">
                        <img src="{{asset('product-images/'.$pro->image)}}" alt="{{$pro->name}}"
                            style="height: 400px; width: 600px" />
                        <div class="header-slider-caption">
                            <p>{{$pro->name}}</p>
                            <a class="btn" href="{{route('products.detail', ['id' => $pro->id])}}">
                                <i class="fa fa-shopping-cart"></i>ดูสินค้า
                            </a>
                        </div>
                    </div>
                    @empty
                    <h4 class="text-center">ไม่มีสินค้า</h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->
<br>
<!-- Feature Start-->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>การชำระเงินที่ปลอดภัย</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>ส่งสินค้าทั่วประเทศ</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>คืนของภายใน 90 วัน</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>ติดต่อได้ 24 ชั่วโมง</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->
<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>โทรหาเรา</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:0123456789">1112</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->
<!-- Recent Product Start -->
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>สินค้า</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @forelse ($products as $pro)
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-title">
                        <a href="#">{{$pro->name}}</a>
                        <div class="ratting">
                            <a style="font-size: 13px">
                                หมวดหมู่: <span class="badge badge-warning">{{$pro->category->name}}</span>
                            </a>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="{{route('products.detail', ['id' => $pro->id])}}">
                            <img style="height: 300px;" src="{{url('product-images/'.$pro->image)}}"
                                alt="{{$pro->name}}">
                        </a>
                        <div class="product-action">
                            <a href="{{route('carts.add', ['id' => $pro->id])}}"><i class="fa fa-cart-plus"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span>฿</span>{{number_format($pro->price, 0)}}</h3>
                        <a class="btn" href="{{route('products.detail', ['id' => $pro->id])}}">
                            <i class="fa fa-eye"></i>ดูสินค้า
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h4 class="text-center">No item recently available.</h4>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Recent Product End -->
@endsection