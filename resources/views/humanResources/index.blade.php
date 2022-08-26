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
    <div class="container-fluid big-font card-style">
    {{-- Start --}}
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>الموارد البشرية</h3></div>
                <form action="{{ route('humanResources.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-right mr-15 mt-5">
                                <label for="exampleFormControlTextarea1">الطلب</label>
                                <div class="col-md-6">
                                    <select class="form-control text-center" id="" name="reason">
                                        <option value="طلب اجازة"> طلب اجازة</option>
                                        <option value="سلفة">سلفة</option>
                                        <option value="نقل"> نقل</option>
                                        <option value="انهاء خدمات"> انهاء خدمات</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group text-right mr-15 mt-5">
                                <label for="exampleFormControlTextarea1">سبب الطلب</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="reason_discription"></textarea>
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
                                    <th>الموظف</th>
                                    <th>السبب</th>
                                    <th>البيان</th>
                                    <th>الحالة</th>
                                    <th>سبب الموافقه او الرفض</th>
                                    <th>الملف الورقي</th>
                                    <th>تاريخ الإضافة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($humanResources as $humanResource)
                                    <tr style="   {{   $humanResource->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                                        
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $humanResource->user->name }}</td>
                                        <td>{{ $humanResource->reason }}</td>
                                        <td>{{ $humanResource->reason_discription }}</td>
                                        @if ($humanResource->status == '0')
                                            <td>قيد المعاينة</td>
                                        @elseif ($humanResource->status == '1')
                                            <td>مقبول</td>
                                        @else
                                            <td>مرفوض</td>
                                        @endif
                                        @if ($humanResource->status_discription)
                                            <td>{{ $humanResource->status_discription }}</td>
                                        @else
                                            <td>قيد المعاينة لم يتم التحديد</td>
                                        @endif
                                        <td>
                                            @if ($humanResource->file_name)
                                                <a href="{{ route('downloadFile',$humanResource->file_name) }}" class="text-blue"> الملف</a>
                                            @else
                                                لم يدرج اي ملف
                                            @endif    
                                        </td>
                                        <td>{{ $humanResource->created_at->format('m/d/Y') }}</td>
                                        
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
      
