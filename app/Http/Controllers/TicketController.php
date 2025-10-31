<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Ticket; 
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
        return view('ticket.create');
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
            'id_ticket' => 'required',
            'ticket_type'   => 'required',
            'price'      => 'required|numeric'
        ]);

        Ticket::create([
            'id_ticket' => $request->ticket_name,
            'ticket_type'   => $request->ticket_type,
            'price'      => $request->price
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
        return view('ticket.edit', compact('ticket'));
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
            'id_ticket' => 'required',
            'ticket_type'   => 'required',
            'price'      => 'required|numeric'
        ]);

        $ticket->update([
            'id_ticket' => $request->id_ticket,
            'ticket_type'   => $request->ticket_type,
            'price'      => $request->price
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
        $tiket = Ticket::find($id);
        
        $tiket->delete();

        return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
} 
