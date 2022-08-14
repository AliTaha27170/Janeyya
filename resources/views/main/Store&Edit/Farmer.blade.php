@extends('layouts.main') 
@section('title', 'Add User')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script> 
            $(document).ready(function(){
                var x=0;
                $("#flip").click(function(){
                    if(x %2 ==0 )
                    {
                       
                        $(".req").prop('required',true);
                        $("#key").val('1');
                     
                    }
                    else
                    {
                        $(".req").prop('required',false);
                        $(".req").val(null);
                        $("#key").val('0');

                    
                    }
           
                    x++;
                  
                  $("#panel").slideToggle("slow");
                });
              });
        </script>
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
               
                        <img src="https://i.ibb.co/TM5748s/iconfinder-Farmer-avatar-occupation-profession-man-human-3319949.png"  width="45px" border="0" class="img_">
                        <h3>المزارعون   </h3>
                      
                    </div>
                    
                    <div class="card-body">
                        <form class="forms-sample" method="POST" enctype="multipart/form-data"
                        action="{{ isset($user) ? route('updateFarmer',$user->id) : route('storeFarmer') }}" 
                        >
                        @csrf
                        
    {{--      لمعرفة هل يوحد متعاقد ام لا  --}}
    
   <input type="text" hidden value="0" id="key" name="key">


                            <div class="row">
                                <div class="col-sm-6" >


                                        <table class="table">
                                            <tr>
                                                <td>
                                               
                                            
                                                    <label for="name">اسم  المزارع   <span class="text-red">*</span></label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"   placeholder="أدخل الاسم" required value="{{  isset($user) ? $user->name  :'' }}">
                                                    <div class="help-block with-errors"></div>
            
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                          <br>

                                            </td>

                                                <td>
                                                    <div class="form-group">
                                                        <label for="name"> الإيبان البنكي    <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="iban"   placeholder=" الايبان" required value="{{  isset($user) ? $user->iban  :'' }}">
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
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone1"   placeholder=" الجوال" required value="{{  isset($user) ? $user->phone1  :'' }}">
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
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder=" البريد    " required value="{{  isset($user) ? $user->email  :'' }}">
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
                                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة السر " required value="{{  isset($user) ? $user->note_p  :'' }}">
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                                <td>

                                                    <div class="form-group">
                                                        <label for="password"> نسبة السعي  <span class="text-red">*</span></label>
                                                        <input id="password" type="number" class="form-control @error('password') is-invalid @enderror" name="rate" placeholder="نسبة السعي" required value="{{  isset($user) ? $user->rate  :'' }}" @if ($has_bills)
                                                            readonly
                                                        @endif>
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                
                                                <td>

                                                    <div class="form-group">
                                                        <label for="password">موقع  المزرعة  <span class="text-red">*</span></label>
                                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="adress" placeholder=" الموقع " required value="{{  isset($user) ? $user->note_p  :'' }}">
                                                        <div class="help-block with-errors"></div>
                
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </td>

                                            </tr>

                                     
                                        </table>

            
                                        <br><hr>
                                        <div class="form-group">
                                            <label for="password-confirm">صورة الهوية   </label>
                                            <input id="password-confirm" type="file" class="form-control" name="image" placeholder="تأكيد الكلمة "  value="{{  isset($user) ? ''  :'required' }}"  >
                                            <div class="help-block with-errors"></div>
                                        </div>
<br>
 
                                        @if (isset($user1))
                                        <a href="#2" id="" style="color: #f5365c"><h4>معلومات المتعاقد</h4></a>
                                        @else
                                       <a href="#271" id="flip" style="color: #f5365c"><h4>إضافة متعاقد</h4></a>
                                        @endif
                   
                                    
                                
                                </div>
                                <br>
                               
                            </div>
                        
                 
                    </div>







                    <div class="card-body card__" id="panel"  >
                       
                            <div class="row">
                                <div class="col-sm-6" style="background-color: #ffeb3b47">


                                        <table class="table">
                                            <tr>
                                                <td>
                                               
                                            
                                                    <label for="name">اسم  المتعاقد   <span class="text-red">*</span></label>
                                                    <input id="name" type="text" class="req form-control @error('name') is-invalid @enderror" name="name1"   placeholder="أدخل الاسم" value="{{   isset($user1) ? $user1->name :'' }}">
                                                    <div class="help-block with-errors"></div>
            
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                          <br>

                                            </td>

                                                <td>
                                                    <div class="form-group">
                                                        <label for="name"> الإيبان البنكي    <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="req form-control  @error('name') is-invalid @enderror" name="iban1"   placeholder=" الايبان" value="{{   isset($user1) ? $user1->iban :'' }}">
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
                                                        <input id="name" type="text" class="req form-control @error('name') is-invalid @enderror" name="phone11"   placeholder=" الجوال" value="{{   isset($user1) ? $user1->phone1 :'' }}">
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
                                                        <input id="email" type="email" class="req form-control @error('email') is-invalid @enderror" name="email1" value="{{ isset($user1) ? $user1->email:''}}" placeholder=" البريد    " value="{{   isset($user1) ? $user1->email :'' }}">
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
                                                        <input id="password" type="text" class="req form-control @error('password') is-invalid @enderror" name="password1" placeholder="كلمة السر " value="{{   isset($user1) ? $user1->note_p :'' }}">
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

                                            <tr>


                                        
                                                    
                                                    <td>

                                                        <div class="form-group">
                                                            <label for="password">قيمة العقد   <span class="text-red">*</span></label>
                                                            <input id="password" type="number" class="req form-control @error('password') is-invalid @enderror" name="t3akdPrice" placeholder="قيمة العقد   " value="{{   isset($user1) ? $user1->t3akdPrice :''}}">
                                                            <div class="help-block with-errors"></div>
                    
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </td>

                                                
                                            </tr>
                                        </table>

            

 

                                    <br><hr>
                                    <div class="form-group">
                                        <label for="password-confirm">صورة هوية المتعاقد   </label>
                                        <input id="password-confirm" type="file" class=" {{   isset($user1) ? '':'req' }} form-control" name="image1" placeholder="  " >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    
                                
                                </div>
                          
                            </div>
                  
                    </div>




                    <br>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </form>

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
            .card__{
                display: none;
            }
    
        </style>

        @if (isset($user1))
        <style>
            .card__{
                display: block;
            }
        </style>
       <script>
        $("#key").val('1');
       </script>
    @endif
    @endpush
@endsection
