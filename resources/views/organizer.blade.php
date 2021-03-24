@extends('layouts.index')
@section('title', 'หน้าแรก')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('pages.home')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active">ผู้จัดทำ</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="contact-info">
                    <h4>ธนวิชญ์ วิรัชนานันทกิจ</h4>
                    <h3><i class="fa fa-id-card"></i>6230200325</h3>
                    <h3><i class="fa fa-envelope"></i>tanawit.w@ku.th</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="contact-info">
                    <h4>ทัศน์พล ธรรมฐิติวงศ์</h4>
                    <h3><i class="fa fa-id-card"></i>6230200287</h3>
                    <h3><i class="fa fa-envelope"></i>thatphon.t@ku.th</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="contact-info">
                    <h4>ธนวรรธน์ จันทนา</h4>
                    <h3><i class="fa fa-id-card"></i>6230200317</h3>
                    <h3><i class="fa fa-envelope"></i>thanawat.jant@ku.th</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="contact-info">
                    <h4>ธนากร นิตยะประภา</h4>
                    <h3><i class="fa fa-id-card"></i>6230200333</h3>
                    <h3><i class="fa fa-envelope"></i>thanakorn.nit@ku.th</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d485.7071516145546!2d100.92002763448951!3d13.120888759801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b9d96a2768d1%3A0x59ffdd4211a5c2d0!2z4Lit4Liy4LiE4Liy4LijIDIg4Lib4LiP4Li04Lia4Lix4LiV4Li04LiB4Liy4Lij4Lin4Li04Lio4Lin4LiB4Lij4Lij4Lih4Lio4Liy4Liq4LiV4Lij4LmM!5e0!3m2!1sth!2sth!4v1616316711249!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection