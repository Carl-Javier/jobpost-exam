@extends('backend.layouts.app')

@section('title', __('Edit Jobs'))

@push('after-styles')

@endpush
@section('content')
    <x-forms.patch :action="route('admin.jobs.update', $jobs)" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Jobs ')
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
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
            </x-slot>

        </x-backend.card>
    </x-forms.patch>

    @push('after-scripts')
        @include('backend.job-list.includes.form_js')
        <script>
            $(document).ready(function() {
                $("#jobTag").val({{ $jobs->tags->pluck('id') }}).trigger('change');
                $("#jobType").val({{ $jobs->types->pluck('id') }}).trigger('change');
                $(".country-selector").val({{ $jobs->countries->pluck('id') }}).trigger('change');
            });
        </script>
    @endpush
@endsection
