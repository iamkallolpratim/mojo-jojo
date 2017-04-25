@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">{{empty($task) ? 'Create' : 'Update'}} Subask</div>

                <div class="panel-body">
                    @include('subtask._form')          
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection