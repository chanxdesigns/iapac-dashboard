@extends('master')

@section('content')
    <div class="page-header">
        <h1>Welcome to Admin Panel <small>{{Auth::user()->email}}</small></h1>
    </div>

    <div class="admin-panel">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Project ID</h3>
                </div>
                @for ($i = 0; $i < count($projectid); $i++)
                    <div class="panel-body">
                        {{ $projectid[$i] }}
                    </div>
                @endfor
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Status</h3>
                </div>
                <div class="panel-body">Complete</div>
                <div class="panel-body">Incomplete</div>
                <div class="panel-body">Quotafull</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Status</h3>
                </div>
                @for ($i = 0; $i < count($country); $i++)
                    <div class="panel-body">
                        {{ $country[$i] }}
                    </div>
                @endfor
            </div>
        </div>

        <button class="btn btn-primary" id="submitlink">Submit</button>
    </div>
    @stop