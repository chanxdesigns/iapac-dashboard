@extends('master')

@section('pageTitle')
    I-Apac Online Dashboard Management Panel
@stop

@section('content')
    <div class="container">
        <div class="top-banner">
            <h3>Projects Management Dashboard</h3>
            <div class="status-button">
                <div class="col-sm-4">
                    <a href="{{url('/completes')}}" class="success">Completes</a>
                </div>
                <div class="col-sm-4">
                    <a href="{{url('/incompletes')}}" class="failed">Screen Outs</a>
                </div>
                <div class="col-sm-4">
                    <a href="{{url('/quotafull')}}" class="warning">Quotafull</a>
                </div>
            </div>
        </div>
    </div>
    @stop