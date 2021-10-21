<div class="row">
    <div class="col-md-12 mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required class="form-control"
            value="{{ $event->title ?? old('title') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="start_date">Start date</label>
        <input type="date" name="start_date" onchange="$('#end_date').attr('min', $(this).val())" id="start_date"
            required class="form-control" value="{{ $event->start_date ?? old('start_date') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="end_date">End date</label>
        <input type="date" name="end_date" id="end_date" onchange="$('#start_date').attr('max', $(this).val())" required
            class="form-control" value="{{ $event->end_date ?? old('end_date') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="recurrence_period">Recurrence period</label>
        <select class="form-control" name="recurrence_period" required id="recurrence_period">
            <option {{ $event->recurrence_period == 'First' ? 'selected' : "" }} value="First">
                First
            </option>
            <option {{ $event->recurrence_period == 'Second' ? 'selected' : "" }} value="Second">
                Second
            </option>
            <option {{ $event->recurrence_period == 'Third' ? 'selected' : "" }} value="Third">
                Third
            </option>
            <option {{ $event->recurrence_period == 'Fourth' ? 'selected' : "" }} value="Fourth">
                Fourth
            </option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label for="recurrence_day">Recurrence day</label>
        <select class="form-control" name="recurrence_day" required id="recurrence_day">
            <option {{ $event->recurrence_day == "Monday" ? 'selected' : '' }} value="Monday">Monday</option>
            <option {{ $event->recurrence_day == "Tuesday" ? 'selected' : '' }} value="Tuesday">Tuesday</option>
            <option {{ $event->recurrence_day == "Wednesday" ? 'selected' : '' }} value="Wednesday">Wednesday</option>
            <option {{ $event->recurrence_day == "Thrusday" ? 'selected' : '' }} value="Thrusday">Thrusday</option>
            <option {{ $event->recurrence_day == "Friday" ? 'selected' : '' }} value="Friday">Friday</option>
            <option {{ $event->recurrence_day == "Saturday" ? 'selected' : '' }} value="Saturday">Saturday</option>
            <option {{ $event->recurrence_day == "Sunday" ? 'selected' : '' }} value="Sunday">Sunday</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label for="recurrence_month_duration">Recurrence Month duration</label>
        <select class="form-control" required name="recurrence_month_duration" id="recurrence_month_duration">
            <option {{ $event->recurrence_month_duration == "1" ? 'selected' : '' }} value="1">Month</option>
            <option {{ $event->recurrence_month_duration == "3" ? 'selected' : '' }} value="3">3 Months</option>
            <option {{ $event->recurrence_month_duration == "4" ? 'selected' : '' }} value="4">4 Months</option>
            <option {{ $event->recurrence_month_duration == "6" ? 'selected' : '' }} value="6">6 Months</option>
            <option {{ $event->recurrence_month_duration == "12" ? 'selected' : '' }} value="12">Year</option>
        </select>
    </div>
    <div class="col-md-12 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('event.index') }}" class="btn btn-secondary">Go Back</a>
    </div>
</div>
