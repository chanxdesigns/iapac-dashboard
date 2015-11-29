@extends('master')

@section('pageTitle')
    @if ($error === 1)
        Project ID already exists
        @else
        Successfully created new Project.
    @endif
    @stop

@section('content')
    <div class="reg-status">
        <div class="jumbotron">
            @if ($error === 1)
            <h3>Project ID already exists !!</h3>
                @else
            <h3>Successfully created new project !!</h3>
                @endif
        </div>
    </div>
    @stop
