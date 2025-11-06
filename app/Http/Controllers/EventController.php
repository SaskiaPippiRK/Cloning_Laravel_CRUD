<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Foundation\Validation\ValidatesRequests;

class EventController extends Controller
{
    use ValidatesRequests;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        
        return view('event.index', compact('events'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'location'   => 'required',
            'quota'      => 'required|numeric'
        ]);

        try {
            Event::create([
                'event_name' => $request->event_name,
                'location'   => $request->location,
                'quota'      => $request->quota
            ]);

            return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->route('event.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            return redirect()->route('event.index')->with(['error' => 'Event tidak ditemukan!']);
        }
        
        return view('event.edit', compact('event'));
    }

    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            return redirect()->route('event.index')->with(['error' => 'Event tidak ditemukan!']);
        }

        $this->validate($request, [
            'event_name' => 'required',
            'location'   => 'required',
            'quota'      => 'required|numeric'
        ]);

        try {
            $event->update([
                'event_name' => $request->event_name,
                'location'   => $request->location,
                'quota'      => $request->quota
            ]);

            return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
        } catch (Exception $e) {
            return redirect()->route('event.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            return redirect()->route('event.index')->with(['error' => 'Event tidak ditemukan!']);
        }

        try {
            $event->delete();
            return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            return redirect()->route('event.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
