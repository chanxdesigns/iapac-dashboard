@extends('master')

@section('content')
    <div class="page-header">
        <h1>Welcome to Admin Panel <small>{{Auth::user()->email}}</small></h1>
    </div>

    <div class="admin-panel">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Project ID</h3>
                    </div>
                    <div class="panel-body projectid">
                        <select>
                            <option value="null">Select a Project ID</option>
                            @for ($i = 0; $i < count($projectid); $i++)
                                <option value="{{ $projectid[$i] }}">{{ $projectid[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Status</h3>
                    </div>
                    <?php $status = ["Complete","Incomplete","Quotafull"] ?>
                    <div class="panel-body status">
                        <select>
                            <option value="null">Select a Status</option>
                            @for ($i = 0; $i < count($status); $i++)
                                <option value="{{ $status[$i] }}">{{ $status[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Country</h3>
                    </div>
                    <div class="panel-body country">
                        <select>
                            <option value="null">Select a Country</option>
                            @for ($i = 0; $i < count($country); $i++)
                                <option value="{{ $country[$i] }}">{{ $country[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="submitlink">Submit</button>
            </div>
            <div class="col-md-offset-4">
                <div class="resp-data">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Resp ID</th>
                            <th>Project ID</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>End Date</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop