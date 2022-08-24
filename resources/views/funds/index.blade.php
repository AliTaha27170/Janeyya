@php
    
    $segmen = 4546
    @endphp

@extends('layouts.main') 
@section('title', 'الصناديق')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 


    <div class="container-fluid big-font card-style">
    {{-- Start --}}

@if (session()->has('msg'))

   
<div class="alert col-12  alert-second alert-shade alert-dismissible fade show " role="alert">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msg') }}        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
        </button>
    </div>
        </div>
</div>


@endif


<div class="row pt-4">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
@if (isset($item))
<h4 class="c-grey  pt-3     pb-3"> تعديل معلومات الصندوق " {{ $item->name }} " </h4>
<form class="" method="POST" action="{{ route('updateFund',$item->id) }}">


@else
<h4 class="c-grey  pt-3 pb-3">  إضافة صندوق </h4>
<form class="" method="POST" action="{{ route('storeFund') }}">



@endif
    @csrf
            <div class="form-row align-items-center">
                <div class="col-4">
                    <label class="sr-only" for="inlineFormInput">اسم الصندوق</label>
                    <input type="text" class="form-control " id="" name="name" value="{{ isset($item) ? $item->name : '' }}" required
                        placeholder="اسم الصندوق">
                </div>

                <div class="col-2">
                    
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>
<br><br><br>
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
    <table class="table" id="tableExcel">
        <thead class="thead-dark noExl">
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الصندوق </th>
            <th scope="col"> الرصيد </th>
            <th scope="col">الإجراءات</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->assets,2) }}  ريال</td>
                 
                <td>
                    <a href="{{ route('editFund', $item->id) }}" class="btn btn-primary">تعديل<div class="ripple-container"></div></a>
                </td>
            </tr>    
            @endforeach

        </tbody>
    </table>
</div>

    @if ( ! count($items))
        <h4 class="c-grey  pt-3 pb-3 cen"> ما من صناديق لعرضها !   </h4>
    @endif

    <div class="cen">
        <center class="cen">
            {{$items->links("pagination::bootstrap-4")}}

        </center>

    </div>

    <style>
        .pagination{
            display: inline-flex;
        }
        .c-grey{
            text-align: right;
        }
    </style>

{{-- End --}}

        </div>


               

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      
