<?php

namespace App\Http\Controllers;
use App\Work;
use App\Step;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class StepController extends Controller
{
    protected $validation = [
        'name' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($work)
    {

        return view('steps.create', ['work' => $work]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $work)
    {
         
         // validazione
         $validation = $this->validation;

         $request->validate($validation);
 
         $data = $request->all();

         // slug nome piatto
         $data['slug'] = Str::slug($data['name'], '-');

         $data['work_id'] = $work;
 
         // upload file image
         if (isset($data['image'])) {
             $data['image'] = Storage::disk('public')->put('image', $data['image']);
         }
 
         // salvo il nuovo piatto a db
         $newStep = Step::create($data);
 
         // reinvio alla index
         return redirect()->route('works.show', ['work' => $work]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
