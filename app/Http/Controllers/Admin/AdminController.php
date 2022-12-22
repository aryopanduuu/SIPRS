<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(AdminDataTable $dataTable)
	{
		return $dataTable->render('pages.admin.admin.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$page = [
			'title' => 'Tambah',
			'currentRoute' => route('admin.admin.create'),
			'formMethod' => 'POST',
			'formRoute' => route('admin.admin.store')
		];
		return view('pages.admin.admin.form', compact('page'));
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
			'username' => 'required|unique:admins,username'
		]);

		$password = Str::random(8);

		Admin::create([
			'username' => $request->username,
			'password' => password_hash($password, PASSWORD_BCRYPT),
			'role' => 'admin'
		]);

		alert()->html('Sukses', 'Data berhasil ditambahkan.<br/>Password : ' . $password, 'success');
		return redirect()->back();
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
		$data = Admin::where('id', $id)->where('role', 'admin')->firstOrFail();
		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.admin.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.admin.update', $id)
		];
		return view('pages.admin.admin.form', compact('data', 'page'));
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
		$data = Admin::where('id', $id)->where('role', 'admin')->firstOrFail();
		$user = auth()->user();
		$request->validate([
			'username' => ['required', Rule::unique('admins', 'username')->ignore($data->id)],
			'password' => 'nullable|confirmed|min:8'
		]);

		$data->username = $request->username;
		if ($request->password) {
			$data->password = password_hash($request->password, PASSWORD_BCRYPT);
		}
		$data->save();

		alert('Sukses', 'Data berhasil diubah', 'success');
		return redirect()->back();
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
