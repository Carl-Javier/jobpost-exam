<select id="jobType" class="form-control type-selector" multiple name="type[]">
    @foreach($this->type as $type)
        <option value="{{ $type->id }}" @if((old('type') && in_array($type, old('type')) )  || ( !empty($this->selectedType) && in_array($type, $this->selectedType)) )  selected="selected" @endif>
            {{ $type->name }}
        </option>
    @endforeach
</select>
