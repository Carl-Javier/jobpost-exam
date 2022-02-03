<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label">@lang('Job type')</label>

    <div class="col-md-10">
        <livewire:type-drop-down-list :selectedTypes="!empty($selectedJobTypes) ? $selectedJobTypes : []"/>
    </div>
</div><!--form-group-->
<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

    <div class="col-md-10">
        <input type="text" name="title" class="form-control" placeholder="{{ __('Title') }}"
               value="{{ old('title', isset($jobs) ? $jobs->title : '') }}" maxlength="100" required/>
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">@lang('Company Name')</label>

    <div class="col-md-10">
        <input type="text" name="company_name" class="form-control" placeholder="{{ __('Company Name') }}"
               value="{{ old('company_name', isset($jobs) ? $jobs->company_name : '') }}" maxlength="100" required/>
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label">@lang('Salary Details')</label>

    <div class="col-md-10">
        <input type="text" name="salary_details" class="form-control" placeholder="{{ __('Salary Details') }}"
               value="{{ old('salary_details', isset($jobs) ? $jobs->salary_details : '') }}" maxlength="100" required/>
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label">@lang('Job Location(s)')</label>

    <div class="col-md-10 pb-4">
        <livewire:countries-drop-down-list :selectedCountry="!empty($selectedCountry) ? $selectedCountry : []"/>
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label">@lang('JobTag')</label>

    <div class="col-md-10 pb-4">
        <livewire:tag-drop-down-list :selectedTag="!empty($selectedTag) ? $selectedTag : []"/>
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label">@lang('Description')</label>

    <div class="col-md-10 pb-4">
        <textarea class="ckeditor form-control" style="height: 250px;" placeholder="Enter Here ..."
                  name="description">{{ old('description', isset($jobs) ? $jobs->description : '') }}</textarea>
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label"></label>

</div><!--form-group-->

<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label">@lang('Publish date')</label>

    <div class="col-md-5 pb-4">
        <input type="text" class="form-control datetimepicker" value="{{ old('published_date', isset($jobs) ? $jobs->published_date : '') }}" id="datetimepicker" name="published_date">
    </div>
    <div class="col-md-5 pb-4">
        <label for="body" class=" col-form-label">@lang('Publish Now')</label>
        <input type="checkbox" name="is_published" {{ old('is_published', isset($jobs) ? $jobs->is_published === \App\Models\Jobs::PUBLISHED ? 'checked' : '': '') }} value="1">
    </div>
</div><!--form-group-->

<div class="form-group row">
    <label for="body" class="col-md-2 col-form-label">@lang('Expiration date')</label>

    <div class="col-md-5 pb-4">
        <input type="text" class="form-control datetimepickerexpiry" value="{{ old('published_date', isset($jobs) ? $jobs->expiration_date : '') }}" id="datetimepickerexpiry" name="expiration_date">
    </div>
</div><!--form-group-->

@push('after-scripts')
    @include('backend.job-list.includes.form_js')
@endpush
