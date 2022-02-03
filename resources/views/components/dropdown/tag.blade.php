<select id="jobTag" class="form-control type-selector" multiple name="tag[]">
    @foreach($this->tag as $tag)
        <option value="{{ $tag->id }}" @if((old('tag') && in_array($tag, old('tag')) )  || ( !empty($this->selectedTag) && in_array($tag, $this->selectedTag)) )  selected="selected" @endif>
            {{ $tag->name }}
        </option>
    @endforeach
</select>
