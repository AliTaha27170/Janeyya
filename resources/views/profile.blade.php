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
                            <img src="../img/user.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{ $user->name}}</h4>
                            <p class="card-subtitle">{{ $user->company_name }}</p>
                        </div>
                    </div>
                    <hr class="mb-0"> 
                    <div class="card-body"> 
                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                        <h6>{{ $user->email }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{ $user->phone }}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                        <h6>{{ $user->address }}</h6>
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
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-name">الاسم</label>
                                        <input type="text" placeholder="Johnathan Doe" class="form-control" name="name" id="example-name" value={{ $user->name }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">البريد الالكتروني</label>
                                        <input type="email" placeholder="johnathan@admin.com" class="form-control" name="email" id="example-email" value={{ $user->email }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-password">الرقم السري</label>
                                        <input type="password" class="form-control" name="password" id="example-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone">رقم الهاتف</label>
                                        <input type="text" id="example-phone" name="phone1" class="form-control" value={{ $user->phone1 }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone">رقم هاتف اخر</label>
                                        <input type="text" id="example-phone" name="phone2" class="form-control" value={{ $user->phone2 }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-message">العنوان</label>
                                        <textarea  name="adress" rows="5" class="form-control" value={{ $user->adress}}></textarea>
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
