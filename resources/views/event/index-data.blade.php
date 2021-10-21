@forelse ($events as $key => $event)
<tr>
    <td>{{ (($events->currentPage() - 1) * $events->perPage())   + (++$key) }}</td>
    <td>{{ $event->title }}</td>
    <td>{{ $event->start_date }}</td>
    <td>{{ $event->end_date }}</td>
    <td>
        Repeat on the
        {{ $event->recurrence_period }}
        {{ $event->recurrence_day }}
        in every
        {{ $event->recurrence_month_duration }} month
    </td>
    <td>
        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-secondary btn-sm">Edit</a>
            <a href="{{ route('event.show', $event->id) }}" class="btn btn-secondary btn-sm">View</a>
            <button onclick=" return confirm('Are you sure you want to delete this event ?');"
                class="btn btn-secondary btn-sm">Delete</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" align="center">No more events !!</td>
</tr>
@endforelse
