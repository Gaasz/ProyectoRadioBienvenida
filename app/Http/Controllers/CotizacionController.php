<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use Illuminate\Support\Facades\Validator;
use App\Models\Empresa;
use App\Models\Cotizacion;
use App\Models\RespuestaCotizacion;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateCotizacion;
use App\Mail\CotizacionEtapa1Respuesta;
use App\Mail\CotizacionEtapa2Respuesta;
use Illuminate\Support\Facades\File;


class CotizacionController extends Controller
{
        //funcion para mostrar la vista index de cotizaciones que contiene un listado en forma de tabla de estas mismas
    public function index()
    {   

        //if para saber si el usuario es tipo cliente o trabajador/admin
        if(session()->get('rol')==1 || session()->get('rol')==2){

            $cotizaciones = Cotizacion::
            join('empresas', 'empresas.id_empresa', '=', 'cotizaciones.empresa_id')
            ->join('estatus_cotizacion' , 'estatus_cotizacion.id_estatus', '=', 'cotizaciones.estatus_id')
            ->select('cotizaciones.*', 'empresas.nombre_empresa as empresa', 'estatus_cotizacion.nombre as nombre' , 'estatus_cotizacion.id_estatus as estado')
            ->orderBy('cotizaciones.updated_at')->get();
        

        return view('cotizaciones.index', compact('cotizaciones')); 

        }else{
            $cotizaciones = Cotizacion::
            join('empresas', 'empresas.id_empresa', '=', 'cotizaciones.empresa_id')
            ->join('estatus_cotizacion' , 'estatus_cotizacion.id_estatus', '=', 'cotizaciones.estatus_id')
            ->select('cotizaciones.*', 'empresas.nombre_empresa as empresa', 'estatus_cotizacion.nombre as nombre' , 'estatus_cotizacion.id_estatus as estado')
            ->where('cotizaciones.empresa_id', '=', session('id_empresa'))
            ->orderBy('cotizaciones.updated_at')->get();


            return view('cotizaciones.index', compact('cotizaciones')); 
        }
    }

    //funcion para mostrar la vista create.etapa1 de cotizaciones 
    public function create()
    {   
       
        $oferta = Oferta::first();
        $oferta = number_format($oferta->valor, 0, ',', '.');
        return view('cotizaciones.create.etapa1', compact('oferta'));
    }

    //funcion para mostrar las vistas relaciondas a las siguientes etapas de la creación de una cotización

