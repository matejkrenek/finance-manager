<?php

use App\Http\Controllers\Workspace\WorkspaceController;
use App\Http\Controllers\Workspace\WorkspaceMembersController;
use App\Models\Workspace;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/workspaces', [WorkspaceController::class, 'index'])->name('workspace.index');
    Route::get('/workspace/create', [WorkspaceController::class, 'create'])->name('workspace.create');
    Route::post('/workspace/create', [WorkspaceController::class, 'store']);


    Route::prefix('/{workspace:slug}')->group(function() {
        Route::get('/', [WorkspaceController::class, 'detail'])->name('workspace.detail');
        Route::get('/members/add', [WorkspaceMembersController::class, 'add'])->name('workspace.members.add');
        Route::post('/members/add', [WorkspaceMembersController::class, 'store']);
    });

    Route::get('/workspace/invitation/{token}', [WorkspaceMembersController::class, 'invitation'])->name('workspace.invitation');
});

