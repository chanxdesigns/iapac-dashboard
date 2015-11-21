@extends('master')

@section('pageTitle')
    @if ($error === 1)
        Project ID already exists
        @else
        Successfully created new Project.
    @endif
    @stop

@section('content')
    <div class="jumbotron">Successfully created new Project.</div>
    @stop
