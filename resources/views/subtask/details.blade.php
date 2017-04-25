@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{empty($task) ? 'Create' : 'Update'}} Subask</div>

                <div class="panel-body">
                    @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                    @include('subtask._form') 
                    @else
                    <h3 class="alert alert-danger">You are not authorised to create sub task</h3> 
                    @endif        
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection