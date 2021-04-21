<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\List_;

class BukuController extends Controller
{
    public function list()
    {
        $hasil = DB::select('select * from buku');
        return view('list-buku', ['data' => $hasil]);
    }
    public function simpan(Request $req)
    {
        DB::insert(
            'insert into buku (judul_buku,penulis, penerbit) values (?, ?, ?)',
            [$req->judul_buku, $req->penulis, $req->penerbit]
        );
        $hasil = DB::select('select * from buku');
        return view('list-buku', ['data' => $hasil]);
    }
    public function hapus($req)
    {
        Log::info('proses hapus dengan id=' . $req);
        DB::delete('delete from buku where id = ?', [$req]);

        $hasil = DB::select('select * from buku');
        return view('list-buku', ['data' => $hasil]);
    }
    public function ubah($req)
    {
        $hasil = DB::select('select * from buku where id = ?', [$req]);
        return view('form-ubah', ['data' => $hasil]);
    }
    public function rubah(Request $req)
    {
        Log::info('Hallo');
        Log::info($req);
        DB::update(
            'update buku set ' .
                'judul_buku=?, ' .
                'penulis=?, ' .
                'penerbit=? where id=? ',
            [
                $req->judul_buku,
                $req->penulis,
                $req->penerbit,
                $req->id
            ]
        );
        $hasil = DB::select('select * from buku');
        return view('list-buku', ['data' => $hasil]);
    }
}
