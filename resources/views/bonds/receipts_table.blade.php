@php
$segmen = 4545;
    
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
                <div class="card-header"><h2>سندات الصرف  </h2></div>
                <br>
                <a   href="{{route('receipt')}}" class="btn btn-primary">سند جديد</a> <br><br><br>

                <div class="card-body">
                    <form action="{{ route('receipts_table') }}" method="get" enctype="multipart/form">
                        @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-form-label">تحديد نطاق زمني  من : </label>
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
                    <div class="table-responsive">
                        <table id="data_table" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    
                                    <th>#id</th>
                                    <th> حررت للسيد </th>
                                    <th> الذمة </th>
                                    <th> دفع له</th>
                                    <th> البيانات </th>
                                    <th> تاريخ التحرير </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bonds as $item)
                                    <tr style="   {{   $item->notfic == '1'  ? 'background: #5d7261c2 ;color:#fff': ''}} ">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name_of_user }}</td>
                                        <td>{{ $item->assets }}</td>
                                        <td>{{ $item->pay_him}}</td>
                                        <td>{{ $item->details }}</td>
                                        <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="res">
                                    <td> المجموع النهائي</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $pay_him }}</td>
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
      
