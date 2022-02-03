@extends('backend.layouts.app')

@section('title', __('Edit Job Type'))

@push('after-styles')

@endpush
@section('content')
    <x-forms.patch :action="route('admin.tags.update', $tags)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Type')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.tags.list')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="pb-5">
                    @include('backend.job-tag.includes.form')
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
            </x-slot>

        </x-backend.card>
    </x-forms.patch>
@endsection
