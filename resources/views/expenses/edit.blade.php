@extends('layouts.main') 
@section('title', 'تعديل المصاريف')
@section('content')
    

    <div class="container-fluid card-style">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">صفحة</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">تعديل المصاريف</li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card rt">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">تعديل المصاريف </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('expenses.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $expens->id }}" /> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-name">المبلغ</label>
                                                <input type="text" value="{{ $expens->price }}"  class="form-control" name="price" id="example-name">
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-message">بيان المصاريف</label>
                                                <textarea  name="description" rows="3" class="form-control">{{ $expens->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit">حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
