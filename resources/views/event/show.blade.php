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
                {{ $event->title }} Detail's
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Title:</strong>
                            {{ $event->title }}
                        </div>
                        <div class="col-md-4">
                            <strong>Start date:</strong>
                            {{ $event->start_date }}
                        </div>
                        <div class="col-md-4">
                            <strong>End date:</strong>
                            {{ $event->end_date }}
                        </div>
                        <div class="col-md-12">
                            <strong>Recurrence:</strong>
                            Repeat on the
                            {{ $event->recurrence_period }}
                            {{ $event->recurrence_day }}
                            in every
                            {{ $event->recurrence_month_duration }} month in duration
                        </div>
                        <div class="col-md-12">
                            <strong>Total Recurrence Event: </strong>
                            {{ is_array($event->recurrence) ? count($event->recurrence) : 0 }} times
                        </div>
                        <div class="col-md-12 table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Date</th>
                                    <th>Day</th>
                                </thead>
                                <tbody>
                                    @forelse ($event->recurrence as $key => $recurrence)
                                    <tr>
                                        <td>{{ $recurrence['date'] ?? '-' }}</td>
                                        <td>{{ $recurrence['day'] ?? '-' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" align="center"> No upcoming occurence</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('event.index') }}" class="btn btn-primary btn-sm">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
