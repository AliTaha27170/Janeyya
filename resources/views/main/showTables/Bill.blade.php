
@php
$a3="2";
@endphp

@extends('layouts.main') 
@section('title', 'Data Tables')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
       
    @endpush
 


    <div class="container-fluid big-font " >
        
{{-- Start --}}

@if (session()->has('msg'))

   
<div class="alert col-12  alert-second alert-shade alert-dismissible fade show " role="alert">
    <h4 class="c-grey  pt-3 pb-3 "> {{ session('msg') }} </h4>
    <button type="button" class="close " data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" >×</span>
    </button>
</div>


@endif


<div class="row pt-4">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
@if (isset($item))
<h4 class="c-grey  pt-3     pb-3"> تعديل الإعلان " {{ $item->title }} " </h4>
<form class="" method="POST" action="{{ route('updateBill',$item->id) }}">


@else
<h4 class="c-blue  pt-3 pb-3" id="add">  <a href="#" class="a-add">إضافة فاتورة   جديدة  </a></h4>
<form class="" method="POST" action="{{ route('storeBill') }}" id="myForm" style="display: none">



@endif
    @csrf
            <div class="form-row align-items-center" style="direction: rtl">
                <div class="col-md-4  col-lg-4   col-12">
                    <select class="form-control" id="" name="writer_id" required >
                        <option value="">- الكاتب -</option>
                        @foreach ($writers as $item)

                            <option value="{{ $item->id }}"> {{ $item->name }}</option>

                        @endforeach

                       
                       
                    </select>
                </div>
                <div class="col-md-4  col-lg-4   col-12">
                    <select class="form-control" id="" name="dalal_id" required >
                        <option value="">- الدلال -</option>

                        @foreach ($dalals as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                    @endforeach

                       
                    </select>
                </div>
                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="dealer_id" required >
                        <option value="">- التاجر -</option>
                        @foreach ($dealers as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                        @endforeach


                       
                       
                    </select>
                </div>

                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="farmer_id" required >
                        <option value="">- المزارع -</option>

                        @foreach ($farmers as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                    @endforeach

                       
                       
                    </select>
                </div>

                <div class="col-md-4  col-lg-4  col-12">
                 </div>

 
                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="pay_type" required >
                        <option value="">- نقدي أو أجل  -</option>
                        <option value="2"> نقدي</option>
                        <option value="1"> أجل</option>

                       
                    </select>
                </div>

         
                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="date_id[]" required >
                        <option value="">- صنف التمر  -</option>

                        @foreach ($dates as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                       @endforeach

                       
                       
                    </select>
                </div>

                <div class="col-md-4  col-lg-4  col-12">
                    <input type="number"  placeholder="الكمية "  name="quantity[]" class="form-control"> 
                 </div>
 
                 
                 <div class="col-md-4  col-lg-4  col-12">
                     <input type="number" placeholder="السعر الإفرادي  " name="price[]"  class="form-control"> 
                  </div>
  

                  <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="date_id[]" required >
                        <option value="">- صنف التمر  -</option>
                        @foreach ($dates as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                       @endforeach

                       
                       
                    </select>
                </div>

                <div class="col-md-4  col-lg-4  col-12">
                    <input type="number"  placeholder="الكمية "  name="quantity[]" class="form-control"> 
                 </div>
 
                 
                 <div class="col-md-4  col-lg-4  col-12">
                     <input type="number" placeholder="السعر الإفرادي  " name="price[]"  class="form-control"> 
                  </div>
  
              
<br><br>
                  <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="date_id[]" required >
                        <option value="">- صنف التمر  -</option>

                        @foreach ($dates as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                       @endforeach

                       
                       
                    </select>
                </div>

                <div class="col-md-4  col-lg-4  col-12">
                    <input type="number"  placeholder="الكمية "  name="quantity[]" class="form-control"> 
                 </div>
 
                 
                 <div class="col-md-4  col-lg-4  col-12">
                     <input type="number" placeholder="السعر الإفرادي  " name="price[]"  class="form-control"> 
                  </div>
  
              
              
            </div>
            
            <div class="col-md-2  col-lg-2  col-2">
                <br>

                <button type="submit" class="btn btn-primary">حفظ</button> <br><br><br>

            </div>
        </form>
    </div>
</div>


<table id="data_table" class="table">
    <thead>
        <tr>
            <th>{{ __('Id')}}</th>
            <th class="nosort"> اسم الكاتب  </th>
            <th>اسم الدلال</th>
            <th>اسم التاجر </th>
            <th>نوع التمر  </th>
            <th> الكمية  </th>
            <th> السعر مفرد  </th>
            <th> السعر إجمالاً  </th>
            <th> رقم  المزرعة  </th>
            <th class="nosort">الإجراءات </th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


  

    <div class="cen">
        <center class="cen">

        </center>

    </div>

    <style>
        .pagination{
            display: inline-flex;
        }
    </style>

{{-- End --}}

<script>
    $(document).ready(function(){
      $("#add").click(function(){
        $("#myForm").slideToggle();
      });
    });
    </script>

    <script>
        
        function getCities($id) {
           
            $.ajax({
                url : "../../../getCities/"+$id,
                type:'GET',
                dataType: 'json',
                success: function(response) {
                    $('#cities').empty();
                     $("#cities").append("<option value=''>- المدينة -</option>");

                    $("#cities").attr('disabled', false);
                    $.each(response,function(key, value)
                    {
                        $("#cities").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                 }
            });
         }

        
    </script>
    </div>
     

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
      
    @endpush
@endsection
      
