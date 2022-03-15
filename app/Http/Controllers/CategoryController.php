<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $result['data'] = Category::all();
        return view('admin.category.category',$result);
    }

    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr= Category::where(['id'=>$id])->get();
            $result['category_name'] = $arr['0']->category_name;
            $result['category_slug'] = $arr['0']->category_slug;
            $result['category_image'] = $arr['0']->category_image;
            if( $arr['0']->is_home==1){
                $result['is_home'] = 1;
                $result['is_home_value'] = 'checked';
            }else{
                $result['is_home'] = 0;
                $result['is_home_value'] = 'unchecked';
            }

            $result['id'] = $arr['0']->id;

        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['category_image'] = '';
            $result['is_home'] = '';
            $result['is_home_value'] = '';
            $result['id']='';
        }
        return view('admin.category.manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }

        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
            'category_image'=>$image_validation
        ]);

        if($request->post('id')>0){
            $model = Category::find($request->post('id'));
            $msg = "Category updated";
        }else{
            $model = new Category();
            $msg = "Category inserted";
        }
        if($request->hasFile('category_image')){
            $filenameWithExt    = $request->file('category_image')->getClientOriginalName();
            $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension          = $request->file('category_image')->getClientOriginalExtension();
            $fileNameToStore    = $filename.'_'.time().'.'.$extension;
            $path               = $request->file('category_image')->storeAs('public/media', $fileNameToStore);
            $model->category_image = $fileNameToStore ;
        }

        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->is_home = $request->has('is_home') ? 1 : 0;
        $model->status = 1;

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

    public function delete(Request $request,$id)
    {
        $model= Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('admin/category');
    }

    public function status(Request $request,$status,$id)
    {
        $model= Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/category');
    }





}
