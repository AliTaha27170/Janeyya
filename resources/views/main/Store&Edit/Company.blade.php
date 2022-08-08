@extends('layouts.main') 
@section('title', 'Add User')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid card-style">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                 
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                     
                    </nav>
                </div>
            </div>
        </div>
        <div class="row" style="direction: rtl; text-align:right">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12 big-font ar" >
                <div class="card ">
                    <div class="card-header">
               
                        <img src="https://i.ibb.co/VtJzwNn/iconfinder-business-work-11-2377636.png" width="45px" border="0" class="img_">
                        <h3>شركة جديدة</h3>
                       
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-user') }}" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="name">اسم الشركة <span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="أدخل الاسم" required>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">البريد الألكتروني <span class="text-red">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="أدخل البريدد الألكتروني الحاص بالشركة " required>
                                        <div class="help-block with-errors" ></div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="password">كلمة السر <span class="text-red">*</span></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة السر " required>
                                        <div class="help-block with-errors"></div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">تأكيد كلمة السر <span class="text-red">*</span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تأكيد الكلمة " required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <br><hr>
                                    <div class="form-group">
                                        <label for="password-confirm">اللوغو الخاص بالشركة  </label>
                                        <input id="password-confirm" type="file" class="form-control" name="password_confirmation" placeholder="تأكيد الكلمة " required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    
                                
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection
