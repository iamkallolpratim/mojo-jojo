@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Hi , {{ Auth::user()->name }} ,welcome to mojo-jojo!
                    <br><br>
                    <a href="{{ route('tasks') }}" class="btn btn-primary">View Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
