@extends('master')

@section('pageTitle')
    Listing all the entries for Project ID: {{$projectid}}
@stop

@section('show')
    <div class="show-results">
        <div class="container">
            <h3>Showing results for Project ID: <span class="label label-primary">{{$projectid}}</span></h3>
            <br>
            <div class="filter-table pull-left">
                Filters:
                <select id="country">
                    <option value="0" selected>Select a country</option>
                    @for ($i = 0; $i < count($country); $i++)
                        <option value="{{$country[$i]}}">{{$country[$i]}}</option>
                    @endfor
                </select>

                <select id="vendor">
                    <option value="0" selected>Select vendor</option>
                    @for ($i = 0; $i < count($vendor); $i++)
                        <option value="{{$vendor[$i]}}">{{$vendor[$i]}}</option>
                    @endfor
                </select>
            </div>
            &nbsp;<a class="btn btn-success" id="csv_download">Download as CSV</a>
            <div class="total-count pull-right">
                <p>Total Number of rows: <span class="label label-primary"></span></p>
            </div>
            <div class="pull-right">
                <span>Total number of results: {{$rawdataset->total()}}</span>
            </div>
        </div>

        <div class="container-fluid">
            <table id="results" class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Counter</th>
                    <th>Project ID</th>
                    <th>Resp ID</th>
                    <th>Vendor</th>
                    <th>Status</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>IP Address</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>LOI (Seconds)</th>
                </tr>
                </thead>
                <tbody id="results-body">
                <?php $counter = 1; ?>
                @foreach($rawdataset as $data)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$data->projectid}}</td>
                        <td>{{$data->respid}}</td>
                        <td>{{is_null($data->vendor) ? "---" : $data->vendor}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->Languageid}}</td>
                        <td>{{is_null($data->city) ? "---" : $data->city}}</td>
                        <td>{{$data->IP}}</td>
                        <td>@if ($data->starttime) {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->starttime)->toDayDateTimeString()}} @endif</td>
                        <td>@if ($data->enddate) {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->enddate)->toDayDateTimeString()}} @else {{$data->enddate}} @endif</td>
                        <td>@if ($data->starttime) {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->enddate)->diffInSeconds(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$data->starttime))}} @endif
                            Secs
                        </td>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {!! $rawdataset->render() !!}
        </div>
    </div>
@stop
