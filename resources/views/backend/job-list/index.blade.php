@extends('backend.layouts.app')

@section('title', __('Jobs Management'))


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Jobs Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.jobs.create')"
                    :text="__('Create Jobs')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.jobs-table />
        </x-slot>
    </x-backend.card>
@endsection
