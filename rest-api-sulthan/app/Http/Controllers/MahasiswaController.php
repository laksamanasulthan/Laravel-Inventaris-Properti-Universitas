<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Mahasiswa::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		$mahasiswa = new Mahasiswa();
		$mahasiswa->nama = $request->nama;
		$mahasiswa->alamat = $request->alamat;
		$mahasiswa->save();
		return "Data mahasiswa berhasil ditambah";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Mahasiswa  $mahasiswa
	 * @return \Illuminate\Http\Response
	 */
	public function show(Mahasiswa $mahasiswa)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Mahasiswa  $mahasiswa
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Mahasiswa $mahasiswa)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Mahasiswa  $mahasiswa
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->nama = $request->nama;
		$mahasiswa->alamat = $request->alamat;
		$mahasiswa->save();

		return "Data mahasiswa berhasil diubah";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Mahasiswa  $mahasiswa
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$mahasiswa = Mahasiswa::find($id);
		$mahasiswa->delete();

		return "Data mahasiswa berhasil dihapus";
	}
}
