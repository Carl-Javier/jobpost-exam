@extends('backend.layouts.app')

@section('title', __('Job type Management'))


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Job type Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.types.create')"
                    :text="__('Create Jobs type')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.jobs-type-table />
        </x-slot>
    </x-backend.card>
@endsection
