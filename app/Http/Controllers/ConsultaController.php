<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Jobs\EmailRespuestaJob;
use App\Consulta;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=Consulta::orderBy('estado','DESC')->orderBy('fecha','DESC')->get();
        //return dd($consulta);

        $trabajador=DB::table('consultas as c')
        ->join('unidades as u','c.idUnidad','=','u.idUnidad')->where('c.estado','1')->select('*')->get();
        return view('tablas.Consultas.index',compact('consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->correo);
        // DB::beginTransaction();
        // try{
        //     $consulta = new Consulta();
        //     $consulta->nombre=$request->nombre;
        //     $consulta->correo=$request->correo;
        //     $consulta->mensaje=$request->mensaje;
        //     $consulta->idUnidad=$request->idUnidad;
        //     $consulta->fecha=date('Y-m-d H:i:s');
        //     $consulta->estado='1';
        //     $consulta->save();
        //     DB::commit();
        //     return redirect()->route('contact.index')->with('datos', 'Registro Nuevo Guardado!!');
        // }catch(Exception $e){
        //     DB::rollback();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta=Consulta::findOrFail($id);
        return view('tablas.Consultas.message',compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $consulta = Consulta::findOrFail($id);
      return view('tablas.Consultas.response', compact('consulta'));
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
      $consulta = Consulta::findOrFail($id);
      $consulta->estado = 0;
      $consulta->save();

      $respuesta = $request->respuesta;
      config(['mail.mailers.smtp.username' => Auth::user()->usu_email]);
      config(['mail.mailers.smtp.password' => $request->password]);
      // dd(config('mail.mailers.smtp'));
      // return view('mails.RespuestaEnviada', compact('consulta'), compact('respuesta'));
      DB::beginTransaction();
      try{
        dispatch(new EmailRespuestaJob(Auth::user()->usu_email, $consulta->correo, $consulta->idConsulta, $consulta->mensaje, $request->respuesta));
        // $consulta->estado = 0;
        // $consulta->update();
        DB::commit();
        return redirect()->route('consulta.index')->with('datos','T');
      } catch(Exception $e){
        DB::rollback();
        return redirect()->route('consulta.index')->with('datos','C');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $consulta=Consulta::findOrFail($id);
            if($consulta->estado==1){
                $consulta->estado='0';
                $consulta->save();
                DB::commit();
                return redirect()->route('consulta.index')->with('datos','D');
            }else{
                $consulta->estado='1';
                $consulta->save();
                DB::commit();
                return redirect()->route('consulta.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }


    }
}
