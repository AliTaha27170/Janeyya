@php
    
$a1="2";
@endphp

@extends('layouts.main') 
@section('title', 'الفواتير')
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
                <div class="card-header"><h3>{{ __('Users')}}</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
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
                        <table class="table table-bordered text-center" id="tableExcel">
                            <thead class="noExl">
                                <tr>
                                    <th>###{{ __('Id')}}</th>
                                    <th>صاحب الفاتورة </th>
                                    <th> قام بتنظيمها </th>
                                    <th> قيمة الفاتورة </th>
                                    <th> تاريخ الإضافة </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Invoices as $item)
                                    <tr style="   {{   $item->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                        @if (auth()->user()->role == 2)
                                            {{ $item->read($item->id) }}
                                        @endif
                                       
                                        <td>{{ $item->code }}</td>
                                        <td>{{ isset($item->name) ? $item->name : $item->get_dealer->name }}</td>
                                        <td>{{ $item->get_who_write->name }}</td>
                                        <td>{{ isset($item->total) ? $item->total : '' }} SR</td>
                                        <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
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
      
