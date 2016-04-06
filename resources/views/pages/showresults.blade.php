@extends('master')

@section('pageTitle')
    Listing all the entries for Project ID: {{$projectid}}
    @stop

@section('content')
    <div class="show-results">
        <h3>Showing results for Project ID: <span class="label label-primary">{{$projectid}}</span></h3>
        <br>
        <div class="filter-table pull-left">
            Filter by country:
            <select id="country">
                <option value="0" selected>Select a country</option>
                @for ($i = 0; $i < count($country); $i++)
                    <option value="{{$country[$i]}}">{{$country[$i]}}</option>
                @endfor
            </select>
        </div>
        <div class="total-count pull-right">
            <p>Total Number of rows: <span class="label label-primary"></span></p>
        </div>
        <table id="results" class="table table-hover">
            <thead>
            <tr>
                <th>Project ID</th>
                <th>Resp ID</th>
                <th>Status</th>
                <th>Country</th>
                <th>IP Address</th>
                <th>End Date</th>
            </tr>
            </thead>
            <tbody id="results-body">
            @for ($i = 0; $i < count($arrDatas); $i++)
                {{dump($arrDatas[$i])}}
                <tr>
                    <td>{{$arrDatas[$i]['projectid']}}</td>
                    <td>{{$arrDatas[$i]['respid']}}</td>
                    <td>{{$arrDatas[$i]['status']}}</td>
                    <td>{{$arrDatas[$i]['Languageid']}}</td>
                    <td>{{$arrDatas[$i]['IP']}}</td>
                    <td>{{$arrDatas[$i]['enddate']}}</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    @stop