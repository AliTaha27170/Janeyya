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
                            <h5>شركات التسويق </h5>
                            <span>العدد الكلي : 15 شركة</span>
                        </div>
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
                    <div class="card-header ar"><h3 > <a class="big-font add" href="{{ route('addCompany') }}">إضافة شركة جديدة  <i class="ik ik-file-plus big-font big"></i></a></h3></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <button id="myButton" class="btn btn-primary">Excel</button>
                                <button id="myButton2" onclick="printDiv()" class="btn btn-danger">print</button>
                                <button id="myButton2" onclick="printDiv()" class="btn btn-dark mr-5">pdf</button>
                            </div>
                        </div>
                        <div class="table-responsive" id="myTable">
                            <table  class="table">
                                <thead class="noExl">
                                    <tr>
                                        <th>{{ __('Id')}}</th>
                                        <th class="nosort">إيقونة الشركة </th>
                                        <th>اسم الشركة</th>
                                        <th>الإيميل</th>
                                        <th class="nosort">الإجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __('001')}}</td>
                                        <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                        <td>{{ __('Erich Heaney')}}</td>
                                        <td>{{ __('erich@example.com')}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('002')}}</td>
                                        <td><img src="../img/users/2.jpg" class="table-user-thumb" alt=""></td>
                                        <td>{{ __('Abraham Douglas')}}</td>
                                        <td>{{ __('jgraham@example.com')}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('003')}}</td>
                                        <td><img src="../img/users/3.jpg" class="table-user-thumb" alt=""></td>
                                        <td>{{ __('Roderick Simonis')}}</td>
                                        <td>{{ __('grant.simonis@example.com')}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('004')}}</td>
                                        <td><img src="../img/users/4.jpg" class="table-user-thumb" alt=""></td>
                                        <td>{{ __('Christopher Henry')}}</td>
                                        <td>{{ __('henry.chris@example.com')}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('005')}}</td>
                                        <td><img src="../img/users/5.jpg" class="table-user-thumb" alt=""></td>
                                        <td>{{ __('Sonia Wilkinson')}}</td>
                                        <td>{{ __('boyle.aglea@example.com')}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
                                                <a href="#"><i class="ik ik-edit-2"></i></a>
                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
      
