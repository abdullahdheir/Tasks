@extends('layouts.app')

@section('contentTasks')
    <style>
        th {
            text-align: center;
        }

    </style>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @isset($admin)
                @if ($admin != null)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Task
                        </div>

                        <div class="panel-body">
                            <!-- Display Validation Errors -->
                            <!-- New Task Form -->
                            <form action="{{ url('/store') }}" method="POST" class="form-horizontal">
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
                                        <input type="text" name="user_id" id="task-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="task-name" class="col-sm-3 control-label">Task</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="task-name" class="form-control">
                                    </div>
                                </div>

                                <!-- Add Task Button -->
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-btn fa-plus"></i>Add Task
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endisset

            <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <tr>
                                <th>Task</th>
                                @if ($admin != null)
                                    <th>User Id</th>
                                @endif
                                @if ($admin != null)
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($admin != null)
                                @foreach ($tasks_admin as $task)
                                    <tr class="text-center align-middle">
                                        <td class="table-text align-middle">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <!-- Task Delete Button -->

                                        <td class="align-middle">
                                            {{ $task->user_id }}
                                        </td>
                                        <td>

                                            <a href="{{ url('/edit/' . $task->id) }}" class="btn btn-success    ">
                                                <i class="fa fa-btn fa-edit"></i>Edit
                                            </a>

                                            <!-- Task Delete Button -->

                                            <a href="{{ url('/destroy/' . $task->id) }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>
                                            <div>{{ $task->name }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
