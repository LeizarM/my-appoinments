<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::doctors()->get();
        return view( 'doctors.index', compact('doctors') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ){

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
                'role' => 'doctor',
                'password' => bcrypt( $request->input('password') ),
            ]

        );

        return redirect()->route('doctors.index')->with( 'notification', 'The doctor was created successfully' );
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
    public function edit(string $id)
    {

        $doctor = User::doctors()->findOrFail( $id );
        return view('doctors.edit', compact('doctor'));
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


        $this->validate( $request, $rules  );

        $doctor = User::doctors()->findOrFail( $id );

        $data = $request->only( 'name', 'email', 'dni', 'address', 'phone');

        $password = $request->input('password');

        if( $password ){

            $data['password'] = bcrypt( $password );
        }


        $doctor->fill( $data );
        $doctor->save();

        return redirect()->route('doctors.index')->with( 'notification', 'The doctor was updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $doctor )
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with( 'notification', 'The doctor was deleted successfully' );
    }
}
