@extends('master')

@section('content')
    <div class="create-response">
        @if ($status === 201)
            <h1 class="success">Project has been successfully created</h1>
        @elseif ($status === 403)
            <h1 class="failed">Project Already Exists!</h1>
        @endif

        @if ($status === 201)
            <table>
                <tr>
                    <td>Project ID:</td>
                    <td>{{$request->projectid}}</td>
                </tr>
                <tr>
                    <td>Project Country:</td>
                    <td>{{$request->country}}</td>
                </tr>
                <tr>
                    <td>Project About:</td>
                    <td>{{$request->project_desc}}</td>
                </tr>
                <tr>
                    <td>Project Vendor:</td>
                    <td>{{$request->vendor}}</td>
                </tr>
                <tr>
                    <td>Complete Link:</td>
                    <td>{{$request->complete}}</td>
                </tr>
                <tr>
                    <td>Terminate Link:</td>
                    <td>{{$request->terminate}}</td>
                </tr>
                <tr>
                    <td>Quotafull Link:</td>
                    <td>{{$request->quotafull}}</td>
                </tr>
            </table>
            @endif

        <div class="status-button">
            <a href="/adminpanel" class="info">Back to Admin Panel</a>
        </div>
    </div>
    @stop