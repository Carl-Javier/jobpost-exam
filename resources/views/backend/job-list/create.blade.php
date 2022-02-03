@extends('backend.layouts.app')

@section('title', __('Create Jobs'))

@push('after-styles')

@endpush
@section('content')
    <x-forms.post :action="route('admin.jobs.store')" enctype="multipart/form-data" files="true">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Jobs')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.jobs.list')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="pb-5">
                    @include('backend.job-list.includes.form')
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right submit-btn" type="submit">@lang('Create')</button>
            </x-slot>

        </x-backend.card>
    </x-forms.post>

    @push('after-scripts')
        @include('backend.job-list.includes.form_js')
    @endpush
@endsection
