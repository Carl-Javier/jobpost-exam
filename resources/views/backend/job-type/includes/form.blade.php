<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">@lang('Type Name')</label>

    <div class="col-md-10">
        <input type="text" name="name" class="form-control" placeholder="{{ __(' Type Name') }}"
               value="{{ old('name', isset($types) ? $types->name : '') }}" maxlength="100" required/>
    </div>
</div><!--form-group-->

