@extends('layouts.index')
@section('title', 'รถเข็น')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('pages.home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active">รถเข็น</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>เกิดข้อผิดพลาด!</strong> ไม่พบสินค้าในรถเข็นของคุณ
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>รวม</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <div class="text-right" style="margin-bottom: 16px;">
                                    <a class="nav-link text-danger {{ empty($cartItems->totalQuantity) ? 'disabled' : ''}}"
                                        href="{{ route('carts.clear') }}">
                                        <i class="fa fa-times"></i> ล้างรถเข็น
                                    </a>
                                </div>
                                <!-- Items in a cart -->
                                @if (!empty($cartItems->items))
                                @foreach ($cartItems->items as $item)
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="{{ route('products.detail', ['id' => $item['data']['id']]) }}">
                                                <img src="product-images/{{$item['data']['image']}}" alt="Image">
                                            </a>
                                            <p>
                                                <a href="{{ route('products.detail', ['id' => $item['data']['id']]) }}">
                                                    {{$item['data']['name']}}
                                                </a>
                                            </p>
                                        </div>
                                    </td>
                                    <td>฿{{number_format($item['data']['price'], 0)}}</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <a href="{{route('carts.decrease', ['id' => $item['data']['id']])}}"
                                                    class="btn btn-outline-secondary
                                                                @if ($item['quantity'] <= 1) 
                                                                    disabled
                                                                @endif
                                                            "><i class="fa fa-minus"></i></a>
                                            </div>
                                            <input type="text" class="form-control" value="{{$item['quantity']}}"
                                                disabled>
                                            <div class="input-group-append">
                                                <a href="{{route('carts.add', ['id' => $item['data']['id']])}}"
                                                    class="btn btn-outline-secondary"><i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </td>
                                    <td>฿{{ number_format($item['totalSinglePrice'], 0) }}</td>
                                    <td>
                                        <a href="{{ route('carts.remove', ['id' => $item['data']['id']]) }}"
                                            class="text-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        <div style="padding: 28px">
                                            <h4>ไม่มีสินค้าอยู่ในรถเข็น</h4>
                                            <a href="{{route('products.all')}}" class="btn">
                                                <i class="fa fa-arrow-left"></i> เลือกซื้อสินค้า
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>สรุปคำสั่งซื้อ</h1>
                                    <p>จำนวน:
                                        <span>{{ empty($cartItems->totalQuantity) ? '0' : $cartItems->totalQuantity}}</span>
                                    </p>
                                    <p>ค่าขนส่ง: <span class="badge badge-info">FREE</span></p>
                                    <h2>ยอดรวม:
                                        <span>฿{{ empty($cartItems->totalPrice) ? '0' : number_format($cartItems->totalPrice, 2)}}</span>
                                    </h2>
                                </div>
                                <div class="cart-btn" style="margin-top: 16px">
                                    <a class="btn btn-lg btn-block {{ empty($cartItems->totalQuantity) ? 'disabled' : ''}}"
                                        href="{{ route('carts.checkout.index') }}">
                                        ต่อไป <i class="fa fa-arrow-alt-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection