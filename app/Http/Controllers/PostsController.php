<?php

namespace App\Http\Controllers;

use App\Post;
use App\Status;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //funcion para mostrar el index
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts',compact("posts"));
    }
    //funcion para mostrar las quejas
    public function queja()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('quejas',compact("posts"));
    }
    //funcion para mostrar las graficas
    public function grafica()
    {
      $valles = Post::select(DB::raw('count(*) as total'))->where('delegacion','=','valles')->where('fecha','>=','2018-01-01')->get();

      $matias = Post::select(DB::raw('count(*) as total'))->where('delegacion','=','matias')->where('fecha','>=','2018-01-01')->get();



        return view('grafica');
    }

      public function total(Request $request){
        $delegacion=$request->get('delegacion');
        $fecha=$request->get('fecha');

        $valles = Post::select(DB::raw('count(*) as total'))->where('delegacion','=',''.$delegacion.'')->where('fecha','>=',''.$fecha.'')->get();

        return $valles;
      }

    //funcion para mostrar filtro
    public function filtro()
    {

        return view('filtro');
    }

    public function mostrarMes()
    {
      $date = Carbon::now();
    }
    public function mostrarGlobal()
    {
      $global = Post::select(DB::raw('count(*) as total'))->get();
    return $global;
    }

    //funcion para mostrar quejas atendidas
    public function atendida()
    {
        $posts = Post::select('nombre_usuario','contenido','status')->where('status','atendida')->get();
        return $posts;
    }

    public function status()
    {
         $status = Status::all();
        return $status;
    }

     //funcion para mostrar quejas pendientes
    public function pendiente()
    {
        $posts = Post::select('nombre_usuario','contenido','status')->where('status','pendiente')->get();
        return $posts;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
           'nombre_usuario' => 'required',
            'contenido' => 'required',
            'fecha' => 'required',
            'empresa' => 'required',
            'mes' => 'required',
            'representante' => 'required',
            'delegacion' => 'required',
            'delegacion' => 'required',
        ]);
        //dd($request->all());
        Post::create($request->all());

        return redirect('quejas');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts');
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);

        return view('posts/editposts',compact('post'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
            'nombre_usuario' => 'required',
            'contenido' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $input = $request->all();
        $post->fill($input)->save();

        return redirect("quejas");
    }

}
