<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'fantasy_name' => 'required',
            'contact' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'address_number' => 'required',
            'phone' => 'required',
            'email' => 'required | email',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required | max : 2',
            'segmento' => 'required',
            'inscricao_municipal' => 'required',
            'inscricao_estadual' => 'required',
        ]);

        $school = new School();
        $school->user_id = Auth::user()->id;
        $school->cnpj = $request->cnpj;
        $school->company_name = $request->company_name;
        $school->fantasy_name = $request->fantasy_name;
        $school->phone = $request->phone;
        $school->phone = $request->phone;
        $school->contact = $request->contact;
        $school->address = $request->address;
        $school->address_number = $request->address_number;
        $school->zip_code = $request->zip_code;
        $school->complement = $request->complement;
        $school->phone = $request->phone;
        $school->email = $request->email;
        $school->neighborhood = $request->neighborhood;
        $school->city = $request->city;
        $school->state = $request->state;
        $school->segmento = $request->segmento;
        $school->inscricao_municipal = $request->inscricao_municipal;
        $school->inscricao_estadual = $request->inscricao_estadual;

        $school->save();

        $schools = School::all();
        return view('home')->with('schools', $schools);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::where('id', '=', $id)->first();
        return view('school.edit')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school = School::where('id', '=', $id)->update([
            'fantasy_name' => $request->fantasy_name,
            'phone' => $request->phone,
            'contact' => $request->contact,
            'email' => $request->email,
            'segmento' => $request->segmento,
            'inscricao_municipal' => $request->inscricao_municipal,
            'inscricao_estadual' => $request->inscricao_estadual,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'address' => $request->address,
            'address_number' => $request->address_number,
            'complement' => $request->complement
        ]);
        $schools = School::all();
        return view('home')->with('schools', $schools);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
