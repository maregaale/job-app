<?php

namespace App\Http\Controllers;
use App\Work;
use App\Step;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    protected $validation = [
        'name' => 'required|string',
        'type' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $validation = $this->validation;

        $request->validate($validation);

        $data = $request->all();

        // slug nome piatto
        $data['slug'] = Str::slug($data['name'], '-');

        // upload file image
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('image', $data['image']);
        }

        // salvo il nuovo piatto a db
        $newWork = Work::create($data);

        // reinvio alla index
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        $steps = Step::all();
        return view('works.show', ['work' => $work, 'steps' => $steps]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('works.edit', ['work' => $work]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        // validazione
        $validation = $this->validation;

        $request->validate($validation);

        $data = $request->all();

        // slug nome piatto
        $data['slug'] = Str::slug($data['name'], '-');

        // upload file image
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('image', $data['image']);
        }

        // salvo il nuovo piatto a db
        $work->update($data);

        // reinvio alla index
        return redirect()->route('dashboard');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();

        // DB::statement("ALTER TABLE works AUTO_INCREMENT = 1");

        // reinvio alla index
        return redirect()->route('dashboard');
    }
}
