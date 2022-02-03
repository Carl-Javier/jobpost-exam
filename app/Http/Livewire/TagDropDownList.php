<?php

namespace App\Http\Livewire;

use App\Models\Jobs;
use App\Models\JobTypes;
use App\Models\Tags;
use Livewire\Component;
use phpDocumentor\Reflection\DocBlock\Tag;

/**
 * Class TagDropDownList
 * @package App\Http\Livewire
 */
class TagDropDownList extends Component
{
    /**
     * @var array
     */
    public $selectedTag = [];

    /**
     * @var array
     */
    public $tag = [];

    /**
     * @param array $selectedTag
     */
    public function mount($selectedTag = []): void
    {
        $this->selectedTag = $selectedTag;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->tag = Tags::all();

        return view('components.dropdown.tag');
    }
}
