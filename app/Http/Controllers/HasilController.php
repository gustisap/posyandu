<?php

namespace App\Http\Controllers;

use App\Models\ModelHasil;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HasilController extends Controller
{
    public function index()
    {
        $pos = ModelHasil::join('posyandu9', 'posyandu9.id', '=', 'posyandu1.id')
              ->get(['posyandu1.*', 'posyandu9.id as id9', 'posyandu9.nama as nama9', 'posyandu9.jenis_kelamin as jk9', 'posyandu9.berat_badan as bb9', 'posyandu9.tinggi_badan as tb9', 'posyandu9.usia as usia9', 'posyandu9.status_gizi as sg9']);
              
        return view('halamanhasil', compact('pos'));
    }
    
    public function create()
	{
		return view('halamanhasil');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

	public function store(Request $request)
	{

		$r=$request->validate([
		'nama' => 'required',
		'jenis_kelamin' => 'required',
        'berat_badan' => 'required',
        'tinggi_badan' => 'required',
        'usia' => 'required',
        'status_gizi' => 'required'
		]);

		$id = $request->id;
		ModelHasil::updateOrCreate(['id' => $id],['nama' => $request->nama, 'jenis_kelamin' => $request->jenis_kelamin,'berat_badan'=>$request->berat_badan,'tinggi_badan'=>$request->tinggi_badan,'usia'=>$request->usia,'status_gizi'=>$request->status_gizi]);
		if(empty($request->id))
			$msg = 'Customer entry created successfully.';
		else
			$msg = 'Customer data is updated successfully';
		return redirect()->route('halamanhasil')->with('success',$msg);
	}

	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function show(ModelHasil $pos)
	{
		return view('halamanhasil.show',compact('pos'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	
	public function edit($id)
	{
		$where = array('id' => $id);
		$pos = ModelHasil::where($where)->first();
		return Response::json($pos);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request)
	{

	}

	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function destroy($id)
	{
		$pos = ModelHasil::where('id',$id)->delete();
		return redirect()->back()->with(['successMessage' => "Berhasil menghapus"]);
	}

}
