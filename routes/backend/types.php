<?php

use App\Http\Controllers\Backend\JobTypeController;
use App\Models\JobTypes;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/types', 301);
Route::group(['prefix' => 'types', 'as' => 'types.', 'middleware' => ['auth', config('boilerplate.access.middleware.verified'), 'role:' . config('boilerplate.access.role.admin')]], function () {
    Route::get('/', [JobTypeController::class, 'index'])
        ->name('list')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Job Type Management'), route('admin.types.list'));
        });

    Route::get('create', [JobTypeController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.types.list')
                ->push(__('Create Job Type'), route('admin.types.create'));
        });

    Route::post('store', [JobTypeController::class, 'store'])->name('store');

    Route::get('{types}/edit', [JobTypeController::class, 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, JobTypes $types) {
            $trail->parent('admin.types.list')
                ->push(__('Edit Types'), route('admin.types.edit', $types))
            ;
        });

    Route::patch('{types}/update', [JobTypeController::class, 'update'])->name('update');
    Route::delete('{types}/delete', [JobTypeController::class, 'delete'])->name('delete');

});
