<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application clients.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('clients');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:30',
            'address' => 'required',
            'city' => 'required|max:15',
            'notes' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();

        Client::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'notes' => $data['notes'],
            'status' => $data['status'],
        ]);

        return redirect()->route('clients')->with('success', 'Client created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:30',
            'address' => 'required',
            'city' => 'required|max:15',
            'notes' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();
        $updateFields = array(
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'notes' => $data['notes'],
            'status' => $data['status'],
        );

        Client::where('id', $id)->update($updateFields);

        return redirect()->route('clients')
        ->with('success', 'Client updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients')
        ->with('success', 'Client deleted successfully');
    }
}
