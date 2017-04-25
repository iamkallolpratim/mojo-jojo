<form class="form" role="form" method="POST" action="{{empty($subtask) ? 'store' : 'update'}}">
                        
                        {{csrf_field()}}
                        @if (!empty($subtask))
                            <input type="hidden" name="id" value="{{$subtask->id}}">
                        @endif
                        <div class="form-group">
                            <label for="task_id">Select Task</label>
                            <select name="task_id" class="form-control">
                                @foreach ($tasks as $task)
                                    <option value="{{$task->id}}" {{!empty($subtask) && $subtask->task_id == $task->id ? 'selected' : ''}}>{{$task->title}}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="subtask title" value="{{empty($subtask->title) ? '' : $subtask->title}}" required>
                            @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control"  rows="3">{{empty($subtask->description) ? '' : $subtask->description}}</textarea>
                            @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{!empty($subtask) && $subtask->status == 'active' ? 'selected' : ''}}>Active</option>
                                <option value="pending" {{!empty($subtask) && $subtask->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                <option value="complete" {{!empty($subtask) && $subtask->status == 'pending' ? 'complete' : ''}}subtask>Complete</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                        </div>
                    </form>