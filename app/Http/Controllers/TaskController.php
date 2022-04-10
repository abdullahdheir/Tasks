<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //

    public function index()
    {

        // Select Data From DataBase

        $tasks =  DB::table('tasks')->get();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {

        // Validate From Form Data


        $request->validate([
            'name' => 'required',
        ]);

        // Insert Data In DataBase
        DB::table('tasks')->insert([
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
            'name' => $request->name,
            'updated_at' => now()
        ]);
        return redirect()->route('tasks_index')->with('insert', 'Inserted Task Successfully ');
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->find($id);
        return view('update', compact('task'));
    }
}
