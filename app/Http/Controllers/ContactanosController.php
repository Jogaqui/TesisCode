<?php

namespace App\Http\Controllers;
use App\Contactanos;
use Illuminate\Http\Request;

class ContactanosController extends Controller
{
    public function index()
    {
        $contactanos = Contactanos::get();
        return view('tablas.contactanos.index', compact('contactanos'));
    }

    public function create()
    {
        return view('tablas.contactanos.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'telefono'=>'required|max:10'
        ],
        [
            'telefono.required'=>'Ingrese telefono',
        ]);
        $contactanos = new Contactanos();
        $contactanos->correo=$request->correo;
        $contactanos->telefono=$request->telefono;
        $contactanos->direccion=$request->direccion;
        $contactanos->estado='1';
        $contactanos->save();
        return redirect()->route('contactanos.index')->with('datos', 'G');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contactanos=Contactanos::findOrFail($id);
        return view('tablas.contactanos.edit',compact('contactanos'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'telefono'=>'required|max:10'
        ],
        [
            'telefono.required'=>'Ingrese telefono',
        ]);
        $contactanos = Contactanos::findOrFail($id);
        $contactanos->correo=$request->correo;
        $contactanos->telefono=$request->telefono;
        $contactanos->direccion=$request->direccion;
        $contactanos->estado='1';
        $contactanos->save();
        return redirect()->route('contactanos.index')->with('datos', 'T');
    }

    public function destroy($id)
    {
        $contactanos=Contactanos::findOrFail($id);
        if ($contactanos->estado==1) {
            $contactanos->estado='0';
            $contactanos->save();
            return redirect()->route('contactanos.index')->with('datos','D');
        }else {
            $contactanos->estado='1';
            $contactanos->save();
            return redirect()->route('contactanos.index')->with('datos','A');
        }  
    }
}
