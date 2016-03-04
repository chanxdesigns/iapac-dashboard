@extends('master')

@section('content')
    <div class="page-header">
        <p>ADMIN PANEL</p>
        <h3>Welcome, <span>{{Auth::user()->email}}</span></h3>
    </div>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#projects">View Projects</a></li>
        <li role="presentation"><a href="#create">Create Project</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Display Projects Data -->
        <div role="tabpanel" class="tab-pane active fade in" id="projects">
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
                                            <button class="btn btn-danger yes" data-dismiss="modal">Yes</button>
                                            <button class="btn btn-primary" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger delete" data-toggle="modal" data-target=".bs-example-modal-sm">Delete</button>
                        <div class="resp-data">
                            <table class="table table-bordered">
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
        <div role="tabpanel" class="tab-pane" id="create">
            <div class="create-project">
                <div class="col-md-8">
                    <div class="create-form">
                        <form action="/adminpanel/projects/create" method="POST" id="create-project">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="projectid">Project ID</label>
                                <input class="form-control" name="projectid" type="text" id="projectid">
                                <span id="helpBlock" class="help-block">Input your Project ID ex: PJAG555, MC241520D.</span>
                            </div>
                            <div class="form-group">
                                <label for="project-desc">Project Description</label>
                                <textarea class="form-control" rows="3" name="project-desc" id="project-desc"></textarea>
                                <span id="helpBlock" class="help-block">Input a short description about your Project.</span>
                            </div>
                            <div class="form-group">
                                <label for="vendor">Vendor</label>
                                <input class="form-control" name="vendor" type="text" id="projectid">
                                <span id="helpBlock" class="help-block">Input your Project Vendor name.</span>
                            </div>
                            <div class="form-group">
                                <label for="inputcountry">Country</label>
                                <select class="form-control" name="country" id="inputcountry">
                                    <option value="null">Select a country</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="India">India</option>
                                    <option value="China">China</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="UAE">UAE</option>
                                </select>
                                <span id="helpBlock" class="help-block">Select the country from the list.</span>
                            </div>
                            <div class="form-group">
                                <div class="multi-input">
                                    <label for="redirect-link">Redirect Link</label>
                                    <input class="form-control" type="text" name="complete" id="redirect-link complete" placeholder="Vendor complete link">
                                    <input class="form-control" type="text" name="terminate" id="redirect-link terminate" placeholder="Vendor screenout link">
                                    <input class="form-control" type="text" name="quotafull" id="redirect-link quotafull" placeholder="Vendor quotafull link">
                                    <span id="helpBlock" class="help-block">Input the Redirect Link provided by the vendor.</span>
                                </div>
                            </div>
                            <input type="submit" value="Create Project" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop