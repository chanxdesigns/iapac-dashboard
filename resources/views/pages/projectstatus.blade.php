@extends('master')

@section('pageTitle')
    Projects with {{$status.'s'}} status.
    @stop

@section('content')
    <div class="projects-lists">
        <h3 class="title"><span class="status-big-text">{{$status."s'"}}</span> lists of all projects.</h3>
        @if (count($arrDatas) > 0)
            <ul>
                @for($i = 0; $i < count($arrDatas); $i++)
                    <li>
                        <div class="list-item">
                            <span class="label label-success">{{$dataCounts[$i]}} @if ($dataCounts[$i] === 1) {{$status}} @else {{$status.'s'}} @endif</span>
                            <a href="{{url(strtolower($arrDatas[$i]['status']),$arrDatas[$i]['projectid'])}}"><h3>{{$arrDatas[$i]['projectid']}}</h3></a>
                            <p>{{$arrDatas[$i]['about']}}</p>
                        </div>
                    </li>
                @endfor
            </ul>
            @else
            <div class="alert alert-danger" role="alert">Oh! Sorry to say but there is no <strong>{{$status.'s'}}</strong> as of now</div>
        @endif
    </div>
    @stop