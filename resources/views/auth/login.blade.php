@extends('master')

@section('content')
    <div class="page-header">
        <h1>Administrator Login</h1>
    </div>
    <div class="login-form">
        <form method="POST" action="/admin/login">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Login</button>
            </div>
        </form>
    </div>
@stop