@extends('backend.layouts.app')

@section('title', __('Job Tag Management'))


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Job tag Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.tags.create')"
                    :text="__('Create Jobs Tag')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.jobs-tag-table />
        </x-slot>
    </x-backend.card>
@endsection
