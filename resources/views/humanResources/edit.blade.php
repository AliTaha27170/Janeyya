@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
    <div class="container-fluid card-style">
     

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <hr class="mb-0"> 
                    <div class="card-body text-right"> 
                        <small class="d-block">الطلب </small>
                        <h6>{{ $humanResource->reason }}</h6> 
                        <small class="text-muted d-block pt-10">سبب الطلب</small>
                        <h6>{{ $humanResource->reason_discription }}</h6> 
                        <small class="text-muted d-block pt-10">الحالة</small>
                        <h6> 
                            @if ($humanResource->status == '0')
                                قيد المعاينة
                            @elseif ($humanResource->status == '1')
                                مقبول
                            @else
                                مرفوض
                            @endif
                        </h6>
                        @if ($humanResource->status_discription)
                        <small class="text-muted d-block pt-10">سبب بعد القبول او الرفض</small>
                        <h6>{{ $humanResource->status_discription }}</h6> 
                        @endif
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card rt">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">الاعدادات</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('humanResources.update') }}" method="post" enctype="multipart/form-data">
                                    
                                    @csrf
                                    <input type="hidden" name="id" value="{{$humanResource->id}}" />
                                    <div class="form-group">
                                        <label for="example-name">الحالة</label>
                                        <select class="form-control text-center" id="example-name" name="status">
                                            <option value="1"> مقبول</option>
                                            <option value="2">مرفوض</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">السبب</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="status_discription"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">موافقة او رفض ورقي</label>
                                        <input type="file" class="form-control" name="file_name">
                                    </div>
                                    <button class="btn btn-success" type="submit">تحديث</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
