<?php

namespace App\Http\Livewire;

use App\Models\Jobs;
use App\Models\JobTypes;
use Livewire\Component;

/**
 * Class TypeDropDownList
 * @package App\Http\Livewire
 */
class TypeDropDownList extends Component
{
    /**
     * @var array
     */
    public $selectedType = [];

    /**
     * @var array
     */
    public $type = [];

    /**
     * @param array $selectedJobType
     */
    public function mount($selectedType = []): void
    {
        $this->selectedType = $selectedType;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->type = JobTypes::all();

        return view('components.dropdown.type');
    }
}
