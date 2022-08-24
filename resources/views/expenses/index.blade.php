@php
    
$a1="2";
@endphp

@extends('layouts.main') 
@section('title', 'المصاريف')
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
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>المصاريف</h3></div>
                <form action="{{ route('expenses.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group text-right mr-15 mt-5">
                                <label for="exampleFormControlTextarea1">المبلغ</label>
                                <input type="text" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-right mr-15 mt-5">
                                <label for="exampleFormControlTextarea1">بيان مصاريف</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right mr-15 mt-5">
                        <button type="submit" class="btn btn-primary text-right">حفظ</button>
                    </div>
                </form>
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
                                    <th>المبلغ</th>
                                    <th>البيان</th>
                                    <th> تاريخ الإضافة </th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expens)
                                    <tr style="   {{   $expens->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                        
                                        <td>{{ $expens->id }}</td>
                                        <td>{{ $expens->price }}</td>
                                        <td>{{ $expens->description }}</td>
                                        <td>{{ $expens->created_at->format('m/d/Y') }}</td>
                                        <td>
                                            <a href="{{ route('expenses.edit',$expens->id) }}"><i class="ik ik-edit-2"></i></a>
                                            <a href="{{ route('expenses.delete',$expens->id) }}" onclick="return confirm('هل أنت متأكد من ذلك ؟ ')"><i class="ik ik-trash-2"></i></a>
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
      
