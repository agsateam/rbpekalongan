<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
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
}
