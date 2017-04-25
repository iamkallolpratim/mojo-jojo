@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{empty($task) ? 'Create' : 'Update'}} Task</div>

                <div class="panel-body">
                    @include('task._form')          
                </div>
            </div>
        </div>
        @if (!empty($task))        
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Subtasks under {{$task->title}}
                    <a href="{{route('subtask.create')}}" class="btn btn-primary">Create Subtask</a>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subtasks as $subtask)
                                <tr>
                                    <td>{{$subtask->id}}</td>
                                    <td>{{$subtask->title}}</td>
                                    <td>{{$subtask->description}}</td>
                                    <td>{{$subtask->status}}</td>
                                    <td><a href="{{route('subtask.details',[$id = $subtask->id])}}"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="{{route('subtask.delete',[$id = $subtask->id])}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
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