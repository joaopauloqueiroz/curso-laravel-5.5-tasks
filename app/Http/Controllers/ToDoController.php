<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->session()->push('todotasks', $id);

        return redirect()->route('clients.index');
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = session('todotasks');

        $id = array_where($ids, function($value, $key) use ($id){
            return $value != $id;
        });
        session(['todotasks'=> $id]);

        return redirect()->route('clients.index');   
    }
}
