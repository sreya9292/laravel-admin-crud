<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['home_categories'] = DB::table('categories')->where(['status' => 1])->where(['is_home' => 1])->get();
        foreach ($result['home_categories'] as $list) {
            $result['home_categories_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['category_id' => $list->id])->get();

            foreach ($result['home_categories_product'][$list->id] as $list1) {
                $result['home_product_attr'][$list1->id] = DB::table('product_attr')
                    ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
                    ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
                    ->where(['product_attr.products_id' => $list1->id])
                    ->get();
            }
        }
        $result['home_brands'] = DB::table('brands')->where(['status' => 1])->where(['is_home' => 1])->get();

        $result['home_featured_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['is_featured' => 1])->get();

        foreach ($result['home_featured_product'][$list->id] as $list1) {
            $result['home_featured_product_attr'][$list1->id] = DB::table('product_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
                ->where(['product_attr.products_id' => $list1->id])
                ->get();
        }

        $result['home_trending_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['is_trending' => 1])->get();

        foreach ($result['home_trending_product'][$list->id] as $list1) {
            $result['home_trending_product_attr'][$list1->id] = DB::table('product_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
                ->where(['product_attr.products_id' => $list1->id])
                ->get();
        }

        $result['home_discounted_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['is_discounted' => 1])->get();

        foreach ($result['home_discounted_product'][$list->id] as $list1) {
            $result['home_discounted_product_attr'][$list1->id] = DB::table('product_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
                ->where(['product_attr.products_id' => $list1->id])
                ->get();
        }
        $result['home_banner'] = DB::table('home_banners')->where(['status' => 1])->where(['is_home' => 1])->get();

        return view('front.index', $result);
    }

    public function product(Request $request, $slug)
    {
        $result['product'] = DB::table('products')->where(['status' => 1])->where(['slug' => $slug])->get();

        foreach ($result['product'] as $list1) {
            $result['product_attr'][$list1->id] = DB::table('product_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
                ->where(['product_attr.products_id' => $list1->id])
                ->get();
        }

        foreach ($result['product'] as $list1) {
            $result['product_images'][$list1->id] = DB::table('product_images')
                ->where(['product_images.products_id' => $list1->id])
                ->get();
        }

        $result['related_product'] = DB::table('products')->where(['status' => 1])->where('slug', '!=', $slug)->where(['category_id' => $result['product'][0]->category_id])->get();
        foreach ($result['related_product'] as $list1) {
            $result['related_product_attr'][$list1->id] = DB::table('product_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
                ->where(['product_attr.products_id' => $list1->id])
                ->get();
        }


        return view('front.product', $result);
    }

    function add_to_cart(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_LOGIN');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $size_id = $request->post('size_id');
        $color_id = $request->post('color_id');
        $pqty = $request->post('pqty');
        $product_id = $request->post('product_id');
        $result = DB::table('product_attr')
            ->select('product_attr.id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
            ->where(['products_id' => $product_id])
            ->where(['sizes.size' => $size_id])
            ->where(['colors.color' => $color_id])
            ->get();
        $product_attr_id = $result[0]->id;

        $check=DB::table('cart')->where(['user_id' => $uid])->where(['user_type' => $user_type])->where(['product_id' => $product_id])->where(['product_attr_id' =>$product_attr_id])->get();
        if(isset($check[0])){
            $update_id = $check[0]->id;
            if($pqty==0){
                DB::table('cart')->where(['user_id' => $update_id])->delete();
                $msg = "Deleted";
            }else{
                DB::table('cart')->where(['user_id' => $update_id])->update(['qty'=>$pqty]);
                $msg = "Updated";
            }

        }else{
            $id = DB::table('cart')->insertGetId([
                'user_id'=>$uid,
                'user_type'=>$user_type,
                'product_id'=>$product_id,
                'product_attr_id'=>$product_attr_id,
                'qty'=>$pqty,
                'added_on'=>date('Y-m-d h:i:s')
            ]);
            $msg = "Added";
        }
        return response()->json(['msg'=>$msg]);
    }


    public function cart(Request $request){
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_LOGIN');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $result['list']=DB::table('cart')
        ->leftJoin('products','products.id','=','cart.product_id')
        ->leftJoin('product_attr','product_attr.id','=','cart.product_attr_id')
        ->leftJoin('sizes', 'sizes.id', '=', 'product_attr.size_id')
        ->leftJoin('colors', 'colors.id', '=', 'product_attr.color_id')
        ->where(['user_id' => $uid])
        ->where(['user_type' => $user_type])
        ->select('cart.qty','products.name','products.image','sizes.size','colors.color','product_attr.price','products.slug','products.id as pid','product_attr.id as attr_id')
        ->get();

     //pxr($result);


        return view('front.cart',$result);
    }
}
