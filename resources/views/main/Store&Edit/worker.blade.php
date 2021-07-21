@extends('layouts.main') 
@section('title', 'Add User')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js">
        </script>
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"/>
    @endpush
  
    
    <div class="container-fluid">
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
               
                        <img src="{{ asset('iconfinder_2620515_employee_job_laptop_seeker_unemployee_icon.svg') }}"  width="55px" border="0" class="img_">
                        <h1> الموظفون     </h1>
                      
                    </div>
                    
                    <div class="card-body">
                        <form class="forms-sample" method="POST"

                         action="{{ isset($user)? route('updateWorker',$user->id) : route('storeWorker') }}" 
                         
                         enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">


                                        <table class="table">
                                            <tr>
                                                <td>
                                               
                                            
                                                        <label for="name">اسم الموظف   <span class="text-red">*</span></label>
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
                                    
                                </div>
                            </div>
                        


            
                            <center>
                                <h1>
                                    <br>

                                   ((  صلاحيات الموظف ))
                                    <br>
                                    <br>

                                </h1>
                            </center>

                            <h1 class="ss">
                                <br>
                                الطاقم : 
                                <br>
                            </h1>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                    <div class="control-group">
                                        <h1 class="colored">المزارعون</h1>
                                        <label class="control control--checkbox">إضافة وتعديل 
                                            <input type="checkbox" name="a3" {{ isset($user) && $user->check_role($user->id,3,"edit") ? "checked='checked'" : ''}}  />
                                            <div class="control__indicator"></div>
                                          </label>
                                          <label class="control control--checkbox">حذف 
                                            <input type="checkbox" name="b3" {{ isset($user) && $user->check_role($user->id,3,"delete") ? "checked='checked'" : ''}}/>
                                            <div class="control__indicator"></div>
                                          </label>
                                          <label class="control control--checkbox">قراءة
                                            <input type="checkbox" name="c3" {{ isset($user) && $user->check_role($user->id,3,"read") ? "checked='checked'" : ''}}/>
                                            <div class="control__indicator"></div>
                                          </label>
                                   
                                     

                                </div>
                            </div>
                                </div>

                         
                              </div>
                              <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                <div class="control-group">
                                    <h1 class="colored">الدلالون</h1>
                                    <label class="control control--checkbox">إضافة وتعديل 
                                        <input type="checkbox" name="a2" {{ isset($user) && $user->check_role($user->id,2,"edit") ? "checked='checked'" : ''}}  />
                                        <div class="control__indicator"></div>
                                      </label>
                                      <label class="control control--checkbox">حذف 
                                        <input type="checkbox" name="b2" {{ isset($user) && $user->check_role($user->id,2,"delete") ? "checked='checked'" : ''}}  />
                                        <div class="control__indicator"></div>
                                      </label>
                                      <label class="control control--checkbox">قراءة
                                        <input type="checkbox" name="c2" {{ isset($user) && $user->check_role($user->id,2,"read") ? "checked='checked'" : ''}} />
                                        <div class="control__indicator"></div>
                                      </label>
                               
                                 

                            </div>
                        </div>
                            </div>

                     
                          </div>


                          <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                            <div class="control-group">
                                <h1 class="colored">الكُتاب</h1>
                                <label class="control control--checkbox">إضافة وتعديل 

                                    <input type="checkbox" name="a1" {{ isset($user) && $user->check_role($user->id,1,"edit") ? "checked='checked'" : ''}}  />
                                    <div class="control__indicator"></div>
                                  </label>
                                  <label class="control control--checkbox">حذف 
                                    <input type="checkbox" name="b1" {{ isset($user) && $user->check_role($user->id,1,"delete") ? "checked='checked'" : ''}} />
                                    <div class="control__indicator"></div>
                                  </label>
                                  <label class="control control--checkbox">قراءة
                                    <input type="checkbox" name="c1" {{ isset($user) && $user->check_role($user->id,1,"read") ? "checked='checked'" : ''}} />
                                    <div class="control__indicator"></div>
                                  </label>
                           
                             

                        </div>
                    </div>
                        </div>

                 
                      </div>


                      <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                        <div class="control-group">
                            <h1 class="colored">التُجار</h1>
                            <label class="control control--checkbox">إضافة وتعديل 
                                <input type="checkbox" name="a4" {{ isset($user) && $user->check_role($user->id,4,"edit") ? "checked='checked'" : ''}}  />
                                <div class="control__indicator"></div>
                              </label>
                              <label class="control control--checkbox">حذف 
                                <input type="checkbox" name="b4" {{ isset($user) && $user->check_role($user->id,4,"delete") ? "checked='checked'" : ''}} />
                                <div class="control__indicator"></div>
                              </label>
                              <label class="control control--checkbox">قراءة
                                <input type="checkbox" name="c4" {{ isset($user) && $user->check_role($user->id,4,"read") ? "checked='checked'" : ''}} />
                                <div class="control__indicator"></div>
                              </label>
                       
                         

                    </div>
                </div>
                    </div>

             
                  </div>




                            </div>


<!-- العناصر الرئيسية  -->


<h1 class="ss">
    <br>
    عناصر اللوحة الرئيسية  : 
    <br>
</h1>
       
<div class="row">
  
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
        <div class="control-group">
            <h1 class="colored">الفواتير </h1>
            <label class="control control--checkbox">إضافة وتعديل 
                <input type="checkbox" name="a5" {{ isset($user) && $user->check_role($user->id,5,"edit") ? "checked='checked'" : ''}}  />
                <div class="control__indicator"></div>
              </label>
              <label class="control control--checkbox">حذف 
                <input type="checkbox" name="b5" {{ isset($user) && $user->check_role($user->id,5,"delete") ? "checked='checked'" : ''}} />
                <div class="control__indicator"></div>
              </label>
              <label class="control control--checkbox">قراءة
                <input type="checkbox" name="c5" {{ isset($user) && $user->check_role($user->id,5,"read") ? "checked='checked'" : ''}} />
                <div class="control__indicator"></div>
              </label>
       
         

    </div>
</div>
    </div>


  </div>

  <div class="col-sm-3">
    <div class="card">
        <div class="card-body">
    <div class="control-group">
        <h1 class="colored">سندات الصرف  </h1>
        <label class="control control--checkbox">إضافة وتعديل 
            <input type="checkbox" name="" />
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">حذف 
            <input type="checkbox" name=""/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">قراءة
            <input type="checkbox" name=""/>
            <div class="control__indicator"></div>
          </label>
   
     

</div>
</div>
</div>


</div>


<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
    <div class="control-group">
        <h1 class="colored">سندات القبض </h1>
        <label class="control control--checkbox">إضافة وتعديل 
            <input type="checkbox" name="" />
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">حذف 
            <input type="checkbox" name=""/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">قراءة
            <input type="checkbox" name=""/>
            <div class="control__indicator"></div>
          </label>
   
     

</div>
</div>
</div>


</div>


<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
    <div class="control-group">
        <h1 class="colored">القيود </h1>
        <label class="control control--checkbox">إضافة وتعديل 
            <input type="checkbox" name="" />
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">حذف 
            <input type="checkbox" name=""/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">قراءة
            <input type="checkbox" name=""/>
            <div class="control__indicator"></div>
          </label>
   
     

</div>
</div>
</div>


</div>

</div>



<h1 class="ss">
  <br>
 الحسابات : 
  <br>
</h1>
     
<div class="row">

  <div class="col-sm-3">
      <div class="card">
          <div class="card-body">
      <div class="control-group">
          <h1 class="colored">أنواع التمور  </h1>
          <label class="control control--checkbox">إضافة وتعديل 
              <input type="checkbox" name="a6" {{ isset($user) && $user->check_role($user->id,6,"edit") ? "checked='checked'" : ''}}  />
              <div class="control__indicator"></div>
            </label>
            <label class="control control--checkbox">حذف 
              <input type="checkbox" name="b6" {{ isset($user) && $user->check_role($user->id,6,"delete") ? "checked='checked'" : ''}} />
              <div class="control__indicator"></div>
            </label>
            <label class="control control--checkbox">قراءة
              <input type="checkbox" name="c6" {{ isset($user) && $user->check_role($user->id,6,"read") ? "checked='checked'" : ''}} />
              <div class="control__indicator"></div>
            </label>
     
       

  </div>
</div>
  </div>


</div>



</div>







                            <center>
   <div class="form-group">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                            </center>
                         

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
        <style>
     h1 {
  font-weight: 700;
  font-size: 24px;
  margin-top: 0;
}
.colored{
    color: #309943;
}
.control-group {
    text-align: right;
  display: inline-block;
  vertical-align: top;
  background: #fff;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  padding: 30px;
  height: 250px;
  width: 100%;
  margin: 10px;
}
.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
}
.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.control__indicator {
  position: absolute;
  top: 0px;
  left: 0;
  height: 16px;
  width: 16px;
  background: #fff;
  border: 1px solid #ccc;
/*
  .control:hover input:not([disabled]):checked ~ &,
  .control input:checked:focus ~ &
    border-color: #666
    */
}
.ss{
    margin-right: 35px;
}
.control--checkbox .control__indicator {
  border-radius: 3px;
}
.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input:not([disabled]) ~ .control__indicator,
.control input:focus ~ .control__indicator {
  border-color: #666;
}
.control input:checked ~ .control__indicator {
  background: #fff;
}
.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked ~ .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
  left: 5px;
  top: 0px;
  width: 5px;
  height: 12px;
  border: solid #34bb92;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b;
}
.control--radio .control__indicator:after {
  left: 5px;
  top: 5px;
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background: #34bb92;
}
.control--radio input:disabled ~ .control__indicator:after {
  background: #7b7b7b;
}
.select {
  position: relative;
  display: inline-block;
  margin-bottom: 15px;
  width: 100%;
}
.select select {
  display: inline-block;
  width: 100%;
  cursor: pointer;
  padding: 10px 15px;
  outline: 0;
  border: 0;
  border-radius: 0;
  background: #e6e6e6;
  color: #7b7b7b;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
.select select::-ms-expand {
  display: none;
}
.select select:hover,
.select select:focus {
  color: #000;
  background: #ccc;
}
.select select:disabled {
  opacity: 0.5;
  pointer-events: none;
}
.select__arrow {
  position: absolute;
  top: 16px;
  right: 15px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-style: solid;
  border-width: 8px 5px 0 5px;
  border-color: #7b7b7b transparent transparent transparent;
}
.select select:hover ~ .select__arrow,
.select select:focus ~ .select__arrow {
  border-top-color: #000;
}
.select select:disabled ~ .select__arrow {
  border-top-color: #ccc;
}

.btn-primary{
    background:#308d41;
}

        </style>
    @endpush
@endsection
