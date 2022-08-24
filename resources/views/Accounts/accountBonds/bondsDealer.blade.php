@php

$segm = 56456;

@endphp

@extends('layouts.main')
@section('title', 'Data Tables')
@section('content')
<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
@endpush
<style></style>


<div class="container-fluid big-font card-style">
    {{-- Start --}}
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h3>كشف حساب مفصل تاجر</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('getBondAccount',$role) }}" method="get" enctype="multipart/form">
                        
                        {{-- <div class="mb-3 row">
                            <label for="inputPassword" class="col-form-label">تحديد نطاق زمني من : </label>
                            <div class="col-sm-4">
                                <input type="date" required class="form-control w-50" name="from">
                            </div>
                            <label for="inputPassword" class="col-form-label">الى </label>
                            <div class="col-sm-4">
                                <input type="date" required class="form-control w-50" name="to">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary w-50" type="submit">بحث</button>
                            </div>
                        </div> --}}
                    </form>
                    <form action="{{ route('getBondAccount',$role) }}" method="get" enctype="multipart/form">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sample-form">
                                    <div class="form-group text-right">
                                        <label for="">تحديد التاجر </label>
                                        <select class="form-control select2 text-center" required name="user">
                                            <option value="" > -اختر من القائمة -</option>

                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button class="btn btn-primary w-100" type="submit">عرض الكشوف</button>
                            </div>
                        
                        </div>
                    </form>
                    
                    <div class="row justify-content-center">
                        <div class="col">
                            <button id="myButton" class="btn btn-primary">Excel</button>
                            <button id="myButton2" onclick="printDiv()" class="btn btn-danger">print</button>
                            <button id="myButton2" onclick="printDiv()" class="btn btn-dark mr-5">pdf</button>
                        </div>
                       
                    </div>
                    <div class="table-responsive" id="myTable">
                        @if ($logo)
                            <div class="mb-2 d-none" id="logo">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="text-right mr-2">
                                            <h2 class="fs-1"><small>{{ $logo->name }}</small></h2>
                                            <h1><small>المملكةالعربيةالسعودية-القصيم-بريدة</small></h1>
                                            <h1><small>الجوال: {{ $logo->phone1 }}</small></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="logo-print text-center">
                                            <img src="{{$logo->getFirstMediaUrl('logo')}}"  title="logo" class="logo-firm img-fluid" style="width: 150px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-right mr-2">
                                            <p><small>تاريخ الطباعة : {{ date('Y-m-d') }}</small></p>
                                            <p><small>وقت الطباعة :{{ date('H:i:s') }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped text-center" id="tableExcel">
                            <thead class="noExl">
                                @if (isset($user))
                                <center><h3>كشوف السيد {{$user->name}} <br></h3></center>
                                    
                                @endif
                                <tr>

                                    <th>#id</th>
                                    {{-- <th> حررت للسيد </th> --}}

                                    <th> منه </th>
                                    <th> له </th>
                                    <th>   رصيد منه</th>
                                    <th> رصيد له </th>
                                    <th> البيان</th>
                                    <th> تاريخ </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!count($moves))
                                    <center><h3>اختر تاجر من القائمة لعرض كشوفه</h3></center>
                                @else

                                @foreach ($moves as $item)
                                <tr style="   {{   $item->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ number_format($item->from_him) }} </td>
                                    <td>{{ number_format($item->for_him) }} </td>
                                    <td>{{ number_format($item->tack_from_him) }} </td>
                                    <td>{{ number_format($item->pay_him) }} </td>

                                    <td>{{ $item->details }}</td>
                                    <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="res">
                                    <td> المجموع النهائي</td>
                                    <td>{{ number_format($from_him )}} ريال</td>
                                    <td>{{number_format( $for_him) }} ريال</td>
                                    <td>{{ number_format($tack_from_him) }} ريال</td>
                                    <td>{{ number_format($pay_him) }} ريال</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endif
                                
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
</div>

<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endpush
@endsection