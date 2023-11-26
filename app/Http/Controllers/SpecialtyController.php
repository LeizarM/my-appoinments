<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index(){
        return view('specialties.index');
    }


    public function create(){
        return view('specialties.create');
    }


    public function store( Request $request ){

        //dd($request->all());

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        return back();


    }
}
