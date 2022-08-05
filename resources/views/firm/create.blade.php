@extends('layouts.main') 
@section('title', 'اضافة شركة')
@section('content')
    

    <div class="container-fluid card-style">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">صفحة</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">اضافة شركة</li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card rt">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">اضافة شركة جديدة</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('firm.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-name">اسم الشركة</label>
                                                <input type="text"  class="form-control" name="name" id="example-name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-link_map">لينك الخريطة</label>
                                                <input type="text"  class="form-control" name="link_map" id="example-link_map">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-phone">رقم الهاتف</label>
                                                <input type="text" id="example-phone" name="phone1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-phone">رقم هاتف اخر</label>
                                                <input type="text" id="example-phone" name="phone2" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-phone">رقم هاتف اخر</label>
                                                <input type="text" id="example-phone" name="phone3" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-phone">لوجو</label>
                                                <input type="file" id="example-phone" name="logo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-phone">رقم السجل الضريبي</label>
                                                <input type="text" id="example-phone" name="tax_reg_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-message">العنوان</label>
                                                <textarea  name="address" rows="5" class="form-control" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit">حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
