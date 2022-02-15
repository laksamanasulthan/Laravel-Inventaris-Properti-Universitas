<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Mahasiswa;
use App\Http\Resources\Mahasiswa as MahasiswaResource;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends BaseController
{

	public function index()
	{
		$mahasiswa = Mahasiswa::all();
		return $this->sendResponse(MahasiswaResource::collection($mahasiswa), 'Mahasiswa ditampilkan.');
	}


	public function create(Request $request)
	{
		$input = $request->all();
		$validator = Validator::make($input, [
			'nama' => 'required',
			'alamat' => 'required'
		]);
		if ($validator->fails()) {
			return $this->sendError($validator->errors());
		}
		$mahasiswa = Mahasiswa::create($input);
		return $this->sendResponse(new MahasiswaResource($mahasiswa), 'Data Mahasiswa ditambahkan.');
	}


	public function show($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		if (is_null($mahasiswa)) {
			return $this->sendError('Data does not exist.');
		}
		return $this->sendResponse(new MahasiswaResource($mahasiswa), 'Data ditampilkan.');
	}


	public function update(Request $request, Mahasiswa $mahasiswa)
	{
		$input = $request->all();

		$validator = Validator::make($input, [
			'nama' => 'required',
			'alamat' => 'required'
		]);

		if ($validator->fails()) {
			return $this->sendError($validator->errors());
		}

		$mahasiswa->nama = $input['nama'];
		$mahasiswa->alamat = $input['alamat'];
		$mahasiswa->save();

		return $this->sendResponse(new MahasiswaResource($mahasiswa), 'Data updated.');
	}

	public function destroy(Mahasiswa $mahasiswa)
	{
		$mahasiswa->delete();
		return $this->sendResponse([], 'Data deleted.');
	}
}
