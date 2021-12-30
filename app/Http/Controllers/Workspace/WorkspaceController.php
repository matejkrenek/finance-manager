<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkspaceController extends Controller
{

    public function index() {
        $workspaces = User::find(Auth::id())->workspaces()->get();

        return view('web.workspace.index', ['workspaces' => $workspaces]);
    }

    public function create() {
        return view('web.workspace.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'min:6', 'max:255'],
            'description' => ['nullable', 'string', 'min:6', 'max:255'],
            'image' => ['nullable', 'image', 'max:255', 'mimes:jpg,png,jpeg']
        ]);

        try {
            $workspace = DB::transaction(function() use($request) {
                $workspace = Workspace::create([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);
    
                UserWorkspace::create([
                    'user_id' => $workspace->author_id,
                    'workspace_id' => $workspace->id
                ]);

                return $workspace;
            });
            
            return redirect()->route('workspace.detail', ['workspace' => $workspace]);

        } catch(\Throwable $err) {
            self::error("Something went front with saving data");
            return redirect()->back();
        }


    }

    public function detail(Workspace $workspace) {

        if (Gate::denies('view-workspace', $workspace)) {

            self::warning("You are not member of the workspace you have tried to reach");

            return redirect()->route('workspace.index');
        }

        return view('web.workspace.detail', ['workspace' => $workspace]);
    }
}
