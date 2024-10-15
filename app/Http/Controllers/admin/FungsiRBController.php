<?php



namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FungsiRB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FungsiRBController extends Controller
{
    public function index()
    {
        $fungsirb = FungsiRB::all();

        $data = [
            "fungsirb" => $fungsirb
        ];

        // dd($data);

        return view('backend.webcontent.fungsi.viewfungsi', $data);
    }

    public function edit($id)
    {

        $fungsirb = FungsiRB::findOrFail($id);


        // dd($fungsirb);
        return view('backend.webcontent.fungsi.editfungsi', compact('fungsirb'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'deskripsi' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // dd($validatedData);

        $fungsirb = FungsiRB::findOrFail($id);



        function uploadImage($request, $key, $fungsi, $imageField)
        {
            if ($request->hasFile($key)) {
                // Hapus file lama jika ada
                if ($fungsi->$imageField) {
                    Storage::delete('public/' . $fungsi->$imageField);
                }
                // Mengatur nama file dan menyimpan ke folder public/uploaded/fungsi
                $imageName = uniqid() . '.' . $request->$key->extension(); // Menggunakan uniqid() untuk nama file unik
                $request->$key->move(public_path('uploaded/fungsi'), $imageName);
                $fungsi->$imageField = url('uploaded/fungsi/' . $imageName);
            }
        }

        // Upload foto 1-5 jika ada
        uploadImage($request, 'foto1', $fungsirb, 'foto1');
        uploadImage($request, 'foto2', $fungsirb, 'foto2');
        uploadImage($request, 'foto3', $fungsirb, 'foto3');
        uploadImage($request, 'foto4', $fungsirb, 'foto4');
        uploadImage($request, 'foto5', $fungsirb, 'foto5');

        $fungsirb->deskripsi = $validatedData['deskripsi'];

        $fungsirb->save();

        return redirect()->route('webcontent.fungsi')->with('success', 'Data fungsi berhasil diperbarui.');
    }
}
