@php
$segmen = 4545;
@endphp

@extends('layouts.main')
@section('title', 'سند صرف')
@section('content')
<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">

@endpush



<div class="container-fluid big-font card-style">

    {{-- Start --}}


    <div class="row pt-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



            <h2 class="c-blue  pt-3 pb-3" style="color: #5d7261"> سند صرف جديد <h2>

                    <form class="" method="POST" action="{{ route('bond',0) }}">



                        @csrf
                        <div class="form-row rt ">





                            <div class="col-md-2  col-lg-2  col-12">
                                <p>صفة المستفيد</p>
                                <select class="form-control" id="role" name="user_id" onchange="roles()" required>



                                    <option value="6">مزارع</option>
                                    <option value="8">تاجر</option>
                                    <option value="3">موظف</option>



                                </select>
                            </div>


                            <div class="col-md-2  col-lg-2  col-12">

                                <p> الاسم </p>

                                <select class="form-control" id="" name="user_id" required>


                                    <option value="" id="user">- السيد -</option>

                                    @foreach ($users as $item)

                                    <option value="{{ $item->id }}" class="o{{ $item->role }}"> {{ $item->name }}
                                    </option>

                                    @endforeach



                                </select>
                            </div>


                            <div class="col-md-2  col-lg-2  col-12">

                                <p> من الصندوق</p>

                                <select class="form-control" id="" name="fund_id" required>


                                    <option value="" id="user">- الصندوق  -</option>

                                    @foreach ($funds as $item)

                                    <option value="{{ $item->id }}" > {{ $item->name }}
                                    </option>

                                    @endforeach



                                </select>
                            </div>

                            <div class="col-md-3  col-lg-3  col-12">
                                <p> المبلغ  </p>

                                <input type="number" placeholder="المبلغ  " name="amount" class="form-control"
                                    required>
                            </div>








                        </div>

                        <div class="form-row " style="direction: rtl">
                            <div class=" col-6">
                                <textarea type="number" placeholder="البيان  " name="details"
                                    class="form-control"></textarea>
                            </div>
                            <div class=" col-1">
                                <button type="submit" class="btn btn-primary">حفظ</button> <br><br><br>
                            </div>


                        </div>

                        <div class="form-row " style="direction: rtl">



                        </div>
        </div>

    </div>

    </form>
</div>
</div>







<style>
    .pagination {
        display: inline-flex;
    }
</style>

{{-- End --}}

<script>
    $(document).ready(function(){

      


    });
         
    function stope(id) {
            for (let index = 1; index < 10; index++) {
                
                if (index != id) {
                    $(".o"+index).css("display" , "none");
                    $(".o"+index).attr("disabled", true);
                }
                
            }
            $(".o"+id).css("display" , "block");
                    $(".o"+id).attr("disabled", false);
                    $("#user").prop('selected', 'selected');

        }
    function roles() {
            $select = $("#role").val();
            return stope($select);
        }
        stope(6);
        
</script>



</div>


<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

@endpush
@endsection