<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->company_name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @foreach($row->tags as $tag)
        <span class='badge badge-success'>{{ $tag->name }}</span>
    @endforeach
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @foreach($row->types as $type)
        <span class='badge badge-success'>{{ $type->name }}</span>
    @endforeach
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if($row->is_published === \App\Models\Jobs::PUBLISHED)
        <span class='badge badge-success bg-success'>@lang('Yes')</span>
    @else
        <span class='badge badge-danger bg-danger'>@lang('No')</span>
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->published_date }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->expiration_date }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.job-list.includes.actions', ['jobs' => $row])
</x-livewire-tables::bs4.table.cell>
