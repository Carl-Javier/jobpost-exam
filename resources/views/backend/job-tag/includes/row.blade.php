<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ date('Y-m-d', strtotime($row->created_at)) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.job-tag.includes.actions', ['tags' => $row])
</x-livewire-tables::bs4.table.cell>
