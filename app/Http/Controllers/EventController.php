<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::simplePaginate(5);
        return view('event.index', compact('events'));
    }

    public function ajaxData()
    {
        $events = Event::simplePaginate(5);
        $html = view('event.index-data', compact('events'))->render();
        $nextPageUrl = $events->nextPageUrl();
        return ['html' => $html, 'nextPageUrl' => $nextPageUrl];
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
            'start_date' => 'required|date|before:' . date(request()->end_date),
            'end_date' => 'required|date|after:' . date(request()->start_date),
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
            'start_date' => 'required|date|before:' . date(request()->end_date),
            'end_date' => 'required|date|after:' . date(request()->start_date),
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
