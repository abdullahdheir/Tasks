@extends('layouts.app')

@section('edit-task')
    <div class="contanier">
        <div class="container">
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Task
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        <!-- New Task Form -->
                        <form action="{{ url('/update/' . $task->id) }}" method="POST" class="form-horizontal">
                            @csrf
                            <!-- Task Name -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="user_id" class="col-sm-3 control-label">User Id</label>

                                <div class="col-sm-6">
                                    <input type="text" name="user_id" id="task-name" class="form-control"
                                        value="{{ $task->user_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control"
                                        value="{{ $task->name }}">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-edit"></i>update Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
