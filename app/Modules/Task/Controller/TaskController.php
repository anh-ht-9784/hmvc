<?php
namespace App\Modules\Task\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        # parent::__construct();
    }
    public function index(Request $request){
        $taskOfUser = Task::all();
        return view('Task::index', compact('taskOfUser'));
    }
    public function detail($id){
        $task = Task::find($id);
        return view('Task::detail',compact('task'));

    }
    public function store(Request $request){
        return view('Task::index');
    }
    public function update(Request $request){
        return view('Task::index');
    }
    public function delete($id){
        $task = Task::find($id);
        $task->delete();
        return view('Task::index');
    }
}
