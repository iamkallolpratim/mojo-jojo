@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{empty($task) ? 'Create' : 'Update'}} Task</div>

                <div class="panel-body">
                    @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                    @include('task._form') 
                    @else
                    <h3 class="alert alert-danger">You are not authorised to create task</h3> 
                    @endif           
                </div>
            </div>
        </div>
        
        @if (!empty($task))        
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Subtasks under {{$task->title}}
                    @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                    <a href="{{route('subtask.create')}}" class="btn btn-primary">Create Subtask</a>
                    @endif
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                                <th>Edit</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                <th>Delete</th>
                                @endif
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subtasks as $subtask)
                                <tr>
                                    <td>{{$subtask->id}}</td>
                                    <td>{{$subtask->title}}</td>
                                    <td>{{$subtask->description}}</td>
                                    <td>{{$subtask->status}}</td>
                                    @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                                    <td><a href="{{route('subtask.details',[$id = $subtask->id])}}"><i class="fa fa-edit"></i></a></td>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                    <td><a href="{{route('subtask.delete',[$id = $subtask->id])}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection