<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('register');
    }
    public function dashboard(){
        $todos = Todo::all();
        return view('dashboard', compact('todos'));
    }

    public function index()
    {
        return view('login');
    }
    public function registerAccount(Request $request){
        $request->validate([
            'email'=>'required|email:dns|max:225',
            'password'=> 'required|min:4',
            // 'username'=> 'required'
        ]);
        user::create([
            // 'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'Berhasil membuat akun!');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'email belum tersedia',
            'email.required' => 'email harus tersedia',
            'password.required' => 'password harus tersedia',
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect('/todo/');
        }
        else {
            return redirect()->back()->with('eror', 'gagal login, silahkan cek dan coba lagi');
        }

    }
    public function LoginAccount(Request $request){
        $request->validate([
            'email'=>'required|email:dns|max:225',
            'password'=> 'required|min:4',
            // 'username'=> 'required'
        ]);
        user::create([
            // 'username'=>$request->username,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'berhasil');

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('todo.index');
        }
        else {
            return redirect()->back()->with('eror', 'gagal login, silahkan cek dan coba lagi');
        }

    }
    public function home()
    {
        //ambil data dari table todos dengan model todo
        //all () fungsinya untuk mengambil semua data di table
        $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
        return view('dashboard', compact ('todos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function complated()
    {
        return view('dashboard.complated');
    }
    public function updateComplated($id)
    {
        Todo::where('id', '=', $id)->update([
            'status'=>1,
            'done_time'=> \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Todo telah selesai dikerjakan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',  
        ]);
        //mengirim data ke databse table todos dengan model Todo
        //''nama column di table db
        //$request-> -value atribute name pada input
        //kenapa yang dikirim S data? Karena table pada db todos membutuhkan  Column input
        //salah satunya column 'done_time' yang tipenya nullable, karena nullable jadi gaperlu dikirim nilai
        //
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/todo')->with('succesAdd','Berhasil menambahkan data Todo');
    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();
        return view('dashboard.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);
         Todo::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'status' => 0,
         ]);

         return redirect('/todo/')->with('successUpdate', 'Data todo berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::where('id', '=', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data ToDo!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
