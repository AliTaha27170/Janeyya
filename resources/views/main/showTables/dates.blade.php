@php
    
$a1="2";
@endphp
@extends('layouts.main') 
@section('title', 'الاصناف')
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
<h4 class="c-grey  pt-3     pb-3"> تعديل الفئة " {{ $item->name }} " </h4>
<form class="" method="POST" action="{{ route('updateDate',$item->id) }}">


@else
<h4 class="c-grey  pt-3 pb-3">  إضافة فئة  جديدة من التمور </h4>
<form class="" method="POST" action="{{ route('storeDate') }}">



@endif
    @csrf
            <div class="form-row align-items-center">
                <div class="col-4">
                    <label class="sr-only" for="inlineFormInput">اسم الفئة</label>
                    <input type="text" class="form-control " id="" name="name" value="{{ isset($item) ? $item->name : '' }}" required
                        placeholder="اسم الفئة">
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
    <div class="mb-2 d-none" id="logo">
        <div class="text-right mr-2">
            <span>الشركة:<h1>{{ $logo->name }}</h1></span>
            <span>رقم الهاتف:<h1>{{ $logo->phone1 }}</h1></span>
        </div>
        <div class="logo-print text-center">
            <img src="{{$logo->getFirstMediaUrl('logo')}}"  title="logo" class="logo-firm img-fluid" style="width: 150px; height: 100px;">
        </div>
    </div>
    <table class="table" id="tableExcel">
        <thead class="thead-dark noExl">
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الفئة </th>
            <th scope="col">الإجراءات</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('editDate', $item->id) }}" class="btn btn-primary">تعديل<div class="ripple-container"></div></a>
                    <a href="{{ route('deleteDate',$item->id) }}" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف الفئة  {{ $item->name }}؟')">حذف<div class="ripple-container"></div></a>
                </td>
            </tr>    
            @endforeach

        </tbody>
    </table>
</div>

    @if ( ! count($items))
        <h4 class="c-grey  pt-3 pb-3 cen"> ما من فئات لعرضها !   </h4>
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
@endsection
      
