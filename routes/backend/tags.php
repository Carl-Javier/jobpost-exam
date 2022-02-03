<?php

use App\Http\Controllers\Backend\JobTagController;
use App\Models\Tags;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/tags', 301);
Route::group(['prefix' => 'tags', 'as' => 'tags.', 'middleware' => ['auth', config('boilerplate.access.middleware.verified'), 'role:' . config('boilerplate.access.role.admin')]], function () {
    Route::get('/', [JobTagController::class, 'index'])
        ->name('list')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Job Tag List'), route('admin.tags.list'));
        });

    Route::get('create', [JobTagController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.tags.list')
                ->push(__('Create Job Tag'), route('admin.tags.create'));
        });

    Route::post('store', [JobTagController::class, 'store'])->name('store');

    Route::get('{tags}/edit', [JobTagController::class, 'edit'])
        ->name('edit')
        ->breadcrumbs(function (Trail $trail, Tags $tags) {
            $trail->parent('admin.tags.list')
                ->push(__('Edit JobTag'), route('admin.tags.edit', $tags))
            ;
        });

    Route::patch('{tags}/update', [JobTagController::class, 'update'])->name('update');
    Route::delete('{tags}/delete', [JobTagController::class, 'delete'])->name('delete');

});
