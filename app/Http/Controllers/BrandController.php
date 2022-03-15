<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $result['data'] = Brand::all();
        return view('admin.brand.brand',$result);
    }

    public function manage_brand(Request $request,$id='')
    {
        if($id>0){
            $arr= Brand::where(['id'=>$id])->get();
            $result['brand_name'] = $arr['0']->brand_name;
            $result['brand_image'] = $arr['0']->brand_image;
            if( $arr['0']->is_home==1){
                $result['is_home'] = 1;
                $result['is_home_value'] = 'checked';
            }else{
                $result['is_home'] = 0;
                $result['is_home_value'] = 'unchecked';
            }

            $result['id'] = $arr['0']->id;

        }else{
            $result['brand_name']='';
            $result['brand_image'] = '';
            $result['is_home'] = '';
            $result['is_home_value'] = '';
            $result['id']='';
        }
        return view('admin.brand.manage_brand',$result);
    }

    public function manage_brand_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }

        $request->validate([
            'brand_name'=>'required',
            'brand_image'=>$image_validation
        ]);

        if($request->post('id')>0){
            $model = Brand::find($request->post('id'));
            $msg = "Brand updated";
        }else{
            $model = new Brand();
            $msg = "Brand inserted";
        }
        if($request->hasFile('brand_image')){
            $filenameWithExt    = $request->file('brand_image')->getClientOriginalName();
            $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension          = $request->file('brand_image')->getClientOriginalExtension();
            $fileNameToStore    = $filename.'_'.time().'.'.$extension;
            $path               = $request->file('brand_image')->storeAs('public/media', $fileNameToStore);
            $model->brand_image = $fileNameToStore ;
        }

        $model->brand_name = $request->post('brand_name');
        $model->is_home = $request->has('is_home') ? 1 : 0;
        $model->status = 1;

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }

    public function delete(Request $request,$id)
    {
        $model= Brand::find($id);
        $model->delete();
        $request->session()->flash('message','Brand deleted');
        return redirect('admin/brand');
    }

    public function status(Request $request,$status,$id)
    {
        $model= Brand::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/brand');
    }





}
