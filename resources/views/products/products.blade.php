@extends('layouts.index')

@if (request()->routeIs('products.all'))
@section('title', 'สินค้าทั้งหมด')
@elseif (request()->routeIs('products.search'))
@section('title', 'ค้นหา "'.request()->get('keyword'). '"')
@else
@section('title', $category->name)
@endif

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('pages.home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.all')}}">สินค้า</a></li>
            @if (request()->routeIs('products.all'))
            <li class="breadcrumb-item active">ทั้งหมด</li>
            @endif
            @if (request()->routeIs('products.category'))
            <li class="breadcrumb-item active">{{$category->name}}</li>
            @endif
            @if (request()->routeIs('products.search'))
            <li class="breadcrumb-item active">ค้นหา "{{request()->get('keyword')}}"</li>
            @endif
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <!-- Side Bar Start -->
            <div class="col-lg-3 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">หมวดหมู่</h2>
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
            </div>
            <!-- Side Bar End -->

            <div class="col-lg-9">
                <div class="row">
                    <!-- Product Lists -->
                    @forelse ($products as $pro)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('products.detail', ['id' => $pro->id])}}">{{$pro->name}}</a>
                                <div class="ratting">
                                    <a style="font-size: 13px">
                                        หมวดหมู่: <span class="badge badge-warning">{{$pro->category->name}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img style="height: 300px;" src="{{asset('product-images/'.$pro->image)}}"
                                        alt="{{$pro->name}}">
                                </a>
                                <div class="product-action">
                                    <a href="{{route('carts.add', ['id' => $pro->id])}}"><i class="fa fa-cart-plus"></i>
                                    </a>
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
                        <br>
                        <h4 class="text-center">ไม่พบสินค้า</h4>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination Start -->
                <div class="col-md-12">
                    {{$products->links()}}
                </div>
                <!-- Pagination Start -->

            </div>
        </div>
    </div>
</div>
<!-- Product List End -->
@endsection