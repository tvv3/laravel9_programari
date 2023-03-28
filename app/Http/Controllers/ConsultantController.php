<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;

class ConsultantController extends Controller
{
    //

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['consultanti'] = Consultant::orderBy('nume','asc')->paginate(25);
return view('consultant.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('consultant.create');
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
'nume' => 'required'
]);
$consultant = new Consultant;
$consultant->nume = $request->nume;
$consultant->save();
return redirect()->route('consultant.index')
->with('success','Consultantul a fost creat cu succes.');
}
/**
* Display the specified resource.
*
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function show(Consultant $consultant)
{
return view('consultant.show',compact('consultant'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function edit(Consultant $consultant)
{
return view('consultant.edit',compact('consultant'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Consultant $consultant)
{
$request->validate([
'nume' => 'required'
]);
$consultant = Consultant::find($consultant->id);
$consultant->nume = $request->nume;

$consultant->save();
return redirect()->route('consultant.index')
->with('success','Consultantul a fost modificat cu succes!');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(Consultant $consultant)
{
$consultant->delete();
return redirect()->route('consultant.index')
->with('success','Consultantul a fost sters cu succes!');
}
}

