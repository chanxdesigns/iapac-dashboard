@extends('master')

@section('content')
    <?php
    //Extra PHP variables
    $projectid = "Project ID";
    $survey_link = "Survey Link";
    ?>
    <div class="container">
        <div class="view-single-projects">
            <div class="main-header">
                <h3>Project details for: <span>{{$data->$projectid}}</span></h3>
                <p>{{$data->About}}</p>
            </div>
            <table>
                <tr>
                    <td>Project Country:</td>
                    <td>{{$data->Country}}</td>
                </tr>
                <tr>
                    <td>Project Vendor:</td>
                    <td>{{$data->Vendor}}</td>
                </tr>
                <tr>
                    <td>Survey Link</td>
                    <td>{{$data->$survey_link}}</td>
                </tr>
                <tr>
                    <td>Project Live Link</td>
                    <td>http://project.i-apaconline.com/survey/{{$data->$projectid}}/{{$data->Vendor}}/{{$ccode}}/lang?id=XXXXX
                    </td>
                </tr>
                <tr>
                    <td>Client Complete Link:</td>
                    <td>http://redirects.i-apaconline.com/Complete/{{$data->$projectid}}/XXXXXX/{{$ccode}}</td>
                </tr>
                <tr>
                    <td>Client Terminate Link:</td>
                    <td>http://redirects.i-apaconline.com/Incomplete/{{$data->$projectid}}/XXXXXX/{{$ccode}}</td>
                </tr>
                <tr>
                    <td>Client Quotafull Link:</td>
                    <td>http://redirects.i-apaconline.com/Quotafull/{{$data->$projectid}}/XXXXXX/{{$ccode}}</td>
                </tr>
                <tr>
                    <td>Vendor Complete Link:</td>
                    <td>{{$data->C_Link}}</td>
                </tr>
                <tr>
                    <td>Vendor Terminate Link:</td>
                    <td>{{$data->T_Link}}</td>
                </tr>
                <tr>
                    <td>Vendor Quotafull Link:</td>
                    <td>{{$data->Q_Link}}</td>
                </tr>
            </table>
            <div class="status-button">
                <p style="display: none">{{$data->$projectid}}</p>
                <div class="col-md-6">
                    <a href="{{route('projects.edit',['vendor' => $data->Vendor, 'projectid' => $data->{'Project ID'}, 'country' => $data->Country])}}"
                       class="info">Edit Project</a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('delete.projectid',['projectid' => $data->{'Project ID'}])}}" class="failed"
                       id="deletePrj">Delete Project</a>
                </div>
            </div>
        </div>
    </div>
@stop