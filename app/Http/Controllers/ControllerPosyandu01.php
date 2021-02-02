<?php

namespace App\Http\Controllers;

use App\Models\ModelPosyandu01;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ControllerPosyandu01 extends Controller
{
    public function index()
    {
        $pos = ModelPosyandu01::all();
        return view('posyandu01', compact('pos'));
    }
    
    public function create()
	{
		return view('posyandu01');
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
		ModelPosyandu01::updateOrCreate(['id' => $id],['nama' => $request->nama, 'jenis_kelamin' => $request->jenis_kelamin,'berat_badan'=>$request->berat_badan,'tinggi_badan'=>$request->tinggi_badan,'usia'=>$request->usia,'status_gizi'=>$request->status_gizi]);
		if(empty($request->id))
			$msg = 'Customer entry created successfully.';
		else
			$msg = 'Customer data is updated successfully';
		return redirect()->route('posyandu01')->with('success',$msg);
	}

	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function show(ModelPosyandu01 $pos)
	{
		return view('posyandu01.show',compact('pos'));
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
		$pos = ModelPosyandu01::where($where)->first();
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
		$pos = ModelPosyandu01::where('id',$id)->delete();
		return redirect()->back()->with(['successMessage' => "Berhasil menghapus"]);
	}
}
