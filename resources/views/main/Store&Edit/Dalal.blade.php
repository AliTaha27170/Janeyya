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
               
                        <img src="https://i.ibb.co/HGys1k6/auction-bid-bidding-09-512.png"  width="55px" border="0" class="img_">
                        <h3>الدلالون    </h3>
                      
                    </div>
                    
                    <div class="card-body">
                        <form class="forms-sample" method="POST"

                         action="{{ isset($user)? route('updateDalal',$user->id) : route('storeDalal') }}" 
                         
                         enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">


                                        <table class="table">
                                            <tr>
                                                <td>
                                               
                                            
                                                        <label for="name">اسم الدلال   <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user) ? $user->name : '' }}" placeholder="أدخل الاسم" required>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                              

                                                </td>


                                                <td>

                                                   
                                                        <label for="name"> الراتب     <span class="text-red">*</span></label>
                                                        <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="salary" value="{{ isset($user) ? $user->salary : '' }}"placeholder="الراتب" required>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                  

                                                </td>

                                                <td>

                                                    <div class="form-group">
                                                        <label for="name"> مدة  عقد العمل    <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="DurationContract" value="{{ isset($user) ? $user->DurationContract : '' }}" placeholder="مدة العقد  " required>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </td>
                                                
                                            </tr>

                                            <tr>
                                               

                                            
                                          
                                                <td>
                                                    <div class="form-group">
                                                        <label for="name"> الإيبان البنكي    <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="iban" value="{{ isset($user) ? $user->iban : '' }}" placeholder=" الايبان" required>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <label for="name"> رقم الجوال    <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone1" value="{{ isset($user) ? $user->phone1 : '' }}"  placeholder=" الجوال" required>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                
                                                </td>
                                                <td>

                                                    <div class="form-group">
                                                        <label for="name">رقم الجوال  الثاني      <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone2" value="{{ isset($user) ? $user->phone2 : '' }}" placeholder=" رقم الجوال الثاني" >
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="email">البريد الألكتروني <span class="text-red">*</span></label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user) ? $user->email : '' }}"  placeholder=" البريد    " required>
                                                        <div class="help-block with-errors" ></div>
                
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                   
                                                </td>
                                                <td>

                                                    <div class="form-group">
                                                        <label for="password">كلمة السر <span class="text-red">*</span></label>
                                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة السر "  value="{{ isset($user) ? $user->note_p : '' }}"   required>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>

                                            
                                        </table>

            

 

                                    <br><hr>
                                    <div class="form-group">
                                        <label for="password-confirm">صورة الهوية   </label>
                                        <input id="password-confirm" type="file" class="form-control" name="image" {{ isset($user)? '': 'required' }}>
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
        <style>
            .table td,.table th{
                border-top:0px solid #dee2e6
            }
           
        </style>
    @endpush
@endsection
