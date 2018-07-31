@extends('master')

@section('content')
    <div class="chart-back">
        <div class="container">
            <div class="chart-container">
                <h3 class="title">Chart For Project ID: {{$projectId}} for {{$country}}</h3>
            </div>

            <div id="chartMsg"><h3>Loading Chart ...</h3></div>

            <canvas id="myChart"></canvas>

            <h3 class="completes text-center">Completes: <span style="background: yellow">0</span></h3>

            <div id="ir" style="text-align: center; width: 100%"></div>
        </div>
    </div>
@endsection