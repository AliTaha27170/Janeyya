@extends('layouts.main') 
@section('title', 'Invoice')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Invoice')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Invoice')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card" id="MyBill">
            <div class="card-header"><h3 class="d-block w-100">{{ __('ThemeKit')}}<small class="float-right">{{ __('Date: 12/11/2018')}}</small></h3></div>
            <div class="card-body">
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>{{ __('ThemeKit')}},</strong><br>{{ __('795 Folsom Ave, Suite 546')}} <br>{{ __('San Francisco, CA 54656')}} <br>{{ __('Phone: (123) 123-4567')}}<br>{{ __('Email: info@themekit.com')}}
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>{{ __('John Doe')}}</strong><br>{{ __('795 Folsom Ave, Suite 600')}}<br>{{ __('San Francisco, CA 94107')}}<br>{{ __('Phone: (555) 123-7654')}}<br>{{ __('Email: john.doe@example.com')}}
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>{{ __('Invoice #007612')}}</b><br>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped" id="myTable2">
                            <thead>
                                <tr>
                                    <th>{{ __('Qty')}}</th>
                                    <th>{{ __('Product')}}</th>
                                    <th>{{ __('Serial #')}}</th>
                                    <th>{{ __('Description')}}</th>
                                    <th>{{ __('Subtotal')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ __('1')}}</td>
                                    <td>{{ __('Call of Duty')}}</td>
                                    <td>{{ __('455-981-221')}}</td>
                                    <td>{{ __('El snort testosterone trophy driving gloves handsome')}}</td>
                                    <td>{{ __('$64.50')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener("load", function(){
            var printContents = document.getElementById('myTable2').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>

@endsection

