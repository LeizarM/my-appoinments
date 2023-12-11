<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = User::patients()->paginate(5);
        return view( 'patients.index', compact('patients') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'dni' => 'nullable',
            'address' => 'min:5',
            'phone' => 'min:6',
        ];


        $this->validate( $request, $rules  );

        User::create(

            $request->only( 'name', 'email', 'dni', 'address', 'phone') + [
                'role' => 'patient',
                'password' => bcrypt( $request->input('password') ),
            ]
        );

        return redirect()->route('patients.index')->with( 'notification', 'The patient was created successfully' );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $patient)
    {


        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'dni' => 'nullable',
            'address' => 'min:5',
            'phone' => 'min:6',
        ];

        $this->validate( $request, $rules );

        $patient = User::patients()->findOrFail( $id );

        $data = $request->only( 'name', 'email', 'dni', 'address', 'phone');
        $password = $request->input('password');
        if( $password ){

            $data['password'] = bcrypt( $password );
        }
        $patient->fill( $data );
        $patient->save();

        return redirect()->route('patients.index')->with( 'notification', 'The patient was updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $patient )
    {
        $patient->delete();

        return redirect()->route('patients.index')->with( 'notification', 'The patient was deleted successfully' );
    }
}
