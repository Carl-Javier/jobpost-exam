<?php

use App\Http\Controllers\Backend\JobsController;
use App\Models\Jobs;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/jobs', 301);
Route::group(['prefix' => 'jobs', 'as' => 'jobs.', 'middleware' => ['auth', config('boilerplate.access.middleware.verified'), 'role:' . config('boilerplate.access.role.admin')]], function () {
    Route::get('/', [JobsController::class, 'index'])
        ->name('list')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Jobs Management'), route('admin.jobs.list'));
        });

    Route::get('create', [JobsController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.jobs.list')
                ->push(__('Create Jobs'), route('admin.jobs.create'));
        });

    Route::post('store', [JobsController::class, 'store'])->name('store');

    Route::get('{jobs}/edit', [JobsController::class, 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, Jobs $jobs) {
            $trail->parent('admin.jobs.list')
                ->push(__('Edit Jobs'), route('admin.jobs.edit', $jobs))
            ;
        });

    Route::patch('{jobs}/update', [JobsController::class, 'update'])->name('update');
    Route::get('{jobs}/detail', [JobsController::class, 'show'])->name('show');
    Route::delete('{jobs}/delete', [JobsController::class, 'delete'])->name('delete');

});
