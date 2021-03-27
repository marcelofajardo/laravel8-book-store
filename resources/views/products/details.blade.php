@extends('layouts.index')

@if (request()->routeIs('products.all'))
@section('title', 'สินค้าทั้งหมด')
@else
@section('title', $product->name)
@endif

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('pages.home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.all')}}">สินค้า</a></li>
            <li class="breadcrumb-item active">{{$product->name}}</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <img src="{{asset('product-images/'.$product->image)}}" alt="Product Image"
                                    style="max-height: 600px">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                @if (session('error'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>เกิดข้อผิดพลาด!</strong> กรุณาใส่จำนวนสินค้าที่มากกว่า 0
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="title">
                                    <h2>{{$product->name}}</h2>
                                </div>
                                <div class="ratting">
                                    <small>หมวดหมู่:</small>
                                    <a href="{{ route('products.category', ['id' => $product->category->id]) }}"
                                        style="font-size: 14px">
                                        <span class="badge badge-warning">{{$product->category->name}}</span>
                                    </a>
                                </div>
                                <div class="price">
                                    <h4>ราคา:</h4>
                                    <p>฿{{number_format($product->price, 0)}}</p>
                                </div>
                                <form method="get" action="{{ route('carts.add', ['id' => $product->id]) }}">
                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <div class="qty">
                                            <button type="button" class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" name="qty" value="1">
                                            <button type="button" class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <button type="submit" class="btn btn-lg">
                                            <i class="fa fa-cart-plus"></i> ใส่รถเข็น
                                        </button>
                                        <div style="padding-top: 8px">
                                            <span class="badge badge-dark">เหลือ {{$product->remain}} เล่ม</span>
                                        </div>
                                    </div>
                                </form>
                                <div style="margin-top: 32px">
                                    <h4>รายละเอียด</h4>
                                    <hr>
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product">
            <div class="section-header">
                <h1>สินค้าหมวดหมู่เดียวกัน</h1>
            </div>
        </div>

        <div class="row">
            @forelse ($relatedProducts as $pro)
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-title text-truncate">
                        <a href="#">{{$pro->name}}</a>
                        <div class="ratting">
                            <a style="font-size: 13px">
                                หมวดหมู่: <span class="badge badge-warning">{{$pro->category->name}}</span>
                            </a>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="{{route('products.detail', ['id' => $pro->id])}}">
                            <img style="height: 330px;" src="{{url('product-images/'.$pro->image)}}"
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
                <h4 class="text-center">ไม่พบสินค้า</h4>
            </div>
            @endforelse
        </div>

    </div>
</div>
<!-- Product Detail End -->
@endsection