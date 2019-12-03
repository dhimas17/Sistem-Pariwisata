<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Admin;
use App\Cart;
use App\Customer;
use App\Destinasi;
use Validator;

class AdminController extends Controller
{
    public function register(Request $input)
    {
        $validator = Validator::make($input->all(), [
            'username' => 'required|min:6|max:50|unique:admin',
            'password' => 'required|min:6|max:20',
            'email' => 'required|min:6|max:50',
            'telepon' => 'required|min:11|max:15',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alert', 'Pendaftaran Gagal!');
        } else {
            $data = new Admin();
            $data->username = $input->username;
            $data->password = bcrypt($input->password);
            $data->email = $input->email;
            $data->telepon = $input->telepon;
            $data->save();
            return redirect('/adminLogin')->with('alert', 'Pendaftaran Sukses!');
        }
    }

    public function login(Request $input)
    {
        $data = Admin::where('username', $input->username)->first();
        if (!($data == null)) {
            if (Hash::check($input->password, $data->password)) {
                Session::put('username_admin', $data->username);
                Session::put('id_admin', $data->id);
                return redirect('/listPesanan');
            } else {
                return redirect()->back()->with('alert', 'Password Tidak Sesuai!');
            }
        } else {
            return redirect()->back()->with('alert', 'Username dan Password Tidak Sesuai!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    private function generateId()
    {
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
        $id = "";
        for ($i = 0; $i < 6; $i++) {
            $id = $id . $char[rand(0, 15)];
        }
        return $id;
    }

    public function tambah(Request $input)
    {
        $filename = explode('.', $input->gambar->getClientOriginalName());
        $fileExt = end($filename);
        $id = $this->generateId();
        $filename = $id . '.' . $fileExt;
        $path = $input->gambar->storeAs('image/destinasi', $filename, 'public_uploads');

        $dataDestinasi = new Destinasi();
        $dataDestinasi->destinasi = $input->destinasi;
        $dataDestinasi->deskripsi = $input->deskripsi;
        $dataDestinasi->harga = $input->harga;
        $dataDestinasi->gambar = $path;
        $dataDestinasi->save();
        return redirect('/tambahDestinasi')->with('alert', 'Destinasi Berhasil Ditambah!');;
    }

    public function hapus(Request $input)
    {
        $dataDestinasi = Destinasi::where('id', $input->id)->delete();
        return redirect()->back()->with('alert', 'Destinasi Dihapus');
    }

    public function getList()
    {
        $data = Cart::all();
        for($i=0;$i<count($data);$i++){
            $data[$i]->destinasi = Destinasi::where('id',$data[$i]->id_destinasi)->first()->destinasi;
        }
        return view('listPesanan',['cart'=>$data]);
    }

    public function updateDestinasi()
    {
        $dataDestinasi = Destinasi::all();
        return view('updateDestinasi',['destinasi'=>$dataDestinasi]);
    }

    public function hapusDestinasi()
    {
        $dataDestinasi = Destinasi::all();
        return view('hapusDestinasi',['destinasi'=>$dataDestinasi]);
    }
    
    public function updatingDestinasi(Request $input)
    {
        $dataDestinasi = Destinasi::where('id',$input->id)->first();
        return view('updatingDestinasi',['destinasi'=>$dataDestinasi]);
    }

    public function update(Request $input){
        $dataDestinasiAsli = Destinasi::where('id',$input->id)->first();
        $dataDestinasi = Destinasi::find($dataDestinasiAsli->id);

        if($input->gambar != null){
            Storage::delete($dataDestinasiAsli->gambar);

            $filename = explode('.', $input->gambar->getClientOriginalName());
            $fileExt = end($filename);
            $id = $this->generateId();
            $filename = $id . '.' . $fileExt;
            $path = $input->gambar->storeAs('image/destinasi', $filename, 'public_uploads');
            $dataDestinasi->gambar = $path;
        }

        $dataDestinasi->destinasi = $input->destinasi;
        $dataDestinasi->deskripsi = $input->deskripsi;
        $dataDestinasi->harga = $input->harga;
        $dataDestinasi->save();
        return redirect('/updateDestinasi')->with('alert', 'Update Destinasi Berhasil!');;        
    }
}