    public function create2($id)
    {
        //se pasa un $id a la funcion y en base a ese $id se busca la cotizacion en la base de datos y se pasa a la vista, además de saber a que vista se redirecciona en base a la etapa en la que se encuentra la cotización

        $cotizacion = Cotizacion::findOrFail($id);
        $estatus = $cotizacion->estatus_id;

        switch ($estatus) {
            case '1':

                    //esta vista no es accesible para rol cliente, se redirecciona a la vista de home
                    if(session()->get('rol')==3){
                        return redirect()->route('home');
                    }else{
                        //saber si es una cotizacion nueva o es una cotizacion que estaba en etapa 3 y se decicio por parte del cleinte renegociar y volver a etapa 1
                        if($cotizacion->descripcion!=null){
                            $empresa = Empresa::findOrFail($cotizacion->empresa_id);
                            $oferta = Oferta::first();
                            
                            $horarios = explode(',', $cotizacion->horarios);
                           
                            $valor = number_format($cotizacion->valor, 0, ',', '.');
                            $oferta = number_format($oferta->valor, 0, ',', '.');
                           
                            $horarios = array_filter($horarios);
                       
                            $horarios = implode(', ', $horarios);
                        
                            $horarios = explode(',', $horarios);

                            //sacar la cantidad de dias de diferencia entre request fecha.1 y fecha.0
                            $fecha1 = new \DateTime($cotizacion->fecha_inicio);
                            $fecha2 = new \DateTime($cotizacion->fecha_fin);
                            $diferencia = $fecha1->diff($fecha2);
                            
                                                  
                            //calcular el valor total de la cotizacion
                            $total = $cotizacion->valor * $cotizacion->cantidad * $diferencia->days;
                            $total = number_format($total, 0, ',', '.');

                            //saber cuantos horarios se deben imprimir en la vista create.etapa2
                            $contador=0;
                            for($i=0; $i<count($horarios); $i++){
                                    if($horarios[$i]!=""){
                                        $contador++;
                                    }else{
                                        
                                    }
                                
                            }
                            if($contador==0){
                                return view('cotizaciones.create.etapa2', compact('oferta','total', 'valor' ,'empresa', 'cotizacion','contador'));
                            }
                            else{
                                return view('cotizaciones.create.etapa2', compact('oferta','total', 'valor' ,'empresa', 'cotizacion','contador','horarios'));
                            }
                        }else{
    
                            $oferta = Oferta::first();
                            $oferta = number_format($oferta->valor, 0, ',', '.');
                            return view('cotizaciones.create.etapa1', compact('oferta', 'cotizacion'));
                        }
                    }
                break;
            case '2':
                
                //esta vista es solo accesible para rol cliente, de lo contrario se redirecciona al home
                if(session()->get('rol')!=3){
                    return redirect()->route('home');
                }else{
                    $cotizacion = Cotizacion::findOrFail($id);
               
                //buscar cotizacionRespuesta que tenga cotizacion_id como $cotizacion->id_cotizacion
                $respuesta = RespuestaCotizacion::where('cotizacion_id', $cotizacion->id_cotizacion)->first();
                return view('cotizaciones.create.etapa3', compact('cotizacion', 'respuesta'));
                }
                break;

            case '3':

                //esta vista inaccesible para rol cliente, de ser asi se redirecciona al home
                if(session()->get('rol')==3){
                    return redirect()->route('home');
                }else{

                    //se busca la cotizacion, empresa y respuesta de la cotizacion en la base de datos y se pasa a la vista
                    $cotizacion = Cotizacion::findOrFail($id);
                    $empresa = Empresa::findOrFail($cotizacion->empresa_id);
                    $respuesta = RespuestaCotizacion::where('cotizacion_id', $cotizacion->id_cotizacion)->first();
                    $horarios = $cotizacion->horarios;
                    $horarios = explode(',', $horarios);
                    $horarios = array_filter($horarios);
                    $horarios = implode(', ', $horarios);
                    $horarios = explode(',', $horarios);
                    $contador=0;
                    for($i=0; $i<count($horarios); $i++){
                        if($horarios[$i]!=""){
                            $contador++;
                        }else{
                            
                        }
                    
                    }

                    
                    return view('cotizaciones.create.etapa4', compact('cotizacion', 'empresa', 'respuesta'));
                    
                }
                break;

            case '4':
                return view('cotizaciones.create.etapa5', compact('cotizacion'));
                break;
            case '5':
                return view('cotizaciones.create.etapa6', compact('cotizacion'));
                break;
            case '6':
                return view('cotizaciones.create.etapa7', compact('cotizacion'));
                break;
            case '7':
                return view('cotizaciones.create.etapa8', compact('cotizacion'));
                break;
            case '8':
                return view('cotizaciones.create.etapa9', compact('cotizacion'));
                break;
            case '9':
                return view('cotizaciones.create.etapa10', compact('cotizacion'));
                break;
            case '10':
                return view('cotizaciones.create.etapa11', compact('cotizacion'));
                break;
            default:
                return'hola';
                break;
    }
}

