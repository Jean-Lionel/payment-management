<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Section;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {

    $classes = Classe::latest()->paginate(20);

        // return $Classes;

    return view('classes.index', compact('classes'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = \Request::get('id');
        $section = Section::find($id);

        if(!$section){
            return $this->index();
        }
        return view('classes.create',compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'section_id' => 'required|numeric'

        ]);


        Classe::create($request->all());



        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $Classe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::find($id);
        return view('classes.view', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $Classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        return view('classes.edit', compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $Classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        //
        $request->validate([
            'name' => 'required'

        ]);
        $classe->update($request->all());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $Classe
     * @return \Illuminate\Http\Response
     */
    public function destroy( $value)
    {


     try {

        DB::beginTransaction();
        $classe = Classe::find($value);


        foreach ($classe->eleves as $eleve) {
            $eleve->delete();
        }


        $classe->delete();

        DB::commit();



    } catch (\Exception $e) {

        DB::rollback();
        Session::flash('error' , 'Erreur la suppression echoué');

    }


    return $this->index();
}
}
