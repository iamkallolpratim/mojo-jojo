<form class="form" role="form" method="POST" action="{{empty($task) ? 'store' : 'update'}}">
                        
                        {{csrf_field()}}
                        @if (!empty($task))
                            <input type="hidden" name="id" value="{{$task->id}}">
                        @endif
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="task title" value="{{empty($task->title) ? '' : $task->title}}" required>
                            @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Title</label>
                            <textarea name="description" class="form-control"  rows="3">{{empty($task->description) ? '' : $task->description}}</textarea>
                            @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">task
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{!empty($task) && $task->status == 'active' ? 'selected' : ''}}>Active</option>
                                <option value="pending" {{!empty($task) && $task->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                <option value="completed" {{!empty($task) && $task->status == 'completed' ? 'selected' : ''}}task>Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                        </div>
                    </form>