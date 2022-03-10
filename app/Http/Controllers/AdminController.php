<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
    }


    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        //$result = Admin::where(['email'=>$email,'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter correct password');
                return redirect('admin');
            }
        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }
        // if(isset($result[0]->id)){
        //     $request->session()->put('ADMIN_LOGIN',true);
        //     $request->session()->put('ADMIN_ID',$result[0]->id);
        //     return redirect('admin/dashboard');
        // }else{
        //     $request->session()->flash('error','Please enter valid login details');
        //     return redirect('admin');
        // }

    }


    public function dashboard()
    {
        $result['page_title'] = 'Dashboard';
        $result['category_count'] = DB::table('categories')->where(['status'=>1])->get()->count();
        $result['products_count'] = DB::table('products')->where(['status'=>1])->get()->count();
        $result['coupons_count'] = DB::table('coupons')->where(['status'=>1])->get()->count();
        // $result['admin_details']=Admin::where(['id'=>session()->get('ADMIN_ID')])->get();
        return view('admin.dashboard',$result);
    }

    public function updatepassword(){
        $r = Admin::find(1);
        $r->password = Hash::make('password');
        $r->save();
    }



}
