@extends('backend.layouts.app')

@section('title', __('Create Job Type'))

@push('after-styles')

@endpush
@section('content')
    <x-forms.post :action="route('admin.tags.store')" enctype="multipart/form-data" files="true">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Job Type')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.tags.list')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="pb-5">
                    @include('backend.job-type.includes.form')
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right submit-btn" type="submit">@lang('Create')</button>
            </x-slot>

        </x-backend.card>
    </x-forms.post>
@endsection
