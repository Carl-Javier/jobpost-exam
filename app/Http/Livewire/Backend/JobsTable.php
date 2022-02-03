<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\Role;
use App\Models\Jobs;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class JobsTable
 * @package App\Http\Livewire\Backend
 */
class JobsTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Jobs::latest();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Title'), 'title')
                ->searchable()
                ->sortable(),
            Column::make(__('Company'), 'company_name')
                ->searchable(),
            Column::make(__('Tags')),
            Column::make(__('Types')),
            Column::make(__('Published?'), 'is_published')
                ->searchable(),
            Column::make(__('Publish Date'), 'published_date')
                ->searchable(),
            Column::make(__('Expiration'), 'expiration_date')
                ->searchable()
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function rowView(): string
    {
        return 'backend.job-list.includes.row';
    }
}
