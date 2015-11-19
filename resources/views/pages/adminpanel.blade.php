@extends('master')

@section('content')
    <div class="page-header">
        <h1>Welcome to Admin Panel <small>{{Auth::user()->email}}</small></h1>
    </div>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#projects">View Projects</a></li>
        <li role="presentation"><a href="#create">Create Project</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Display Projects Data -->
        <div role="tabpanel" class="tab-pane active" id="projects">
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
                        <!-- Modal Box for Delete Confirmation-->
                        <div class="modal fade bs-example-modal-sm delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Do you really want to delete these items?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p></p>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="pull-right">
                                            <button class="btn btn-danger yes">Yes</button>
                                            <button class="btn btn-primary" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger delete" data-toggle="modal" data-target=".bs-example-modal-sm">Delete</button>
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
                                <tbody></tbody>
                            </table>
                            <div class='alert alert-warning empty-data'>Nothing to show. Please select something ex.(status, projectid and country)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create new projects -->
        <div role="tabpanel" class="tab-pane" id="create">Aw yu</div>
    </div>
    @stop