@extends('master')

@section('content')
    <div class="create-project">
        <div class="col-md-8">
            <div class="create-form">
                <form action="{{action('ProjectController@updateProject', ['projectid' => $project->{'Project ID'}, 'vendor' => $project->Vendor, 'country' => $project->Country])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="project_desc">Project Description</label>
                        <textarea class="form-control" rows="3" name="project_desc" id="project_desc">{{$project->About}}</textarea>
                        <span id="helpBlock" class="help-block">Input a short description about your Project.</span>
                    </div>
                    <div class="form-group">
                        <label for="vendor">Vendor</label>
                        <input class="form-control" name="vendor" type="text" id="projectid" value="{{$project->Vendor}}">
                        <span id="helpBlock" class="help-block">Input your Project Vendor name.</span>
                    </div>
                    <div class="form-group">
                        <label for="survey_link">Survey Link</label>
                        <input class="form-control" name="survey_link" type="text" id="survey_link" value="<?php $survey_link = 'Survey Link'; echo $project->$survey_link ?>">
                        <span id="helpBlock" class="help-block">Input your Client Survey Link.</span>
                    </div>
                    <div class="form-group">
                        <div class="multi-input">
                            <label for="redirect-link">Redirect Link</label>
                            <input class="form-control" type="text" name="complete" id="redirect-link complete" placeholder="Vendor complete link" value="{{$project->C_Link}}">
                            <input class="form-control" type="text" name="terminate" id="redirect-link terminate" placeholder="Vendor screenout link" value="{{$project->T_Link}}">
                            <input class="form-control" type="text" name="quotafull" id="redirect-link quotafull" placeholder="Vendor quotafull link" value="{{$project->Q_Link}}">
                            <input class="form-control" type="text" name="dropoff" id="redirect-link dropoff" placeholder="Vendor drop off link" value="{{$project->D_Link}}">
                            <span id="helpBlock" class="help-block">Input the Redirect Link provided by the vendor or if Freelancer outsourced, leave it Blank.</span>
                        </div>
                    </div>
                    <input type="submit" value="Update Project" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
    @stop