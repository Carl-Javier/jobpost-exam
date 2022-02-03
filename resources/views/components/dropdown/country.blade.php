<select id="rank" class="form-control country-selector" multiple name="country[]">
    @foreach($this->country as $country)
        <option value="{{ $country->id }}" @if((old('country') && in_array($country, old('country')) )  || ( !empty($this->selectedCountry) && in_array($country, $this->selectedCountry)) )  selected="selected" @endif>
            {{ $country->country_name }}
        </option>
    @endforeach
</select>