    //funcion para guardar una cotizacion en la base de datos
    public function store(Request $request)
    {
       

     
        //usuario a admin/trabajador
       
        if($request->tipoHorario == 2){
            $request->validate([
                'titulo' => 'required|string|max:100',
                'descripcion' => 'required|string|max:500',
                'cantidad' => 'required|integer|min:1|max:48',
                'fecha' => 'required|array|min:2',
                'fecha.*' => 'string|distinct',
                'precio' => 'required'

            ],
            [
                'fecha.*.string' => 'La fecha no puede ser nula',
                'fecha.*.distinct' => 'La fechas no puede ser iguales',
            ]
        );
        }else if($request->tipoHorario == 1){
            $indices = $request->horario;
            $cantidad = [];


            $validacion = Validator::make($request->all(), [
                'titulo' => 'required|string|max:100',
                'descripcion' => 'required|string|max:500',
                'cantidad' => 'required|integer|min:1|max:48',
                'horario' => 'required|array|min:1',
                'horario.*' => 'string|distinct|nullable',
                'fecha' => 'required|array|min:2',
                'fecha.*' => 'string|distinct',
                'precio' => 'required',

            ],
            [
                'fecha.*.string' => 'La fecha no puede ser nula',
                'fecha.*.distinct' => 'La fechas no puede ser iguales',
            ]);

            if ($validacion->fails()) {

                return redirect()->back()->withErrors($validacion)->withInput()->with('solicitado','ok')->with('indices',$indices)->with('cantidad',$cantidad);
            }
    }else{
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:500',
            'cantidad' => 'required|integer|min:1|max:48',
            'fecha' => 'required|array|min:2',
            'fecha.*' => 'string|distinct',
            'tipoHorario' => 'required',
            'precio' => 'required'

        ],
        [
            'fecha.*.string' => 'La fecha no puede ser nula',
            'fecha.*.distinct' => 'La fechas no puede ser iguales',
        ]);
    }

    for($i=0;$i<48;$i++){
        $horarios[$i] = $request->horario[$i];
        if($horarios[$i]==NULL){
            //eliminar esa posicion del array
            unset($horarios[$i]);
        }
    }

    
    $horario = implode(',', $horarios);
    
    if($request->id){
        $cotizacion = Cotizacion::findOrFail($request->id);
        $cotizacion->id_cotizacion = $request->id;
    }else{
        $cotizacion = new Cotizacion;
        $cotizacion->id_cotizacion = date('mdYhis', time());
    }

    $cotizacion->titulo = $request->titulo;
    $cotizacion->descripcion = $request->descripcion;
    $cotizacion->cantidad = $request->cantidad;
    $cotizacion->fecha_inicio = $request->fecha[0];
    $cotizacion->fecha_fin = $request->fecha[1];
    $cotizacion->horarios = $horario;
    $cotizacion->valor = Oferta::first()->valor;
    $cotizacion->estatus_id = 1;
    $cotizacion->empresa_id = session()->get('id_empresa');
    // return $cotizacion;
    

  
    $adminOTrabajadores = User::where('rol_id','1')->orWhere('rol_id','2')->get();
    $empresa = Empresa::findOrFail(session('id_empresa'));
    $empresa = $empresa->nombre_empresa;
    
    foreach ($adminOTrabajadores as $adminOTrabajador) {
        //enviar mail CreateCotizacion
        Mail::to($adminOTrabajador)->send(
            new CreateCotizacion(
                $usuario = $adminOTrabajador,
                $empresa = $empresa,
                $url = url('/cotizaciones/responder/'.$cotizacion->id_cotizacion),
                $cotizacion = $cotizacion
            
            )
        );
        
    }
    
    $cotizacion->save();

    return redirect()->route('cotizaciones.listado')->with('success','La Solicitud de Cotizacion se ha ingresado Correctamente');
    }

    public function store2(Request $request)
    {
        $cotizacion = Cotizacion::findOrFail($request->id);

        $estatus = $cotizacion->estatus_id;
        
        switch ($estatus) {
            case '1':
                
                //admin/trabajador a cliente
               

                $request->validate([
                    'descripcion' => 'required|string|max:500',
                    'cantidad' => 'required|integer|min:1',
                    'fecha_inicio' => 'required|string',
                    'fecha_fin' => 'required|string',     
                    'valor' => 'required',               
                ]);
                
                $id= $request->id;

                //restar input fecha_fin - fecha_inicio
                $fecha1 = new \DateTime($request->fecha_inicio);
                $fecha2 = new \DateTime($request->fecha_fin);
                $diferencia = $fecha1->diff($fecha2);


                $respuesta = new RespuestaCotizacion;
                $respuesta->descripcion = $request->descripcion;
                $respuesta->id_respuesta_cotizacion = date('mdYhis', time());

                
                $respuesta->cantidad = $request->cantidad;
                $respuesta->frases_extras = $request->extra;
                $respuesta->fecha_inicio = $request->fecha_inicio;
                $respuesta->fecha_fin = $request->fecha_fin;
                $respuesta->valor = $request->valor;
                $precio = $request->precio;
                //eliminar el signo dolar de $precio
                $precio = str_replace('$', '', $precio);
                $respuesta->precio = $precio;
                $respuesta->frases_extras = $request->extra;
                
                

                $cotizacion = Cotizacion::findOrFail($request->id);
                $cotizacion->estatus_id = 2;
                $respuesta->cotizacion_id = $cotizacion->id_cotizacion;
               

                $empresa = Empresa::where('id_empresa',$cotizacion->empresa_id)->get();
                $usuario = User::where('empresa_id',$cotizacion->empresa_id)->first();
                


                
                
               
               
                
                Mail::to($usuario)->send(
                    new CotizacionEtapa1Respuesta(
                       
                        $cotizacion = $cotizacion,
                        $usuario = $usuario,
                        $empresa = $empresa,
                        $url = url('/cotizaciones/responder/'.$id),
                        
                    )
                );
                
                $respuesta->save();
                $cotizacion->save();
                
                return redirect()->route('cotizaciones.listado')->with('success','La Solicitud de Cotizacion se ha respondido Correctamente');
                
                break;
            case '2':

                // $request->validate([
                //    'seleccioneOpción' => 'required'
                   
                // ]);
                
                //custom validation for seleccioneOpción with custom message
                request()->validate([
                    'seleccioneOpción' => 'required',
                    
                ],
                [
                    'seleccioneOpción.required' => 'Tiene que seleccionar una opción',
                ]);

               
                
                $cotizacion = Cotizacion::findOrFail($request->id);
                If($request->seleccioneOpción == '1'){
                    $validacion = Validator::make($request->all(), [
                    'archivo' => 'required|mimes:pdf|max:1024'    
                    ]);
                   

                    $empresa = Empresa::findOrFail($cotizacion->empresa_id);
                    $cotizacion->archivo = $request->archivo->storeAs('ordenesCompra', $cotizacion->id_cotizacion.'.pdf', 'public');
                    $cotizacion->estatus_id = 3;

                    $adminOTrabajadores = User::where('rol_id','1')->orWhere('rol_id','2')->get();
                    $empresa = $empresa->nombre_empresa;

                    foreach ($adminOTrabajadores as $adminOTrabajador) {
                        //enviar mail CreateCotizacion
                        Mail::to($adminOTrabajador)->send(
                            new CotizacionEtapa2Respuesta(
                                $usuario = $adminOTrabajador,
                                $empresa = $empresa,
                                $url = url('/cotizaciones/responder/'.$cotizacion->id_cotizacion),
                                $cotizacion = $cotizacion
                            
                            )
                        );
                        
                    }

                    $cotizacion->save();
                    
                    return redirect()->route('cotizaciones.listado')->with('success','Se ha subido la Orden de Compra Correctamente');
                }else{
                    $cotizacion->estatus_id = 1;
                    $cotizacion->descripcion = null;
                    $cotizacion->cantidad = null;
                    $cotizacion->fecha_inicio = null;
                    $cotizacion->fecha_fin = null;
                    $cotizacion->horarios = null;
                    $cotizacion->valor = null;
                    $respuesta = RespuestaCotizacion::where('cotizacion_id',$request->id)->delete();
                    $cotizacion->save();
                    // return $this->index();
                }
                break;
            case '3':
                
                
                    
                

                 $request->validate([
                     'seleccioneOpción' => 'required'
                    
                 ],
                 [
                     'seleccioneOpción.required' => 'Tiene que seleccionar una opción',
                 ]);

              
                if($request->seleccioneOpción == '1'){
                  
                            $validacion = Validator::make($request->all(), [
                            'hora' => 'required',
                            'hora.*' => 'string|distinct',    
                        ],
                        [
                            'hora.*.distinct' => 'El horario seleccionado ya existe',
                            'hora.*.string' => 'El horario seleccionado no es un horario valido',
                        ]);

                        if ($validacion->fails()) {

                            return redirect()->back()->withErrors($validacion)->withInput()->with('aceptar','ok');
                        }

                        $respuesta = RespuestaCotizacion::where('cotizacion_id', $cotizacion->id_cotizacion)->first();
                        $respuesta->horarios = $request->hora;
                        $cotizacion->estatus_id = 4;
                        $respuesta->save();

                        return redirect()->route('cotizaciones.listado')->with('success','Se ha Aceptado Correctamente la Orden de Compra');

                }else{
                    
                    $file = public_path('storage/'.$cotizacion->archivo);

                    if(file_exists($file)){
                        unlink($file);
                    }
                    $cotizacion->archivo = null;
                    $cotizacion->estatus_id = 2;
                    $cotizacion->save();
                    return redirect()->route('cotizaciones.listado')->with('error','Se ha Rechazado Correctamente la Orden de Compra');

                }
                
               
                break;
            case '4':
              
                break;
            case '5':
              
                break;
            case '6':
               
                break;
            case '7':
               
                
                break;
            case '8':
                
                break;
            case '9':
               
            case '10':
               
                break;
            default:
                return'hola';
                break;

        
    }
}





    public function etapa2(Request $request){

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
