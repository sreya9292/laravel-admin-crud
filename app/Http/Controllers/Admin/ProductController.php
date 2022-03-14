<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $result['data'] = Product::all();
        return view('admin.product.product', $result);
    }

    public function manage_product(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Product::where(['id' => $id])->get();
            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['slug'] = $arr['0']->slug;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;

            $result['productAttrArr'] = DB::table('product_attr')->where(['products_id'=>$id])->get();
            $productImagesArr = DB::table('product_images')->where(['products_id'=>$id])->get();
            if(!isset($productImagesArr[0])){
                $result['productImagesArr']['0']['id']='';
                $result['productImagesArr']['0']['images']='';
            }else{
                $result['productImagesArr']=$productImagesArr;
            }

        } else {
            $result['category_id'] = '';
            $result['name'] = '';
            $result['image'] = '';
            $result['slug'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['status'] = '';
            $result['id'] = 0;

            $result['productAttrArr'][0]['id']='';
            $result['productAttrArr'][0]['product_id']='';
            $result['productAttrArr'][0]['sku']='';
            $result['productAttrArr'][0]['attr_image']='';
            $result['productAttrArr'][0]['mrp']='';
            $result['productAttrArr'][0]['price']='';
            $result['productAttrArr'][0]['qty']='';
            $result['productAttrArr'][0]['size_id']='';
            $result['productAttrArr'][0]['color_id']='';

            $result['productImagesArr']['0']['id']='';
            $result['productImagesArr']['0']['images']='';
        }

        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        $result['sizes']=DB::table('sizes')->where(['status'=>1])->get();
        $result['colors']=DB::table('colors')->where(['status'=>1])->get();

        return view('admin.product.manage_product', $result);
    }

    public function manage_product_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }

        $request->validate([
            'name' => 'required',
            'image'=> $image_validation,
            'slug' => 'required|unique:products,slug,' . $request->post('id'),
            'attr_image.*'=>'mimes:jpeg,jpg,png',
            'images.*'=>'mimes:jpeg,jpg,png'
        ]);

        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');

        foreach($skuArr as $key=>$val){
            $check = DB::table('product_attr')->where('sku','=',$skuArr[$key])->where('id','!=',$paidArr[$key])->get();
            if(isset($check[0])){
                $request->session()->flash('sku_error',$skuArr[$key].'SKU already used');
                return redirect(request()->headers->get('referer'));
            }
        }

        if ($request->post('id') > 0) {
            $model = Product::find($request->post('id'));
            $msg = "Product updated";
        } else {
            $model = new Product();
            $msg = "Product inserted";
        }

        if($request->hasFile('image')){
            $filenameWithExt    = $request->file('image')->getClientOriginalName();
            $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension          = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore    = $filename.'_'.time().'.'.$extension;
            $path               = $request->file('image')->storeAs('public/media', $fileNameToStore);
            // $image=$request->post('image');
            // $ext=$image->extension();
            // $image_name = time().'.'.$ext;
            // $image->storeAs('public/media',$image_name);
            $model->image = $fileNameToStore ;
        }

        $model->category_id = $request->post('category_id');
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('desc');
        $model->keywords = $request->post('keywords');
        $model->technical_specification = $request->post('technical_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->status = 1;
        $model->save();

        /*Product Attr Start */
        $pid =$model->id;
        // $paidArr = $request->post('paid');
        // $skuArr = $request->post('sku');
        // $mrpArr = $request->post('mrp');
        // $priceArr = $request->post('price');
        // $qtyArr = $request->post('qty');
        // $size_idArr = $request->post('size_id');
        // $color_idArr = $request->post('color_id');

        foreach($skuArr as $key=>$val){
            $productAttrArr['products_id']=$pid;
            $productAttrArr['sku']=$skuArr[$key];
            $productAttrArr['mrp']=$mrpArr[$key];
            $productAttrArr['price']=$priceArr[$key];
            $productAttrArr['qty']=$qtyArr[$key];
            if($size_idArr[$key]==''){
                $productAttrArr['size_id']=0;
            }else{
                $productAttrArr['size_id']=$size_idArr[$key];
            }

            if($color_idArr[$key]==''){
                $productAttrArr['color_id']=0;
            }else{
                $productAttrArr['color_id']=$color_idArr[$key];
            }


            if($request->hasFile("attr_image.$key")){
                $rand=rand('111111','999999');
                $attr_image = $request->file("attr_image.$key");
                $filenameWithExt    = $request->file("attr_image.$key")->getClientOriginalName();
                $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension          = $request->file("attr_image.$key")->getClientOriginalExtension();
                $fileNameToStore    = $filename.'_'.time().$rand.'.'.$extension;
                $path               = $request->file("attr_image.$key")->storeAs('public/media', $fileNameToStore);
                $productAttrArr['attr_image'] = $fileNameToStore;
            }else{
                $productAttrArr['attr_image'] = '';
            }

            if($paidArr[$key]!=''){
                DB::table('product_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
            }else{
                DB::table('product_attr')->insert($productAttrArr);
            }
        }
        /*Product Attr End */

        /*Product Images Start */
        $piidArr = $request->post('piid');
        foreach($piidArr as $key=>$val){
            $productImageArr['products_id']=$pid;
            if($request->hasFile("images.$key")){
                $rand=rand('111111','999999');
                $attr_image = $request->file("images.$key");
                $filenameWithExt    = $request->file("images.$key")->getClientOriginalName();
                $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension          = $request->file("images.$key")->getClientOriginalExtension();
                $fileNameToStore    = $filename.'_'.time().$rand.'.'.$extension;
                $path               = $request->file("images.$key")->storeAs('public/media', $fileNameToStore);
                $productImageArr['images'] = $fileNameToStore;
            }

            if($piidArr[$key]!=''){
                DB::table('product_images')->where(['id'=>$piidArr[$key]])->update($productImageArr);
            }else{
                DB::table('product_images')->insert($productImageArr);
            }
        }

        /*Product Images End */

        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }

    public function delete(Request $request, $id)
    {
        $model = Product::find($id);
        $model->delete();
        $request->session()->flash('message', 'product deleted');
        return redirect('admin/product');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Status Updated');
        return redirect('admin/product');
    }

    public function product_attr_delete(Request $request,$paid,$pid)
    {
        DB::table('product_attr')->where(['id'=>$paid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function product_images_delete(Request $request,$piid,$pid)
    {
        DB::table('product_images')->where(['id'=>$piid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

}
