@php

$a1="2";
@endphp

@extends('layouts.main')
@section('title', 'Data Tables')
@section('content')
<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
@endpush
<style></style>


<div class="container-fluid big-font" style="margin-right: 225px;">
    {{-- Start --}}
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h3>كشف حساب مفصل مزارع</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('getBondAccount',$role) }}" method="get" enctype="multipart/form">
                        
                        <div class="mb-3 row">
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
                        </div>
                    </form>
                    <form action="{{ route('getBondAccount',$role) }}" method="get" enctype="multipart/form">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sample-form">
                                    <div class="form-group text-right">
                                        <label for="">مزارعين </label>
                                        <select class="form-control select2 text-center" name="user">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">
                                <button class="btn btn-primary w-50" type="submit">بحث</button>
                            </div>
                        
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-4">
                            <button id="myButton" class="btn btn-primary">Excel</button>
                            <button id="myButton2" onclick="printDiv()" class="btn btn-danger">print</button>
                            <button id="myButton2" onclick="printDiv()" class="btn btn-dark mr-5">pdf</button>
                        </div>
                    </div>
                    <div class="table-responsive" id="myTable">
                        <table id="data_table" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>

                                    <th>#id</th>
                                    <th> حررت للسيد </th>

                                    <th> عليه</th>
                                    <th> رصيد منه </th>
                                    <th> بيانات </th>
                                    <th> تاريخ </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bonds as $item)
                                <tr style="   {{   $item->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->for_him }}</td>
                                    <td>{{ $item->tack_from_him}}</td>
                                    <td>{{ $item->details }}</td>
                                    <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="res">
                                    <td> المجموع النهائي</td>
                                    <td>{{ $from_him }}</td>
                                    <td>{{ $tack_from_him }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
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