<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use \Hash;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $user = $request->only('username','email');
        if ($request->password != $request->password2) {
            return redirect()->back()->with('error','Mật khẩu không chính xác!');
        }
        $user['password']=Hash::make($request->password);
        User::create($user);
        return redirect()->route('home')->with('success','Đăng kí thành công');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if(Auth::attempt($credentials)){
            return redirect()->route('home')->with('success','Đăng nhập thành công');
        }
        else{
            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success','Đăng xuất thành công');
    }

    public function addCart(Request $request) {
        $id = $request->input('idProduct');

        if (Auth::user()->cart) {
            $cart=Auth::user()->cart;

            $data = Product::where('idProduct','=',$id)->first();

            $cart = json_decode($cart);
            array_push($cart, $id);
            $addCart['cart']= $cart;
            if(Auth::user()->update($addCart)){
                return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
            }
            else{
                return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
            }
        }
        else{
            $data = Product::where('idProduct','=', $id)->first();

            $data = json_decode($data);

            $addCart['cart'][0] = $id;

            if(Auth::user()->update($addCart)){

                return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
            }
            else{
                return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại');
            }
        }
    }

    public function add(Request $request){
        $id = $request->input('product_id');

        if (Auth::user()->cart) {
            $cart=Auth::user()->cart;
            $cart = json_decode($cart);
            array_push($cart, $id);
            $addCart['cart']= $cart;
            Auth::user()->update($addCart);
        }
        else{
            $addCart['cart'][0] = $id;
            Auth::user()->update($addCart);
        }
        $view = view('orders.test', compact('cart'))->render();
        return $view;
    }
}
