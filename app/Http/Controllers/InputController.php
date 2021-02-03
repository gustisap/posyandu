<?php

namespace App\Http\Controllers;

use App\Models\ModelInput;
use App\Models\ModelPosyandu01;
use App\Models\ModelPosyandu09;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Validation\Rule;

class InputController extends Controller
{
    public function index()
    {
		$posyandu = collect();
		$pos1 = ModelPosyandu01::all();
		$pos9 = ModelPosyandu09::all();

		foreach ($pos1 as $data){
			$posyandu->push($data);
		}
		foreach ($pos9 as $data){
			$posyandu->push($data);
		}
        return view('halamaninput', compact('posyandu'));
    }
    
    public function create()
	{
		return view('halamaninput');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

	public function store(Request $request)
	{
		$requestData = $request->only(['nama', 'jenis_kelamin', 'berat_badan', 'tinggi_badan', 'usia', 'status_gizi']);
		
		$validator = Validator::make($requestData, [
			'nama' => 'required|string',
			'jenis_kelamin' => 'required|string',
			'berat_badan' => 'required|integer',
			'tinggi_badan' => 'required|integer',
			'usia' => 'required|integer',
			'status_gizi' => 'required|string'
        ]);
        if ($validator->passes()) {
			$storeDataBalita = ModelInput::create($requestData);
			if ($storeDataBalita) {
				return redirect()->route('halamaninput')->with('success', "Berhasil menambah data balita");
			}
		}else{
			return redirect()->route('halamaninput')->with('success', "Gagal menambah data balita");
		}
	}

	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function show(ModelInput $pos)
	{
		return view('index.show',compact('pos'));
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
		$pos = ModelInput::where($where)->first();
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
		$pos = ModelInput::where('id',$id)->delete();
		return redirect()->back()->with(['successMessage' => "Berhasil menghapus"]);
	}
}
