<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Jobs;
use App\Models\JobTypes;
use Livewire\Component;

/**
 * Class CountriesDropDownList
 * @package App\Http\Livewire
 */
class CountriesDropDownList extends Component
{
    /**
     * @var array
     */
    public $selectedCountry = [];

    /**
     * @var array
     */
    public $country = [];

    /**
     * @param array $selectedCountry
     */
    public function mount($selectedCountry = []): void
    {
        $this->selectedCountry = $selectedCountry;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->country = Country::all();

        return view('components.dropdown.country');
    }
}
