@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-dashboard">
                <div class="dashboard" style="font-size:16px">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        @if(Auth::user()->checkAdmin())
                        <div class="col-sm-4">
                            <a href="/management">
                                <h3>Management</h3>
                                <img width="100px" src="{{asset('images/management.svg')}}" alt="#">
                            </a>
                        </div>
                        
                        <div class="col-sm-4">
                            <a href="/cashier">
                                <h3>Cashier</h3>
                                <img width="100px" src="{{asset('images/cashier.svg')}}" alt="#">
                            </a>    
                        </div>

                        <div class="col-sm-4">
                            <a href="/report">
                                <h3>Report</h3>
                                <img width="100px" src="{{asset('images/report.svg')}}" alt="#">
                            </a>
                        </div>

                        @else
                        <div class="col-12">
                            <a href="/cashier">
                                <h3>Cashier</h3>
                                <img width="100px" src="{{asset('images/cashier.svg')}}" alt="#">
                            </a>    
                        </div>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
