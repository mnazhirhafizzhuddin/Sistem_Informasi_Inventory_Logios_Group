<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
// use  Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\PDF;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // $posts = DB::table('barang')->paginate(10);
        // ompact('posts')
        //return view with data
        $cekbarang = DB::table('barang')->count();
        $cekbarang1 = DB::table('logbarangkeluar')->count();
        return view('content.dashboard',compact('cekbarang','cekbarang1'));

    }

    public function databarang(){
        $posts = DB::table('barang')->paginate(10);
        return view('content.databarang',compact('posts'));
    }

    public function search(Request $request)
    {

    if($request->ajax())
    {

    $output="";
    $products=DB::table('barang')
    ->where('namabarang','LIKE','%'.$request->search."%")
    ->orWhere('jenisbarang','LIKE','%'.$request->search."%")
    ->orWhere('varian','LIKE','%'.$request->search."%")
    ->orWhere('harga','LIKE','%'.$request->search."%")
    ->orWhere('satuan','LIKE','%'.$request->search."%")
    ->orWhere('stok','LIKE','%'.$request->search."%")
    ->get();
    if($products)
    {
    $no =0;
        foreach ($products as $key => $product) {
            $output .= '<tr>' .
                '<td>' . ++$no . '</td>' .
                '<td>' . $product->idbarang . '</td>' .
                '<td>' . $product->namabarang . '</td>' .
                '<td>' . $product->jenisbarang . '</td>' .
                '<td>' . $product->varian . '</td>' .
                '<td>' . $product->harga . '</td>' .
                '<td>' . $product->satuan . '</td>' .
                '<td>' . $product->stok . '</td>' .
                '<td>
                <a class="unfold-link media align-items-center text-nowrap" href="/tampildata/' . $product->idbarang . '/editdatabarang"><i class="gd-pencil unfold-item-icon mr-3"></i><span class="media-body">Edit Barang </span></a>
                <a class="unfold-link media align-items-center text-nowrap" href="/tampildata/' . $product->idbarang . '/databarang"><i class="gd-pencil unfold-item-icon mr-3"></i><span class="media-body">Edit Barang Yang Akan Keluar</span></a>
                <a class="unfold-link media align-items-center text-nowrap" href="/hapus/' . $product->idbarang . '/databarangmasuk"><i class="gd-trash unfold-item-icon mr-3"></i><span class="media-body">Delete</span></a>' . '</td>' .

                '</tr>';
        }


    return Response($output);

       }


    }
}
    public function search1(Request $request)
    {

    if($request->ajax())
    {

    $output="";
    $products=DB::table('logbarangkeluar')
    ->where('idlog','LIKE','%'.$request->search."%")
    ->orwhere('idbarang','LIKE','%'.$request->search."%")
    ->orwhere('namabarang','LIKE','%'.$request->search."%")
    ->orwhere('jumlahbarang','LIKE','%'.$request->search."%")
    ->get();
    if($products)
    {
        $no =0;
        foreach ($products as $key => $product) {
            $output .= '<tr>' .
                 '<td>' . ++$no . '</td>' .
                '<td>' . $product->idlog . '</td>' .
                '<td>' . $product->idbarang . '</td>' .
                '<td>' . $product->namabarang . '</td>' .
                '<td>' . $product->jumlahbarang . '</td>' .
                '</tr>';
        }

        // '//<td>
        // <a class="unfold-link media align-items-center text-nowrap" href="/tampildata/' . $product->idbarang . '/databarang"><i class="gd-pencil unfold-item-icon mr-3"></i><span class="media-body">Edit Barang Yang Akan Keluar</span></a>
        // <a class="unfold-link media align-items-center text-nowrap" href="/hapus/' . $product->idbarang . '/databarangmasuk"><i class="gd-trash unfold-item-icon mr-3"></i><span class="media-body">Delete</span></a>' . '</td>' .

    return Response($output);

       }


    }
}


    public function databarangmasuk(){
        $posts = DB::table('barang')->paginate(10);
        $cekbarang = DB::table('barang')->count();
        return view('content.databarangmasuk',compact('posts','cekbarang'));
    }
    public function barangkeluar(){
        $posts = DB::table('logbarangkeluar')->paginate(10);
        $cekbarang = DB::table('logbarangkeluar')->count();
        return view('content.databarangkeluar',compact('posts','cekbarang'));
    }
    public function laporanbarangkeluar(){
        $posts = DB::table('logbarangkeluar')->paginate(10);
        $cekbarang = DB::table('logbarangkeluar')->count();
        return view('content.laporanbarangkeluar',compact('posts','cekbarang'));
    }
    public function laporanbarangmasuk(){
        $posts = DB::table('barang')->paginate(10);
        $cekbarang = DB::table('barang')->count();
        return view('content.laporanbarangmasuk',compact('posts','cekbarang'));
    }
    public function halamantambahdatabarang(){
        // $posts = DB::table('barang')->paginate(3);
        return view('content.halamantambahdatabarang');
    }

    public function tambahdatabarangmasuk(Request $request){

        $nomorbarang = rand();
        $data = [
            'idbarang'=> $nomorbarang,
            'namabarang'=>$request->namabarang,
            'jenisbarang'=>$request->jenisbarang,
            'varian'=>$request->varian,
            'satuan'=>$request->satuan,
            'harga'=>$request->harga,
            'stok'=>$request->stok
            // 'password'=>Hash::make($request->password),

        ];
        // dd($data);
        $simpan= DB::table('barang')->insert($data);
        if ($simpan) {
            return  Redirect('/databarangmasuk')->with(['berhasil'=>'Data Berhasil Disimpan']);
        }
    }
    public function databarangkeluar(Request $request){
        // dd($request->idbarang);
        $barang = DB::table('barang')
        ->where('idbarang',$request->idbarang)
        ->first();
        return view('content.editbarangkeluar', compact('barang') );
    }
    public function tampildatabarang(Request $request){
        // dd($request->idbarang);
        $barang = DB::table('barang')
        ->where('idbarang',$request->idbarang)
        ->first();
        return view('content.editdatabarang', compact('barang') );
    }

    public function updatedatabarang(Request $request){
        $barang = DB::table('barang')
        ->where('idbarang',$request->idbarang)
        ->first();
        // dd($request->stok);

        $stokkeluar = $request->stokkeluar;
        $stokawal = $request->stok;

        $hasilnya = $stokawal - $stokkeluar;

        if (!empty($request->stok)) {
            $data = [
                'idlog'=>rand(),
                'idbarang'=> $request->idbarang,
                'namabarang'=>$request->namabarang,
                // 'jenisbarang'=>$request->jenisbarang,
                // 'varian'=>$request->varian,
                // 'satuan'=>$request->satuan,
                // 'harga'=>$request->harga,
                'jumlahbarang'=>$request->stokkeluar
                // 'password'=>Hash::make($request->password),

            ];
            $data2 = [
                // 'idlog'=>rand(),
                // 'idbarang'=> $request->idbarang,
                'namabarang'=>$request->namabarang,
                'jenisbarang'=>$request->jenisbarang,
                'varian'=>$request->varian,
                'satuan'=>$request->satuan,
                'harga'=>$request->harga,
                'stok'=>$hasilnya
                // 'password'=>Hash::make($request->password),

            ];

        }
        else{
                $data = [
                    // 'idbarang'=> $nomorbarang,
                    'jumlahbarang'=>$request->stokkeluar
                ];
                $data2 = [
                    // 'idbarang'=> $nomorbarang,
                    'stok'=>$hasilnya
                ];
        }

            $request->validate([
                'stok' => 'required|numeric|min:10',
            ]);
            // $barang = DB::table('barang')::findOrFail($request->idbarang);
            if ($request->stokkeluar > $barang->stok) {
                return redirect('/tampildata/{idbarang}/databarang')->with(['gagal'=>'Jumlah permintaan melebihi stok yang tersedia.']);
            }else {
                DB::table('barang')->where('idbarang',$barang->idbarang)->update($data2);
                $insertbarangkeluar = DB::table('logbarangkeluar')->insert($data);
                if ($insertbarangkeluar) {
                    return Redirect('/databarangmasuk')->with(['berhasil'=>'Data Berhasil keluar']);
                }
        }


}
    public function rubahdatabarang(Request $request){
        $barang = DB::table('barang')
        ->where('idbarang',$request->idbarang)
        ->first();
        if (!empty($request->stok)) {
            $data2 = [
                // 'idlog'=>rand(),
                // 'idbarang'=> $request->idbarang,
                'namabarang'=>$request->namabarang,
                'jenisbarang'=>$request->jenisbarang,
                'varian'=>$request->varian,
                'satuan'=>$request->satuan,
                'harga'=>$request->harga,
            ];
        }
        else{
            $data2 = [
                // 'idlog'=>rand(),
                // 'idbarang'=> $request->idbarang,
                'stok'=>$request->stok,

                // 'password'=>Hash::make($request->password),

            ];

        }
             $insertbarangkeluar = DB::table('barang')->where('idbarang',$barang->idbarang)->update($data2);

                if ($insertbarangkeluar) {
                    return Redirect('/databarangmasuk')->with(['berhasil'=>'Data Berhasil keluar']);
                }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    // function action(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   $output = '';
    //   $query = $request->get('query');
    //   if($query != '')
    //   {
    //    $data = DB::table('barang')
    //      ->where('namabarang', 'like', '%'.$query.'%')
    //      ->orWhere('jenisbarang', 'like', '%'.$query.'%')
    //      ->orWhere('varian', 'like', '%'.$query.'%')
    //      ->orWhere('satuan', 'like', '%'.$query.'%')
    //      ->orWhere('harga', 'like', '%'.$query.'%')
    //      ->orderBy('stok', 'desc')
    //      ->get();

    //   }
    //   else
    //   {
    //    $data = DB::table('barang')
    //      ->orderBy('idbarang', 'desc')
    //      ->get();
    //   }
    //   $total_row = $data->count();
    //   if($total_row > 0)
    //   {
    //    foreach($data as $row)
    //    {
    //     $output .= '
    //     <tr>
    //      <td>'.$row->idbarang.'</td>
    //      <td>'.$row->namabarang.'</td>
    //      <td>'.$row->jenisbarang.'</td>
    //      <td>'.$row->varian.'</td>
    //      <td>'.$row->satuan.'</td>
    //      <td>'.$row->harga.'</td>
    //      <td>'.$row->stok.'</td>
    //     </tr>
    //     ';
    //    }
    //   }
    //   else
    //   {
    //    $output = '
    //    <tr>
    //     <td align="center" colspan="5">No Data Found</td>
    //    </tr>
    //    ';
    //   }
    //   $data = array(
    //    'table_data'  => $output,
    //    'total_data'  => $total_row
    //   );

    //   echo json_encode($data);
    //  }
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //define validation rules
    //     $validator = Validator::make($request->all(), [
    //         'namabarang'     => 'required',
    //         'jenisbarang'   => 'required',
    //         'varian'   => 'required',
    //         'harga'   => 'required',
    //         'satuan'   => 'required',
    //         'stok'   => 'required',
    //     ]);

    //     //check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     //create post
    //     $data = [
    //         'namabarang'=>$request->namabarang,
    //         'jenisbarang'=>$request->jenisbarang,
    //         'varian'=>$request->varian,
    //         'harga'=>$request->varian,
    //         'satuan'=>$request->satuan,
    //         'stok'=>$request->stok,
    //     ];
    //     $simpan= DB::table('barang')->insert($data);


    //     //return response
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Berhasil Disimpan!',
    //         'data'    => $simpan
    //     ]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusdatabarangmasuk($id)
    {
        // dd($id);
        $barangmasuk = DB::table('barang')
        ->where('idbarang',$id)
        ->delete();
        if ($barangmasuk) {
        return Redirect('/databarangmasuk')->with(['berhasil'=>'Data Berhasil Hapus']);
        } else {
        return Redirect('/dashboard');
        }
    }
    public function laporanpdf()
    {
        // dd($id);
        // $users = User::all();

         $totalharga = DB::table('barang')
            ->select(DB::raw('SUM(stok * harga) AS totalbayar'))
            ->get();

        $databarang = DB::table('barang')->get();
        // $data =['databarang' => $databarang, 'totalharga' => $totalharga];
        // $pdf = PDF::loadView('content.laporanpdf',$data )
        //     ->setPaper('a4', 'portrait');

        // return $pdf->stream('LaporanStok.pdf');
           // view()->share('employee',$data);
        // $pdf = PDF::loadView('pdf_view', $data);
        return view('content.laporanpdf', compact('totalharga','databarang') );

    }
    public function  laporanpdfkeluar()
    {

        $databarang = DB::table('logbarangkeluar')->get();
        return view('content.laporanbarangkeluarpdf', compact('databarang') );

    }

}
