<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = Categories::latest()->paginate(5);
        return view('cpanel.home',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $attribute=['catName'=> 'Categories'];

         $validator = Validator::make($request->all(), [
            'catName'=>'required|string'
         ],[],$attribute);
        if ($validator->fails()) {
        // return dd($validator);
            return redirect('/admin')->with('open' ,'add')
                        ->withErrors($validator)
                        ->withInput();
        }
        Categories::create($request->all());
        return redirect('/admin')->with('success' ,'Done Create Categories Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
          
        $attribute=['upCatName'=> 'Categories'];

         $validator = Validator::make($request->all(), [
            'upCatName'=>'required|string'
         ],[],$attribute);
        if ($validator->fails()) {
        // return dd($validator);
            return redirect('/admin')->with('open' ,'edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        Categories::find($id)->update(['catName'=>$request->upCatName]);
      
        return redirect('/admin')->with('success' ,'Done Update Categories Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::find($id)->delete();
        return redirect('/admin')
                        ->with('success','Category deleted successfully');
    }
}
