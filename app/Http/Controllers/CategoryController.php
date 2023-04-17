<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    function __Construct()
    {
        $this->middleware('permission:ver-category|crear-category|editar-category|borrar-category',['only'=>['index']]);
        $this->middleware('permission:crear-category',['only'=>['create','store']]);
        $this->middleware('permission:editar-category',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-category',['only'=>['edit','destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        return view('dashboard.category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:2'
        ]);

        //referencia al modelo POST
        $category = new Category();
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->save();
        return view("dashboard.category.message",['msg'=>"Publicacion Creada con Exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('dashboard.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:2'
        ]);
        //referencia al modelo POST
        $category=Category::find($id);
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->save();
        return view("dashboard.category.message",['msg'=>"Publicacion Modificada con Exito"]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect("dashboard/category");
    }
}
