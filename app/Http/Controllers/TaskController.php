<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * The Task Repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new Controller Instance.
     *
     * @param TaskRepository $tasks
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @param   Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());

        return view('tasks.index')
            ->with(compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max: 255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('tasks');
    }
}
