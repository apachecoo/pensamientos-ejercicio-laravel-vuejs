<?php

namespace pensamientosb\Http\Controllers;
use pensamientosb\Pensamiento;


use Illuminate\Http\Request;

class PensamientosController extends Controller
{

    public function __contruct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Pensamiento::where('user_id',auth()->id())->get();
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pensamientos = new Pensamiento();
        $pensamientos->descripcion = $request->descripcion;
        $pensamientos->user_id = auth()->id();
        $pensamientos->save();

        return $pensamientos;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pensamientos  = pensamiento::find($id);
        $pensamientos->descripcion=$request->descripcion;
        $pensamientos->save();
        return $pensamientos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarPensamiento  = pensamiento::find($id);
        $eliminarPensamiento->delete();
    }
}
