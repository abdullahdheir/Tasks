<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // Select Data From DataBase

        $tasks_admin =  DB::table('tasks')->get();
        $tasks =  DB::table('tasks')->where('user_id', Auth::id())->get();
        $admin = DB::table('users')->where('isAdmin', '=', 1)->find(Auth::id());

        return view('tasks', ['tasks' => $tasks, 'admin' => $admin, 'tasks_admin' => $tasks_admin]);
    }

    public function store(Request $request)
    {

        // Validate From Form Data


        $request->validate([
            'name' => 'required',
        ]);

        // Insert Data In DataBase
        DB::table('tasks')->insert([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('tasks_index')->with('insert', 'Inserted Task Successfully ');
    }

    public function destroy($id)
    {

        // Delete Data From DataBase

        DB::table('tasks')->delete($id);
        return redirect()->route('tasks_index')->with('delete', 'Deleted Task Successfully ');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);
        // Update Date From DataBase

        DB::table('tasks')->where('id', $id)->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'updated_at' => now()
        ]);
        return redirect()->route('tasks_index');
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->find($id);
        return view('update', compact('task'));
    }
}
