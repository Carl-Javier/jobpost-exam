<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Role;
use App\Models\Jobs;
use App\Models\Tags;
use App\Models\JobTypes;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class JobsTypeTable
 * @package App\Http\Livewire\Backend
 */
class JobsTagTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Tags::latest();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Type name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Created Date'), 'created_at')
                ->searchable()
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.job-tag.includes.row';
    }
}
