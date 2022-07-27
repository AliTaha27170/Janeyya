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


    <div class="container-fluid big-font">
    {{-- Start --}}

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>سندات صرف التاجر</h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    
                                    <th>#id</th>
                                    <th> عليه</th>
                                    <th>  رصيد للتاجر</th>
                                    <th> تاريخ </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bonds as $item)
                                    <tr style="   {{   $item->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->for_him }}</td>
                                        <td>{{ $item->tack_from_him}}</td>
                                        <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td> المجموع النهائي</td>
                                    <td>{{ $for_him }}</td>
                                    <td>{{ $take_from_him }}</td>
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
      
