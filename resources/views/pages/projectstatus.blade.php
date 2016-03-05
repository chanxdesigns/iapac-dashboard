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
                    <li class="box">
                        <div class="list-item">
                            <a href="{{url(strtolower($arrDatas[$i]['status']),$arrDatas[$i]['projectid'])}}"><h3>{{$arrDatas[$i]['projectid']}}</h3></a>
                            @if (!empty($arrDatas[$i]['about'])) <p class="about">{{$arrDatas[$i]['about']}}</p> @endif
                            <div class="circle"></div>
                            <p class="counter"> &nbsp;{{$dataCounts[$i]}} @if ($dataCounts[$i] === 1) {{$status}} @else {{$status.'s'}} @endif</p>
                        </div>
                    </li>
                @endfor
            </ul>
            @else
            <div class="alert alert-danger" role="alert">Oh! Sorry to say but there is no <strong>{{$status.'s'}}</strong> as of now</div>
        @endif
    </div>
    @stop