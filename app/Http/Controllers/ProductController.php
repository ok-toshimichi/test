<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * 商品一覧を表示する
     * 
     * @return view
     */
    public function showList(Request $request)
    {
        $keyword = $request->input('keyword');
        $search_id = $request->input('search_id');
        $companies = Company::all();
        $query = Product::query();
 
        if (!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        if (!empty($search_id)) {
            $query->where('company_id', '=', $search_id);
        }
 
        $products = $query->get();
                
        return view(
            'product.list', compact('products', 'keyword', 'companies', 'search_id')
        );
    }


    /**
     * 商品詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('products'));
        }
        
        return view('product.detail', ['product' => $product]);
    }


    /**
     * 商品登録画面を表示する
     * 
     * @return view
     */
    public function showCreate()
    {
        $companies = Company::all();
        
        return view('product.form', ['companies' => $companies]);
    }


    /**
     * 商品を登録する
     * 
     * @return view
     */
    public function exeStore(ProductRequest $request)
    {
        //商品のデータを受け取る
        $inputs = $request->all();

        //画像データの保存場所指定
        if($request['image']){
            $filename = request()->file('image')->getClientOriginalName();
            $inputs['image'] = request('image')->storeAs('public/images', $filename);
        }

        \DB::beginTransaction();
        try{
            //商品を登録
            Product::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }        

        \Session::flash('err_msg', '商品を登録しました。');
        return redirect(route('products'));
    }

    
    /**
     * 商品編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $product = Product::find($id);
        $companies = Company::all();

        if(is_null($product)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('products'));
        }
        
        return view('product.edit', ['product' => $product, 'companies' => $companies]);
    }


    /**
     * 商品を更新する
     * 
     * @return view
     */
    public function exeUpdate(ProductRequest $request)
    {
        //商品のデータを受け取る
        $inputs = $request->all();
        //画像データの保存場所指定
        if($request['image']){
            $filename = request()->file('image')->getClientOriginalName();
            $inputs['image'] = request('image')->storeAs('public/images', $filename);
        }

        \DB::beginTransaction();

        try{
            //商品を登録
            $product = Product::find($inputs['id']);

            $updateContent  = [
                'company_id' => $inputs['company_id'],
                'product_name' => $inputs['product_name'],
                'price' => $inputs['price'],
                'stock' => $inputs['stock'],
                'comment' => $inputs['comment']
            ];

            if(!empty($request['image'])) {
                $updateContent += array('image' => $inputs['image']);
            }

            $product->fill($updateContent);            
            $product->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('err_msg', '商品を登録しました。');
        return redirect(route('products'));
    }


    /**
     * 商品削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if(empty($id)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('products'));
        }
        try{
            //商品を削除
            Product::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        
        \Session::flash('err_msg', '削除しました。');
        return redirect(route('products'));
    }

}
