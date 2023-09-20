<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
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
     * Show the application employees.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->where('type', 0);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('employees');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:50',
            'password' => 'required|max:20',
            'phone' => 'required|max:15',
            'status' => 'required',
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'status' => $data['status'],
        ]);

        return redirect()->route('employees')->with('success', 'Employee created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:30',
            'phone' => 'required|max:15',
            'status' => 'required',
        ]);

        $data = $request->all();
        $updateFields = array(
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'phone' => $data['phone'],
            'status' => $data['status'],
        );
        if(!empty($data['password'])){
            $updateFields['password'] = Hash::make($data['password']);
        }
        User::where('id', $id)->update($updateFields);

        return redirect()->route('employees')
        ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('employees')
        ->with('success', 'Employee deleted successfully');
    }
}
