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
                <th>Counter</th>
                <th>Project ID</th>
                <th>Resp ID</th>
                <th>Status</th>
                <th>Country</th>
                <th>IP Address</th>
                <th>End Date</th>
            </tr>
            </thead>
            <tbody id="results-body">
            @foreach($rawdataset as $data)
                <?php $country += 1; ?>
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$data->projectid}}</td>
                    <td>{{$data->respid}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->Languageid}}</td>
                    <td>{{$data->IP}}</td>
                    <td>{{$data->enddate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @stop