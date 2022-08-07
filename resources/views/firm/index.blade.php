@php
    
$a1="2";
@endphp

@extends('layouts.main') 
@section('title', 'الشركات')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 <style></style>


    <div class="container-fluid big-font card-style">
    {{-- Start --}}
    
    @if (session()->has('msg'))
        <div class="alert col-12  alert-second alert-shade alert-dismissible fade show " role="alert" style="background: #2dce89">
            <h4 class="c-grey  pt-3 pb-3 "> {{ session('msg') }} </h4>
            <button type="button" class="close " data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" >×</span>
            </button>
        </div>
    @endif

    <a href="{{ route('firm.create') }}" class="btn btn-primary">اضافة شركة جديدة</a>

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>الشركات</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <button id="myButton" class="btn btn-primary">Excel</button>
                            <button id="myButton2" onclick="printDiv()" class="btn btn-danger">print</button>
                            <button id="myButton2" onclick="printDiv()" class="btn btn-dark mr-5">pdf</button>
                        </div>
                        <div class="col-sm-4">
                           
                        </div>
                    </div>
                    <div class="table-responsive" id="myTable">
                        <div class="logo-print text-center">
                            <img src="{{ $logo->logo }}"  id="logo" title="logo" class="logo-firm" style="visibility:hidden">
                        </div>
                        <table class="table table-bordered text-center" id="tableExcel">
                            <thead class="noExl">
                                <tr>
                                    <th>###{{ __('Id')}}</th>
                                    <th>اسم الشركة</th>
                                    <th> لوجو</th>
                                    <th> رقم الشركة</th>
                                    <th> تاريخ الإضافة </th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($firms as $item)
                                    <tr style="   {{   $item->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                        
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ asset($item->logo) }}" style="width: 150px; height: 100px;"></td>
                                        <td>{{ $item->phone1}}</td>
                                        <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                        <td>
                                            <a href="{{ route('firm.edit',$item->id) }}"><i class="ik ik-edit-2"></i></a>
                                            <a href="{{ route('firm.delete',$item->id) }}" onclick="return confirm('هل أنت متأكد من ذلك ؟ ')"><i class="ik ik-trash-2"></i></a>
                                        </td>
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
  
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
    </script>
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      
