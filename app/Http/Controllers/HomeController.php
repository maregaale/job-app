<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $works = Work::orderByRaw('FIELD(status, "created", "on_work", "completed")')->orderBy('created_at', 'DESC')->get();

        return view('dashboard', compact('works'));
    }

    public function status($id)
    {
        $works = Work::all();
        $myWork = $works->where('id', $id);
        // $myStatus = $work->status;
        

        return view('status', compact('myWork', 'works'));
    }

    public function statusUpdate(Request $request, Work $work, $id)
    {   
        $works = Work::all();
        $myWork = $works->where('id', $id);
        $work = [];

        foreach ($myWork as $key => $el) {
            $el->status = $request->status;
            $work = $el;
        }

        $work->save();
        
        return redirect()->route('dashboard');
    }
}
