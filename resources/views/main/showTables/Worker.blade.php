
@php
$segment1 ='Farmer';
@endphp

@extends('layouts.main') 
@section('title', 'Data Tables')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 


    <div class="container-fluid big-font " style="margin-right: 225px;">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title left">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline ">
                            <h5>الموظفون :   </h5>
                            <span>العدد الكلي :   {{ count($users) }} موظف  </span>
                        </div>
                        <br> <br>
                        <div>
                            <select name="" id=""  class="select">
                                <option value="1">البحث عن طريق الاسم </option>
                                <option value="5">البحث عن طريق رقم الهوية </option>
                                <option value="2"> ID البحث عن طريق ال  </option>
                            </select>
                        </div>

                        <br>
                    </div>
                </div>
                <div class="col-lg-4" >
                    <nav class="breadcrumb-container" aria-label="breadcrumb">

                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ar">
                      
                        <h3 > <a class="big-font add" href="{{ route('addWorker') }}">إضافة موظف  جديد  <i class="ik ik-file-plus big-font big"></i></a></h3>

                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>

                                    <th>اسم الموظف </th>
                                    <th>رقم الجوال </th>
                                    <th>الراتب   </th>
                                    <th> الايبان  </th>
                                    <th>الإيميل</th>
            
                               
                                    <th>صورة الهوية </th>
                                    <th class="nosort">الإجراءات </th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone1 }}</td>
                                        <td>{{ $user->salary}}</td>
                                        <td>{{ $user->iban }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="#pop-up" onclick="return imageClick('{{ route('showImage',$user->id) }}')">Click</a></td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                <a href="{{ route('editWorker',$user->id) }}"><i class="ik ik-edit-2"></i></a>
                                                <a href="{{ route('deleteWorker',$user->id) }}" onclick="return confirm('هل أنت متأكد من ذلك ؟ ')"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


               

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      
