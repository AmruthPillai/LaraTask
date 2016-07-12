@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Whip up a new Task</div>

                    <div class="panel-body">
                        {{-- Form Validation Errors --}}
                        @include('common.errors')

                        {{-- New Task Form --}}
                        <form action="{{ url('task') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            {{-- Task Name --}}
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                            </div>

                            {{-- Task Description --}}
                            <div class="form-group">
                                <label for="task-description" class="col-sm-3 control-label">Task Description</label>
                                <div class="col-sm-6">
                                    <textarea name="description" id="task-description" class="form-control"></textarea>
                                </div>
                            </div>

                            {{-- Add Task Button --}}
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Task
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- Current Tasks -->
                @if (count($tasks) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Current Tasks
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>Task</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        {{-- Task Description --}}
                                        <td class="table-text">
                                            <div>{{ $task->description }}</div>
                                        </td>

                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}"
                                                        class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection