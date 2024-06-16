<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function create()
    {
        return view('workspaces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $workspace = new Workspace;
        $workspace->name = $request->name;
        $workspace->description = $request->description;
        $workspace->save();

        return redirect()->route('workspaces.create')->with('success', 'Workspace created successfully!');
    }
}
