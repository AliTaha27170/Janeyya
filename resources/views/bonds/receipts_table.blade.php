
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
 
<select class="select" data-show-subtext="true" data-live-search="true">
<option data-tokens="name">name</option>
<option data-tokens="family">family</option>
</select>

    <div class="container-fluid big-font " >
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title left">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline ">
                            <h5>التجار  </h5>
                            <span>العدد الكلي : {{ count($bonds) }}  تاجر  </span>
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
                      
                        <h3 > <a class="big-font add" href="{{ route('addDealer') }}">إضافة تاجر جديد  <i class="ik ik-file-plus big-font big"></i></a></h3>

                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Id')}}</th>

                                    <th>حرر من قبل  </th>
                                    <th>للسيد  </th>
                                    <th> له </th>
                                    <th> عليه   </th>
                                    <th>رصيد له </th>
                                    <th> الصندوق </th>
                                    <th>البيان</th>
                               
                                    <th class="nosort">الإجراءات </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($bonds as $bond)
                                    <tr>
                                        <td>{{ $bond->id }}</td>
                                        <td>{{ $bond->who_write->name }}</td>
                                        <td>{{ $bond->user->name }}</td>
                                        <td>{{ $bond->for_him }}</td>
                                        <td>{{ $bond->from_him }}</td>
                                        <td>{{ $bond->id  }}</td>
                                        <td>{{ $bond->details  }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#"><i class="ik ik-eye"></i></a>
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
      
