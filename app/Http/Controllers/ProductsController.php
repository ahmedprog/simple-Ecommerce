<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Categories;
use App\images;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $products = Products::all();
        $categories = Categories::all();      
        return view('cpanel.products',compact('products','categories'));        
    }
    public function apiProducts()
    {

        $products = Products::all();
//        $categories = Categories::all();
       return DataTables::of($products)
           ->editColumn('categories_id',function ($product){
               return $product->categories->catName;
           })
            ->addColumn('action',function ($product){
                return '<button class="btn btn-danger sendIdDelete btn-xs "  onclick="deleteProduct('.$product->id.')" >
                        <span class="glyphicon glyphicon-trash"></span></button>
                        <button onclick="editForm('.$product->id.')" class="btn btn-primary sendProductId btn-xs">
                        <span class="glyphicon glyphicon-edit"></span></button>
                         <a href="'.url('/admin/products/'.$product->id).'" class="btn btn-success btn-xs" 
                          title="view"><span class="glyphicon glyphicon-eye-open"></span></a>';
            })
            ->make(true);
    }

    public function indexWeb()
    {
        $products = Products::all();  
        $categories = Categories::all();      
        return view('products',compact('products','categories'));        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= validator($request->all(),[
        'categories_id'=>'required',
        'name'=>'required|string',
        'price'=>'required|numeric|min:1|max:5000',
        'offer'=>'required|numeric|min:1|max:5000',
        'description'=>'required',
        'image.*'=>'image|nullable|max:1024',
        'image.main'=>'required|image|max:1024',
        ],[]);
        if($data->fails()){
            return response()->json(['errors'=>$data->errors()->toArray()]) ;
        }
        $Product=Products::create($request->all());

        if($request->hasFile('image')){
            $images=$this->saveImages($request->image);
            images::create([
                'product_id'=>$Product->id,
                'image'=> $images
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Product Created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        dd($product);

        $photos = explode(' | ',$product->images->image );
        $categories = Categories::all();  
        dd($product);

        return view('cpanel.product_detail',compact('product','categories','photos'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {

        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=  validator($request->all(),[
            'categories_id'=>'required',
            'name'=>'required|string',
            'price'=>'required|numeric|min:1|max:5000',
            'offer'=>'required|numeric|min:1|max:5000',
            'description'=>'required',
            'image.*'=>'image|nullable|max:1024',
        ],[]);
        if($data->fails()){
            return response()->json(['errors'=>$data->errors()->toArray()]) ;
        }
        Products::findorFail($id)->update($request->all());
        if($request->hasFile('image')){
            $images=$this->saveImages($request->image);
        }

        if(!empty($images)){
            $photos=images::where('product_id',$id)->first();
            if ($photos){
                $this->DeleteImages($photos->image);
            }
            $photos->update(['image'=>$images]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product Updated'
        ]);


    }
    protected function saveImages($images){
        $outPut=[];
        foreach($images as $key=> $image){
            $extension  = $image->getClientOriginalExtension();
            $fileNameStore= $key .'_'.time() .'.'.$extension;
            $outPut[]=  $fileNameStore;
            $ourImage= Image::make($image)
                ->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $ourImage->save(public_path("/img/products_image/".$fileNameStore),50);
        }

         return implode(' | ',$outPut);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Products::find($id);
        if ($product->images){

            $this->DeleteImages($product->images->image);
        }
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Deleted'
        ]);

    }

    public function getImages($images){
        $outPut=[];
        foreach(explode(' | ',$images ) as $k=> $photo){
            if (preg_match('/^main_[0-9]+/', $photo)){
                $outPut['main']=$photo;
            }else{
                $outPut[$k]=$photo;
            }
        }
        return $outPut;
    }
    protected function DeleteImages($images){
        foreach($this->getImages($images) as $k=> $image){
            $path =public_path("img/products_image/").$image;
            \File::delete($path);
        }
    }
}
