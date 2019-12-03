<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Cart;
use App\Destinasi;
use Validator;

class CustomerController extends Controller
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
            $data = new Customer();
            $data->username = $input->username;
            $data->password = bcrypt($input->password);
            $data->email = $input->email;
            $data->telepon = $input->telepon;
            $data->save();
            return redirect('/customerLogin')->with('alert', 'Pendaftaran Sukses!');
        }
    }

    public function login(Request $input)
    {
        $data = Customer::where('username', $input->username)->first();
        if (!($data == null)) {
            if (Hash::check($input->password, $data->password)) {
                Session::put('username_customer', $data->username);
                Session::put('id_customer', $data->id);
                return redirect('/destinasi');
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

    public function addtocart(Request $input)
    {
        if(Session::has('username_customer')){
            $iddestinasi = $input->id;
            $cart = array();
            if(Session::has('cart')) $cart = Session::get('cart');
            if(array_key_exists($iddestinasi,$cart)) $cart[$iddestinasi]++;
            else $cart[$iddestinasi] = 1;
            Session::put('cart',$cart);
            return redirect()->back();
        }
    }

    public function reducecart(Request $input)
    {
        if(Session::has('username_customer')){
            $iddestinasi = $input->id;
            $cart = array();
            if(Session::has('cart')) $cart = Session::get('cart');
            if(array_key_exists($iddestinasi,$cart)){
                $cart[$iddestinasi]--;
                if($cart[$iddestinasi] == 0) unset($cart[$iddestinasi]);
            }
            else $cart[$iddestinasi] = 1;
            Session::put('cart',$cart);
            return redirect()->back();
        }
    }

    public function removefromcart(Request $input)
    {
        if(Session::has('username_customer')){
            $iddestinasi = $input->id;
            $cart = array();
            if(Session::has('cart')) $cart = Session::get('cart');
            if(array_key_exists($iddestinasi,$cart)) unset($cart[$iddestinasi]);
            Session::put('cart',$cart);
            return redirect()->back();
        }
    }

      public function getCart(Request $input)
      {
        if(Session::has('username_customer')){
          $cart = array();
          if(Session::has('cart')) $cart = Session::get('cart');
          $data = array();
          foreach($cart as $key => $value){
              $destinasi = Destinasi::where('id',$key)->first();
              array_push($data,[$destinasi,$value]);
          }
          return view('cart',['cart'=>$data]);
        }
    }

    public function pesan(Request $input)
    {
        if(Session::has('username_customer')){
            $cart = array();
            if(Session::has('cart')) $cart = Session::get('cart');
            foreach($cart as $key => $value){
                $destinasi = Destinasi::where('id',$key)->first();
                $dataCart = new Cart;
                $dataCart->jumlah = $value;
                $dataCart->id_destinasi = $key;
                $dataCart->id_customer = Session::get('id_customer');
                $dataCart->harga = $destinasi->harga;
                $dataCart->save();
            }
            Session::forget('cart');
            return redirect()->back()->with('alert', 'Pesanan Berhasil!');
        }
    }

    public function getDestinasi()
    {
        $dataDestinasi = Destinasi::all();
        $cart = array();
        if(Session::has('cart')) $cart = Session::get('cart');
        return view('destinasi',['destinasi'=>$dataDestinasi,'cart'=>$cart]);
    }
}
