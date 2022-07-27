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


    <div class="container-fluid big-font" style="direction: rtl">
    {{-- Start --}}

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>فواتير المزارع</h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table table-bordered text-center">
                            <thead>
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


    <script type="text/javascript">
        $(window).resize(function () {
                $("table.data_table").resize();
        });
    </script>

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      