<?php
 
namespace App\Http\Controllers;
 
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TicketController extends Controller
{
    use ValidatesRequests;
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        $tickets = Ticket::latest()->paginate(5);
        return view('ticket.index', compact('tickets'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $events = Event::all();
        return view('ticket.create', compact('events'));
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
            'name' => 'required',
            'price' => 'required|numeric',
            'event_id' => 'required|exists:events,id'
        ]);

        Ticket::create([
            'name' => $request->name,
            'ticket_type' => $request->name,
            'price' => $request->price,
            'event_id' => $request->event_id
        ]);

        try {
            return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->route('ticket.index')->with(['error' => $e->getMessage()]);
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
        $ticket = Ticket::find($id);
        $events = Event::all();
        return view('ticket.edit', compact('ticket', 'events'));
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
        $ticket = Ticket::find($id);
        
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'event_id' => 'required|exists:events,id'
        ]);

        $ticket->update([
            'name' => $request->name,
            'ticket_type' => $request->name,
            'price' => $request->price,
            'event_id' => $request->event_id
        ]);

        return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        
        if (!$ticket) {
            return redirect()->route('ticket.index')->with(['error' => 'Ticket tidak ditemukan!']);
        }

        $ticket->delete();

        return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
