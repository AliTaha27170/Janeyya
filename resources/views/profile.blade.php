@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
    

    <div class="container-fluid card-style">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        
                        <div class="d-inline">
                            <h5>{{ __('Profile')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
                        </div>
                        <i class="ik ik-file-text bg-blue"></i>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center"> 
                            <img src="{{ $firm->logo }}" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{ $firm->name}}</h4>
                            <p class="card-subtitle">{{ $firm->company_name }}</p>
                        </div>
                    </div>
                    <hr class="mb-0"> 
                    <div class="card-body"> 
                        <small class="text-muted d-block">{{ __('Company Name')}} </small>
                        <h6>{{ $firm->name }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{ $firm->phone1 }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                        <h6>{{ $firm->address }}</h6>
                        <small class="text-muted d-block pt-30">{{ __('Social Profile')}}</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card rt">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">الاعدادات</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$firm->id}}" />
                                    <div class="form-group">
                                        <label for="example-name">اسم الشركة</label>
                                        <input type="text" class="form-control" name="name" id="example-name" value={{ $firm->name }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">الشعار</label>
                                        <input type="file" class="form-control" name="logo">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-password">الرقم السري</label>
                                        <input type="text" class="form-control" name="password" id="example-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone1">رقم الهاتف</label>
                                        <input type="text" id="example-phone1" name="phone1" class="form-control" value={{ $firm->phone1 }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone2">رقم هاتف اخر</label>
                                        <input type="text" id="example-phone2" name="phone2" class="form-control" value={{ $firm->phone2 }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone3">رقم هاتف اخر</label>
                                        <input type="text" id="example-phone3" name="phone3" class="form-control" value={{ $firm->phone3 }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-tax_reg_number">رقم السجل الضريبي</label>
                                        <input type="text" id="example-tax_reg_number" name="tax_reg_number" class="form-control" value={{ $firm->tax_reg_number }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-map">لينك الخريطة</label>
                                        <input type="text" id="example-map" name="link_map" class="form-control" value={{ $firm->link_map }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-message">العنوان</label>
                                        <input type="text" id="example-message" name="address" class="form-control" value={{ $firm->address }}>
                                    </div>
                                    <button class="btn btn-success" type="submit">تحديث</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
