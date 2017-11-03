<?php namespace App\Http\Controllers;
use App\Tasks;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
class TasksController extends Controller {
	
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		\Auth::user();
		$uid = \Auth::user()->getId();
		$Task = Tasks::latest()->where('user_id', '=', $uid)->get();
		
		return view('tasks.index')->with('Task',$Task);
	}

	public function create()
	{
		return view('tasks.create');
	}
	
	public function show($data)
	{
		$task = Tasks::findorFail($data);
		
		return view('tasks.display')->with('task',$task);
	}
	public function store(Requests\CreateTasksRequest $request)
	{
		$task = new Tasks($request->all());
		\Auth::user()->tasks()->save($task);
		
		return redirect('tasks');
	}
	public function edit($data)
	{
		$task = Tasks::findorFail($data);
		$uid = \Auth::user()->getId();
		$verify=Tasks::latest()->where('id', '=', $data)->where('user_id', '=', $uid)->get();
		if($verify)
		{
		return view('tasks.edit')->with('task',$task);
		}
		else
		{
		return redirect('tasks');
		}
	}
	public function update($id, Requests\CreateTasksRequest $request)
	{
		$task = Tasks::findorFail($id);
		$task->update($request->all());
		return redirect('tasks');
	}
	public function destroy($id)
	{
		$task = Tasks::findorFail($id);
		$task->delete($id);
		return redirect('tasks');
	}
}
