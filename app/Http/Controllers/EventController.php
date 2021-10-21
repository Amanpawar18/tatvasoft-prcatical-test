<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::simplePaginate(10);
        return view('event.index', compact('events'));
    }

    public function create()
    {
        $event = new Event();
        return view('event.create', compact('event'));
    }
    public function store()
    {
        request()->validate([
            'title' => 'string|required',
            'start_date' => 'required',
            'end_date' => 'required',
            'recurrence_period' => 'required',
            'recurrence_day' => 'required',
            'recurrence_month_duration' => 'required',
        ]);
        $event = Event::create(request()->all());
        return redirect()->route('event.index');
    }

    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Event $event)
    {
        request()->validate([
            'title' => 'string|required',
            'start_date' => 'required',
            'end_date' => 'required',
            'recurrence_period' => 'required',
            'recurrence_day' => 'required',
            'recurrence_month_duration' => 'required',
        ]);
        $event->update(request()->all());
        return redirect()->route('event.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index');
    }
}
