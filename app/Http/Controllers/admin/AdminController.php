<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        $data = User::all();
        
        return view('backend.users.index', [
            "data" => $data
        ]);
    }

    public function create(){
        return view('backend.users.add');
    }

    public function store(Request $req){
        $req->validate(
            [
                'email' => [Rule::unique('users')->ignore($req->id)],
                'phone' => 'min_digits:11|max_digits:14|numeric'
            ],
            [
                'email.unique' => 'Email sudah terdaftar di sistem.',
                'phone.min' => 'Nomor minimal 11 karakter.',
                'phone.max' => 'Nomor maksimal 14 karakter.',
                'phone.numeric' => 'Nomor harus berupa angka.',
            ]
        );

        User::create([
            "name" => $req->name,
            "email" => $req->email,
            "phone" => $req->phone,
            "password" => Hash::make($req->password),
        ]);

        return redirect(route('admin'))->with("success", "Berhasil menambahkan data.");
    }

    public function edit($id){
        $data = User::where('id', $id)->first();

        return view('backend.users.profile', [
            "data" => $data
        ]);
    }

    public function update(Request $req){
        $validator = Validator::make(
            $req->all(),
            ['email' => [Rule::unique('users')->ignore($req->id)]],
            ['email.unique' => 'Email sudah terdaftar di sistem.']
        );
        if ($validator->fails()) {
            return back()->with("error", $validator->errors()->messages()['email'][0]);
        }

        $data = [
            "name" => $req->name,
            "email" => $req->email,
            "phone" => $req->phone,
        ];
        User::where('id', $req->id)->update($data);

        return back()->with("success", "Data pengguna berhasil diperbarui");
    }

    public function destroy($id){
        User::where('id', $id)->delete();
        return back()->with('success', 'Data pengguna dihapus');
    }

    // Manage Password
    public function changePassword(){
        $data = Auth::user();

        return view('backend.users.password', [
            "data" => $data
        ]);
    }

    public function updatePassword(Request $req)
    {
        $user = Auth::user();
        $pass = $req->all();

        if (Hash::check($pass['password'], $user->password)) {
            User::where('id', $user->id)->update(['password' => Hash::make($pass['newpassword'])]);
            return redirect(route('dashboard'))->with('success', 'Password berhasil diperbarui.');
        } else {
            return back()->with('error', 'Password lama yang anda inputkan salah!');
        }
    }

    public function resetPassword($id)
    {
        dd($id, Str::password(8, true, true, false, false));
        User::where('id', $id)->update(['password' => Hash::make(Str::password(8, true, true, false, false))]);
        return back()->with('success', 'Password pengguna berhasil direset');
    }
}
