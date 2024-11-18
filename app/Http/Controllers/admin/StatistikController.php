<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;
use App\Models\Event;
use App\Models\JenisStatistik;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Yajra\DataTables\Facades\DataTables;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $statistik = Statistik::all();
        $jumlahevent = Event::count();
        $jenisstatistik = JenisStatistik::all();

        $godigital = Statistik::where('jenis_statistiks_id', 1)->sum('jumlah');
        $gomodern = Statistik::where('jenis_statistiks_id', 2)->sum('jumlah');

        $goonline = Statistik::where('jenis_statistiks_id', 3)->sum('jumlah');




        $data = [
            'statistik' => $statistik,
            'jumlahevent' => $jumlahevent,
            'jenisstatistik' => $jenisstatistik,
            'godigital' => $godigital,
            'gomodern' => $gomodern,
            'goonline' => $goonline
        ];

        // 


        return view('backend.webcontent.statistik.viewstatistik', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function create()
    {
        return view('backend.webcontent.statistik.addstatistik');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_statistiks_id' => 'required|integer|in:1,2,3,4', // Validasi jenis statistik
            'tahun' => [
                'required',
                'integer',
                'min:2016',
                'max:' . date('Y'),
                Rule::unique('statistiks', 'tahun')
                    ->where('jenis_statistiks_id', $request->jenis_statistiks_id),
            ],
            'jumlah' => 'required|integer|min:0', // Jumlah tidak negatif
        ], [
            'jenis_statistiks_id.required' => 'Jenis statistik wajib dipilih.',
            'jenis_statistiks_id.in' => 'Jenis statistik tidak valid.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.unique' => 'Tahun ini sudah ada, silakan pilih tahun lain.',
            'jumlah.required' => 'Jumlah wajib diisi.',
        ]);

        try {
            // Simpan data statistik ke database
            Statistik::create([
                'jenis_statistiks_id' => $request->input('jenis_statistiks_id'),
                'tahun' => $request->input('tahun'),
                'jumlah' => $request->input('jumlah'),
            ]);

            // Redirect dengan pesan sukses
            return redirect()
                ->route('webcontent.statistik')
                ->with('success', 'Statistik berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Tangani error, misal jika terjadi masalah pada database
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan statistik: ' . $e->getMessage())
                ->withInput();
        }
    }





    public function edit($id)

    {
        $statistik = Statistik::findOrFail($id);

        // dd($statistik);
        return view('backend.webcontent.statistik.editstatistik', compact('statistik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'jumlah' => 'required|integer',
        ]);

        // Cari data statistik berdasarkan ID yang diberikan
        $statistik = Statistik::findOrFail($id);

        // Update field 'jumlah' dengan nilai yang divalidasi
        $statistik->jumlah = $validatedData['jumlah'];

        // Simpan perubahan
        $statistik->save();

        return redirect()->route('webcontent.statistik')->with('success', 'Statistik berhasil diupdate!');
    }

    public function getData($id)
    {
        // $titles = [
        //     1 => 1,
        //     2 => 2,
        //     3 => 3,
        //     4 => 4,
        // ];

        // return view('backend.webcontent.statistik.viewdetailstatistik', [
        //     'title' => $titles[$id] ?? 'Statistik',
        //     'id' => $id,
        // ]);

        if ($id == 1) {
            $data = Statistik::where('jenis_statistiks_id', 1)->paginate(8);
        } elseif ($id == 2) {
            $data = Statistik::where('jenis_statistiks_id', 2)->paginate(8);
        } elseif ($id == 3) {
            $data = Statistik::where('jenis_statistiks_id', 3)->paginate(8);
        } elseif ($id == 4) {
            $data = Statistik::where('jenis_statistiks_id', 4)->paginate(8);
        }

        $datafilter = [
            'data' => $data,
        ];

        // dd($datafilter);
        return view('backend.webcontent.statistik.viewdetailstatistik', $datafilter);
    }

    // public function AmbilData($id)
    // {
    //     $query = Statistik::where('jenis_statistiks_id', $id);

    //     return DataTables::of($query)
    //         ->addIndexColumn() // Menambahkan nomor otomatis
    //         ->addColumn('action', function ($row) {
    //             return '<a href="#" class="btn btn-sm btn-primary">Detail</a>';
    //         })
    //         ->rawColumns(['action']) // Jika ada kolom dengan HTML
    //         ->make(true);
    // }

    public function destroy($id)
    {
        // Cari mitra berdasarkan id
        $statistik = Statistik::findOrFail($id);


        // Hapus data mitra dari database
        $statistik->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('webcontent.statistik')->with('success', 'Data Statistik berhasil dihapus.');
    }
}
