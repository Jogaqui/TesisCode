<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Tipo_usuario;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        // $curso=DB::table('secciones as s')->join('grados as g','g.idGrado','=','s.idGrado')
        // ->join('curso_grado as cg','g.idGrado','=','cg.idGrado')
        // ->join('cursos as c','c.idCurso','=','cg.idCurso')
        //  ->where('s.idSeccion','=',$id)
        // ->select('*')->get();

        /*$trabajador=DB::table('trabajadores as t')
        ->join('unidades as u','t.idUnidad','=','u.idUnidad')->where('t.estado','1')->select('*')->get();*/
        $usuarios=Usuario::where('usu_estado','1')->get();
        foreach ($usuarios as $key => $usuario) {
            $rol_temporal = Tipo_usuario::select('rol')->where('idTipo_usuario', $usuario->usu_rol)->first();
            $usuario->rol = $rol_temporal->rol;
        }
        //dd($usuarios);
        return view('tablas.Usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $tipos_usuario=Tipo_usuario::where('estado','=','1')->get();
        $n_usuarios = Usuario::count();
        $letra_user = 'a';
        $plus = 0;
        $isLoginNew = false;
        $usu_login_temp = "0000";

        do{
            $correlativo_plus = $n_usuarios+$plus;

            if($correlativo_plus<10){ $correlativo_plus = '000'.$correlativo_plus;}
            else if($correlativo_plus<100){ $correlativo_plus = '00'.$correlativo_plus;}
            else if($correlativo_plus<1000){ $correlativo_plus = '000'.$correlativo_plus;}

            $usu_login_temp = $letra_user.$correlativo_plus;
            $result_login_temp = Usuario::where('usu_login', $usu_login_temp);

            if($result_login_temp->count() == 0){
                $isLoginNew = true;
            }
            else{
                $plus++;
            }
        }while(!$isLoginNew);

        // dd($unidad);
        return view('tablas.Usuarios.create',compact('tipos_usuario','usu_login_temp'));
    }

    public function store(Request $request)
    {
        // dd($request->imagen);
        $data = request()->validate([
            'dni'=>'unique:trabajadores',
            'correo'=>'unique:trabajadores',
            'password' => 'required|string|min:8|confirmed'
        ]);

        DB::beginTransaction();
        try{
            $usuario = new Usuario();

            $usuario->usu_apepaterno=strtoupper($request->apPaterno);
            $usuario->usu_apematerno=strtoupper($request->apMaterno);
            $usuario->usu_nombres=strtoupper($request->nombres);
            $usuario->usu_nombreCompleto = $usuario->usu_nombres.' '.$usuario->usu_apepaterno.' '.$usuario->usu_apematerno;

            $usuario->usu_email = $request->correo;
            $usuario->usu_dni = $request->dni;
            $usuario->usu_rol = $request->rol;
            $usuario->trab_puesto = $request->puesto;
            $usuario->created_at = Carbon::now();

            //CREDENCIALES CREADAS
            $usuario->usu_login = $request->usu_login;
            $usuario->password = Hash::make($request->input('password'));
            $usuario->usu_estado='1';

            $usuario->save();
            DB::commit();
            return redirect()->route('usuario.index')->with('datos', 'G');
        }catch(Exception $e){
            DB::rollback();
            return dd($e);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $usuario=Usuario::findOrFail($id);
        $tipos_usuario=Tipo_usuario::where('estado','=','1')->get();
        $tipo_usuario = Tipo_usuario::where('idTipo_usuario',$usuario->usu_rol)->first();

        return view('tablas.Usuarios.edit',compact('tipo_usuario','usuario','tipos_usuario'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->imagen);
        $data = request()->validate([
            'password' => 'string|min:8|confirmed'
        ]);

        DB::beginTransaction();
        try{
            $usuario=Usuario::findOrFail($id);

            $usuario->usu_apepaterno=strtoupper($request->apPaterno);
            $usuario->usu_apematerno=strtoupper($request->apMaterno);
            $usuario->usu_nombres=strtoupper($request->nombres);
            $usuario->usu_nombreCompleto = $usuario->usu_nombres.' '.$usuario->usu_apepaterno.' '.$usuario->usu_apematerno;

            $usuario->usu_email = $request->correo;
            $usuario->usu_dni = $request->dni;
            $usuario->usu_rol = $request->rol;
            $usuario->trab_puesto = $request->puesto;
            $usuario->updated_at = Carbon::now();

            //CREDENCIALES CREADAS
            $usuario->usu_login = $request->usu_login;

            if(!empty($request->password)){
                $usuario->password = Hash::make($request->input('password'));
            }

            $usuario->usu_estado='1';

            $usuario->save();
            DB::commit();
            return redirect()->route('usuario.index')->with('datos', 'T');
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $usuario=Usuario::findOrFail($id);
            $usuario->estado='0';
            $usuario->save();
            DB::commit();
            return redirect()->route('usuario.index')->with('datos','E');
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
