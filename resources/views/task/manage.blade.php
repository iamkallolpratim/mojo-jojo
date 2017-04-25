@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Tasks
                    @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                    <a href="{{route('task.create')}}" class="btn btn-primary">Create Task</a>
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
                                <th>Total subtasks</th>
                                @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                                    <th>Edit</th>
                                @else
                                <th>View Subtasks</th>
                                @endif
                                @if (Auth::user()->role == 'admin')
                                <th>Delete</th>
                                @endif
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>{{$task->subtasks->count()}}</td>
                                    @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                                    <td><a href="{{route('task.details',[$id = $task->id])}}"><i class="fa fa-edit"></i></a></td>
                                    @else
                                    <td><a href="{{route('task.details',[$id = $task->id])}}"><i class="fa fa-eye"></i></a></td>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                    <td><a href="{{route('task.delete',[$id = $task->id])}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection