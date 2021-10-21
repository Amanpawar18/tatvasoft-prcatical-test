<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tatvasoft Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container  mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <strong>
                            <u>
                                Events
                            </u>
                        </strong>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('event.create') }}" class="btn btn-primary btn-sm float-right">Add Event</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Recurrence</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @forelse ($events as $key => $event)
                                <tr>
                                    <td>{{ (($events->currentPage() - 1) * 10)   + (++$key) }}</td>
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
                                            <a href="{{ route('event.edit', $event->id) }}"
                                                class="btn btn-secondary btn-sm">Edit</a>
                                            <a href="{{ route('event.show', $event->id) }}"
                                                class="btn btn-secondary btn-sm">View</a>
                                            <button
                                                onclick=" return confirm('Are you sure you want to delete this event ?');"
                                                class="btn btn-secondary btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" align="center">No event yet !!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="spinner-border text-primary" id="loader" style="display: none;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button id="loadMore" data-url="{{ route('event.ajaxData').'?page=2' }}"
                            class="btn btn-primary btn-sm">
                            Load more
                        </button>
                    </div>
                    {{-- <div class="col-md-12 mt-3">
                        {{ $events->links() }}
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // initaize on event click
        $("#loadMore").click(function(){
            $('#loader').show();
            var url = $(this).data('url');
            $.get(url, function(response){ // calling ajax request
                if(response){
                    $('#tbody').append(response['html']); // appending the html

                        // passing the next url if there else disabling the button
                    if(response['nextPageUrl'] != null){
                        $('#loadMore').data('url', response['nextPageUrl']);
                    } else {
                        console.log(response['nextPageUrl']);
                        $('#loadMore').attr('disabled', true);
                    }
                    $('#loader').hide();
                }
            });
            });
        });
    </script>
</body>

</html>
