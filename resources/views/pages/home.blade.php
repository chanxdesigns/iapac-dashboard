@extends('master')

@section('pageTitle')
    I-Apac Online Dashboard Management Panel
@stop

@section('content')
    <div class="container">
        <div class="top-banner">
            <h3>Manage your respondents' project status.</h3>
        </div>
    </div>
    @stop

@section('statusButton')
    <div class="container">
        <div class="status-button">
            <div class="col-sm-4">
                <a href="{{url('/completes')}}">Completes</a>
            </div>
            <div class="col-sm-4">
                <a href="{{url('/incompletes')}}">Screen Outs</a>
            </div>
            <div class="col-sm-4">
                <a href="{{url('/quotafull')}}">Quotafull</a>
            </div>
        </div>
    </div>
    @stop