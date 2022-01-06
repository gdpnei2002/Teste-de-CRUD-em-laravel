<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelDelivery;
use App\Models\User;
// use Illuminate\Database\Eloquent\Model;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery=ModelDelivery::all();
        return view('index',compact('delivery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=ModelDelivery::create([
            'entrega'=>$request->entrega,
            'id_user'=>$request->id_user,
            'horas'=>$request->horas,
            'description'=>$request->description,
            'saida'=>$request->saida
        ]);
        if($cad){
            return redirect('deliverys');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delivery=ModelDelivery::find($id);
        return view('show',compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery=ModelDelivery::find($id);
        $users=User::all();
        return view('create',compact('delivery','users'));
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
        ModelDelivery::where(['id'=>$id])->update([
            'entrega'=>$request->entrega,
            'id_user'=>$request->id_user,
            'horas'=>$request->horas,
            'description'=>$request->description,
            'saida'=>$request->saida
        ]);
        return redirect('deliverys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=ModelDelivery::destroy($id);
        return($del)?"sim":"não";
    }
}


