<div>

    @if ($items->purpose == 'lost')
        @include('admin.items.form.update.lost')
    @else
        @include('admin.items.form.update.found')
    @endif
</div>
