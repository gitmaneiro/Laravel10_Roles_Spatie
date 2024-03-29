<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    //function __construct(){
    //    $this->middleware('permission:ver-blog|crear-blog|editar-blog|borrar-blog', ['only'=>['index']]);
    //    $this->middleware('permission:crear-blog',['only'=>['create', 'store']]);
    //    $this->middleware('permission:editar-blog',['only'=>['edit', 'update']]);
    //    $this->middleware('permission:borrar-blog',['only'=>['destroy']]);   
   // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blogs.index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo'=>'required',
            'contenido'=>'required'
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {
        return view('blogs.editar', ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog)
    {
        request()->validate([
            'titulo'=>'required',
            'contenido'=>'required'
        ]);

        $blog->update($request->all());

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        //
    }
}
