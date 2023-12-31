<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class ManagerController extends Controller
{
    public function index()
    {
        return view('content.dashboardmanager');
    }
    public function databarang1(){
        $posts = DB::table('barang')->paginate(10);
        return view('content.databarangtotal',compact('posts'));
    }
    public function databarangmasuk1(){
        $posts = DB::table('barang')->paginate(10);
        $cekbarang = DB::table('barang')->count();
        return view('content.databarangmasuktotal',compact('posts','cekbarang'));
    }
    public function barangkeluar(){
        $posts = DB::table('logbarangkeluar')->paginate(10);
        $cekbarang = DB::table('logbarangkeluar')->count();
        return view('content.databarangkeluartotal',compact('posts','cekbarang'));
    }
    public function laporanbarangkeluar(){
        $posts = DB::table('logbarangkeluar')->paginate(10);
        $cekbarang = DB::table('logbarangkeluar')->count();
        return view('content.viewbarangkeluar',compact('posts','cekbarang'));
    }
    public function laporanbarangmasuk(){
        $posts = DB::table('barang')->paginate(10);
        $cekbarang = DB::table('barang')->count();
        return view('content.viewbarangmasuk',compact('posts','cekbarang'));
    }
    public function search2(Request $request)
    {

    if($request->ajax())
    {

    $output="";
    $products=DB::table('barang')
    ->where('namabarang','LIKE','%'.$request->search1."%")
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


                '</tr>';
        }


    return Response($output);

       }


    }
}
public function search3(Request $request)
{

if($request->ajax())
{

$output="";
$products=DB::table('logbarangkeluar')
->where('namabarang','LIKE','%'.$request->search."%")
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
public function dataadmin(){
    $posts = DB::table('karyawan')->paginate(10);
    return view('content.dataadmin',compact('posts'));
}
public function halamantambahdata(){
    // $posts = DB::table('karyawan')->paginate(10);
    return view('content.halamantambahadmin');
}
public function tambahdataadmin(Request $request){

    // $nomorbarang = rand();
    $data = [
        'nik'=> $request->nik,
        'nama_lengkap'=>$request->nama_lengkap,
        'tanggallahir'=>$request->tanggallahir,
        'jabatan'=>$request->jabatan,
        'password'=>Hash::make($request->password)
        // 'harga'=>$request->harga,
        // 'stok'=>$request->stok
        // 'password'=>Hash::make($request->password),

    ];
    // dd($data);
    $simpan= DB::table('karyawan')->insert($data);
    if ($simpan) {
        return  Redirect('/dataadmin')->with(['berhasil'=>'Data Berhasil Disimpan']);
    }
}
public function hapusdataadmin($id){
        // dd($id);
        $admin = DB::table('karyawan')
        ->where('nik',$id)
        ->delete();
        // dd($admin);
        if ($admin) {
        return Redirect('/dataadmin')->with(['berhasil'=>'Data Berhasil Hapus']);
        } else {
        return Redirect('/dashboard');
        }
}
public function editdatakaryawan(Request $request){
    $karyawan = DB::table('karyawan')
    ->where('nik',$request->nik)
    ->first();
    // dd($karyawan);
    return view('content.halamanupdatedataadmin', compact('karyawan') );
}
public function rubahdataadmin(Request $request){
    $karyawan = DB::table('karyawan')
    ->where('nik',$request->nik)
    ->first();
    // dd($karyawan);
    if (!empty($request->password)) {
        $dataku = [
            'nama_lengkap'=>$request->nama_lengkap,
            'tanggallahir'=>$request->tanggallahir,
            'jabatan'=>$request->jabatan,
            'password'=>Hash::make($request->password),
        ];

        }
        else{
            $dataku = [
                'nama_lengkap'=>$request->nama_lengkap,
                'tanggallahir'=>$request->tanggallahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'jabatan'=>$request->jabatan,
                // 'password'=>Hash::make($request->password),
            ];
        }
$update = DB::table('karyawan')->where('nik',$karyawan->nik)->update($dataku);
if ($update) {
    return Redirect('/dataadmin')->with(['berhasil'=>'Data Berhasil Di Update']);
} else {
    return Redirect('/dataadmin');
}
}
}
