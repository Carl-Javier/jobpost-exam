<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">@lang('Tag Name')</label>

    <div class="col-md-10">
        <input type="text" name="name" class="form-control" placeholder="{{ __(' Tag Name') }}"
               value="{{ old('name', isset($tags) ? $tags->name : '') }}" maxlength="100" required/>
    </div>
</div><!--form-group-->

