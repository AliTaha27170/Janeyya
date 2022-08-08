
@php
$a3="2";
@endphp

@extends('layouts.main') 
@section('title', 'الفواتير')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
       
    @endpush
 


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


<div class="row pt-4">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
@if (isset($bill))
<h4 class="c-blue  pt-3 pb-3" id="add">  <a href="#" class="a-add">   <span>{{ $bill->code }}</span>  تفاصيل الفاتورة     </a></h4>
<form class="" method="POST" action="{{ route('updateBill',$bill->id) }}">


@else
<h4 class="c-blue  pt-3 pb-3" id="add">  <a href="#" class="a-add">إضافة فاتورة   جديدة  </a></h4>
<form class="" method="POST" action="{{ route('storeBill') }}" id="myForm" style="display: none">



@endif
    @csrf
            <div class="form-row align-items-center" style="direction: rtl" id="{{ isset($bill) ? '' : 'rowM' }}">
                @if (auth()->user()->role != 4 )


                @endif

                <div class="col-md-4  col-lg-4   col-12">
                    <select class="form-control" id="" name="dalal_id"  >
                        
                        @if (isset($bill->dalal_id))
                        <option value="{{ $bill->get_dalal->id }}"> {{ $bill->get_dalal->name }}</option>

                        @endif

                        <option value="">- الدلال -</option>


                        @foreach ($dalals as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                    @endforeach

                       
                    </select>
                </div>
                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="dealer_id"  >
                        @if (isset($bill->dealer_id))
                        <option value="{{ $bill->get_dealer->id }}"> {{ $bill->get_dealer->name }}</option>

                        @endif
                        <option value="">- التاجر -</option>

                        @foreach ($dealers as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                        @endforeach


                       
                       
                    </select>
                </div>

                @if (auth()->user()->role == 4 )
                <div class="col-md-4  col-lg-4  col-12">
                </div>

                @endif

                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="farmer_id"  >
                       
                        @if (isset($bill->farmer_id))
                        <option value="{{ $bill->get_farmer->id }}"> {{ $bill->get_farmer->name }}</option>

                        @endif
                        <option value="">- المزارع -</option>
                       
                        @foreach ($farmers as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                    @endforeach

                       
                       
                    </select>
                </div>

            
                <div class="col-md-4  col-lg-4  col-12">
                    <select class="form-control" id="" name="pay_type" required >
                        
                        @if (isset($bill->pay_type))
                        <option value="{{ $bill->pay_type }}"> {{ $bill->pay_type = 2 ? "نقدي" : "آجل"}}</option>
                        @endif
                        <option value="">- نقدي أو أجل  -</option>
                        <option value="2"> نقدي</option>
                        <option value="1"> أجل</option>

                       
                    </select>
                </div>

                <div class="col-md-4  col-lg-4  col-12">
                </div>

                <div class="col-md-4  col-lg-6  col-12">
                    <input class="form-control" name="name" placeholder="اسم العميل (في حال لم يكن تاجر )" value="{{ isset($bill->name) ? $bill->name :''}}">
                </div>

                <div class="col-md-4  col-lg-6  col-12">
                    <input class="form-control" name="phone" placeholder="رقم الهاتف الخاص بالعميل " value="{{ isset($bill->phone) ? $bill->phone :''}}" >
                </div>
         
                @if (isset($bill))
                    
                @foreach ($bill->Date_Bill as $item_)
                    
                <div class="col-md-2  col-lg-2  col-12">
                    <select class="form-control" id="" name="date_id[]"  required>
                        
                        <option value="{{ $item_->date_id }}"> {{ $item_->date_->name }}</option>

                        <option value="">- صنف التمر  -</option>

                        @foreach ($dates as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                       @endforeach

                       
                       
                    </select>
                </div>

                <div class="col-md-3  col-lg-3  col-12">
                    <input type="number"  placeholder="الكمية "  name="quantity[]" class="form-control" required value="{{ $item_->quantity }}"> 
                 </div>
 
                 
                 <div class="col-md-3  col-lg-3  col-12">
                     <input type="number" placeholder="السعر الإفرادي  " name="price[]"  class="form-control" required value="{{ $item_->price }}" > 
                  </div>
  
                  <div class="col-md-3  col-lg-3  col-12">
                      <span>القيمة</span>
                    <input type="number" placeholder="   " name="price[]"  class="form-control" required value="{{ $item_->price *  $item_->quantity}}"> 
                 </div>
                 @endforeach


                @else
                    
                <div class="col-md-2  col-lg-2  col-12">
                    <select class="form-control" id="" name="date_id[]"  required>
                        <option value="">- صنف التمر  -</option>

                        @foreach ($dates as $item)

                        <option value="{{ $item->id }}"> {{ $item->name }}</option>

                       @endforeach

                       
                       
                    </select>
                </div>

                <div class="col-md-3  col-lg-3  col-12">
                    <input type="number"  placeholder="الكمية "  name="quantity[]" class="form-control" required> 
                 </div>
 
                 
                 <div class="col-md-3  col-lg-3  col-12">
                     <input type="number" placeholder="السعر الإفرادي  " name="price[]"  class="form-control" required> 
                  </div>
  
                  <div class="col-md-3  col-lg-3  col-12">
                 </div>
                  @endif


  
              
                          
            
            </div>
            
            <div class="col-md-2  col-lg-2  col-2">
                <br>

                <div class="col-md-2  col-lg-2  col-2">
                    <br>
    
                    @if (isset($bill))
                    <sapn id="" > الإجمالي : {{ $bill->total  }} SP </span> <br><br><br>
                        @endif

                    <a id="new" href="#"> صنف جديد </a> <br><br><br>
    
                </div>
                <button type="submit" class="btn btn-primary">حفظ</button> <br><br><br>
            </div>
        </form>
    </div>
</div>

@if (isset($_GET['today']))
<h4 class="c-blue  pt-3 pb-3" id="add" >  <a href="{{ route('showBills') }}" class="a-add" style="color: rgb(54, 118, 51)">عرض  جميع الفواتير   </a></h4>

@else
<h4 class="c-blue  pt-3 pb-3" id="add" >  <a href="?today=on" class="a-add" style="color: rgb(54, 118, 51)">عرض فواتير اليوم   </a></h4>

@endif
<div class="table-responsive" id="myTable">
    <table  class="table">
        <thead>
            <tr>
                <th>{{ __('Id')}}</th>
                <th>صاحب الفاتورة </th>
                <th> قام بتنظيمها </th>
                <th> قيمة الفاتورة </th>
                <th> تاريخ الإضافة </th>

                <th class="nosort">الإجراءات </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr style="   {{   $item->notfic == '1'  ? 'background:#009688;color:#fff': ''}} ">
                    @if (auth()->user()->role == 2)
                        {{ $item->read($item->id) }}
                    @endif
                    <td>{{ $item->id }}</td>
                    <td>{{ isset($item->name) ? $item->name : $item->get_dealer->name }}</td>
                    <td>{{ $item->get_who_write->name }}</td>
                    <td>{{ isset($item->total) ? $item->total : '' }} SR</td>
                    <td>{{ $item->created_at->format('m/d/Y') }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('editBill',$item->id) }}"><i class="ik ik-eye"></i></a>
                            <a href="{{ route('deleteBill',$item->id) }}" onclick="return confirm('هل أنت متأكد من ذلك ؟ ')"><i class="ik ik-trash-2"></i></a>
                        </div>
                    </td>
                    
                
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


  

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

    <script>
        $('#new').click(
         
           function() {
               html = '   <div class="col-md-4  col-lg-4  col-12">                <select class="form-control" id="" name="date_id[]"  >                    <option value="">- صنف التمر  -</option>                    @foreach ($dates as $item)                    <option value="{{ $item->id }}"> {{ $item->name }}</option>                   @endforeach                          </select>            </div>           <div class="col-md-4  col-lg-4  col-12">                <input type="number"  placeholder="الكمية "  name="quantity[]" class="form-control">              </div>            <div class="col-md-4  col-lg-4  col-12">            <input type="number" placeholder="السعر الإفرادي  " name="price[]"  class="form-control">              </div>          <br><br>          ';  
                   
               $('#rowM').append(html);
            }
        );
    </script>

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
      
    @endpush
@endsection
      
