@extends('backend.layouts.app')

@section('title', __('Jobs View'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Jobs View')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.jobs.list')" :text="__('Back')"/>
        </x-slot>
        <x-slot name="body">
            @include('backend.job-list.includes.view')
        </x-slot>
    </x-backend.card>
@endsection
