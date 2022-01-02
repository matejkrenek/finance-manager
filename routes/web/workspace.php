<?php

use App\Http\Controllers\Workspace\WorkspaceController;
use App\Http\Controllers\Workspace\WorkspaceInvitationController;
use App\Http\Controllers\Workspace\WorkspaceMembersController;
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

    Route::get('/workspace/invitation/{token}', [WorkspaceInvitationController::class, 'invitation'])->name('workspace.invitation');
    Route::post('/workspace/invitation/{token}/accept', [WorkspaceInvitationController::class, 'accept'])->name('workspace.invitation.accept');
    Route::post('/workspace/invitation/{token}/reject', [WorkspaceInvitationController::class, 'reject'])->name('workspace.invitation.reject');
    Route::get('/{workspace:slug}/invitations', [WorkspaceInvitationController::class, 'list']);
});

