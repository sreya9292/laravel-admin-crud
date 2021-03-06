<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    public function index()
    {
        $result['data'] = HomeBanner::all();
        return view('admin.home_banner.home_banner',$result);
    }

    public function manage_home_banner(Request $request,$id='')
    {
        if($id>0){
            $arr= HomeBanner::where(['id'=>$id])->get();
            $result['image'] = $arr['0']->image;
            $result['title'] = $arr['0']->title;
            $result['description'] = $arr['0']->description;
            $result['btn_txt'] = $arr['0']->btn_txt;
            $result['btn_link'] = $arr['0']->btn_link;
            if( $arr['0']->is_home==1){
                $result['is_home'] = 1;
                $result['is_home_value'] = 'checked';
            }else{
                $result['is_home'] = 0;
                $result['is_home_value'] = 'unchecked';
            }

            $result['id'] = $arr['0']->id;

        }else{
            $result['image']='';
            $result['title'] = '';
            $result['description'] = '';
            $result['btn_txt']='';
            $result['btn_link'] = '';
            $result['is_home'] = '';
            $result['is_home_value'] = '';
            $result['id']='';
        }
        return view('admin.home_banner.manage_home_banner',$result);
    }

    public function manage_home_banner_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }

        $request->validate([
            'image'=>$image_validation
        ]);

        if($request->post('id')>0){
            $model = HomeBanner::find($request->post('id'));
            $msg = "Home banner updated";
        }else{
            $model = new HomeBanner();
            $msg = "Home banner inserted";
        }

        if($request->hasFile('image')){
            if($request->post('id')>0){
                $arrImage = HomeBanner::where(['id'=>$request->post('id')])->get();
                if(Storage::exists('public/media/banner/'.$arrImage[0]->image)){
                    Storage::delete('public/media/banner/'.$arrImage[0]->image);
                }
            }
            $rand = rand('111111','999999');
            $filenameWithExt    = $request->file('image')->getClientOriginalName();
            $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension          = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore    = $rand.time().'.'.$extension;
            $path               = $request->file('image')->storeAs('public/media/banner/', $fileNameToStore);
            $model->image = $fileNameToStore ;
        }
        $model->title = $request->post('title');
        $model->description = $request->post('description');
        $model->btn_txt = $request->post('btn_txt');
        $model->btn_link = $request->post('btn_link');
        $model->is_home = $request->has('is_home') ? 1 : 0;
        $model->status = 1;

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/home_banner');
    }

    public function delete(Request $request,$id)
    {
        $model= HomeBanner::find($id);
        $model->delete();
        $request->session()->flash('message','Home Banner deleted');
        return redirect('admin/home_banner');
    }

    public function status(Request $request,$status,$id)
    {
        $model= HomeBanner::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/home_banner');
    }
}
