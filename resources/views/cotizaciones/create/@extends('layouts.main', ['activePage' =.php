@extends('layouts.main', ['activePage' =>'cotizaciones', 'titlePage' => 'Listado Cotizaciones'])

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-10 mx-auto">
                <div class="row">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">
                                Cotizaciones
                            </h4>
                            <p class="card-category">
                                Listado de Cotizaciones
                            </p>
                        </div>
                        <div class="card-body mt-1">
                            @if(session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif

                          
                            @if(session()->get('rol')==3)
                            <div class="row">
                                <div class="col-12 text-right my-2">
                                    <a href="{{ route('cotizaciones.registro') }}" class="btn btn-sm btn-primary">Nueva Oferta</a>
                                </div>
                            </div>
                            @endif
                            <div class="table-responsive mt-3 table-striped">
                                <table id="tablaUsuarios" class="table">
                                    <thead class="text-primary">
                                        <th hidden></th>
                                        <th class="text-center col-sm-2">
                                            Titulo
                                        </th>
                                        @if(session()->get('rol')!=3)
                                        <th class="text-center col-sm-2">
                                            Empresa
                                        </th>   
                                        @endif
                                        {{-- <th class="text-center col-sm-2">
                                            Cantidad
                                        </th>
                                        <th class="text-center col-sm-2">
                                            Valor Unitario
                                        </th> --}}
                                        <th class="text-center col-sm-1">
                                            Precio Total
                                        </th>
                                        
                                        <th class="text-center col-sm-1">
                                            Estado
                                        </th>
                                        <th class="text-center col-sm-1">
                                            Ver
                                        </th>
                                        @if (session()->get('rol')==1)
                                            <th class="text-center col-sm-1">
                                                Editar
                                            </th>
                                            <th class="text-center col-sm-1">
                                                Eliminar
                                            </th>
                                        @endif
                                        
                                    </thead>

                                     <tbody>
                                        @foreach($cotizaciones as $cotizacion)
                                        <tr>
                                            <td hidden>{{$cotizacion->updated_at}}</td>
                                            <td class="text-center">{{$cotizacion->titulo}}</td>
                                            @if(session()->get('rol')!=3)
                                            <td class="text-center">{{$cotizacion->empresa}}</td>
                                            @endif
                                            {{-- <td class="text-center">{{$cotizacion->cantidad}}</td>
                                            {{-- <td class="text-center">{{$cotizacion->cantidad}}</td>
                                            <td class="text-center">$ {{$cotizacion->valor}}</td> --}}
                                            <td class="text-center">$ {{$cotizacion->valor * $cotizacion->cantidad}}</td>
                                            <td class="text-center">{{$cotizacion->nombre}}</td>
                                            <td class="td-actions text-center"> 
                                                
                                                    @if (session()->get('rol')==3)

                                                        @if($cotizacion->estado%2==0)
                                                            <a href="{{route('cotizaciones.responder',$cotizacion->id_cotizacion)}}" class="btn btn-info">
                                                                <span class="material-icons ">
                                                                    person_search
                                                                    </span> 
                                                            </a>
                                                        @else
                                                            Espere Respuesta
                                                        @endif
                                                        
                                                    @endif

                                                    @if (session()->get('rol')!=3)

                                                        @if($cotizacion->estado%2!=0)
                                                            <a href="{{route('cotizaciones.responder',$cotizacion->id_cotizacion)}}" class="btn btn-info">
                                                                <span class="material-icons ">
                                                                    person_search
                                                                    </span> 
                                                            </a>
                                                        @else
                                                            Espere Respuesta
                                                        @endif
                                                        
                                                    @endif
                                            </td>
                                            @if (session()->get('rol')==1)
                                                <td class="td-actions text-center"> 
                                                    <button class="btn btn-warning">
                                                        <span class="material-icons ">
                                                            edit
                                                            </span> 
                                                    </button>
                                                </td>
                                                
                                            @endif
                                            @if (session()->get('rol')==1)
                                                <td class="td-actions text-center">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type='submit' class="btn btn-danger">
                                                            <span class="material-icons ">
                                                                delete
                                                            </span> 
                                                        </button>
                                                        </form>
                                                
                                            </td>
                                                
                                            @endif
                                           

                                        </tr>
                                        @endforeach
                                     </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="card-footer mr-auto">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script scr="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script scr="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/js/plugins/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src=" https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
             $(document).ready(function() {
                 $('#tablaUsuarios').DataTable({
                 //ordernar por columna 0
                 "order": [[ 0, "desc" ]],
                 responsive:true,
                 autoWidth:false,
                 scrollX: true,
                 "language": {
                     "lengthMenu": "Mostrar " + '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">Todo</option></select>'+ " registros por página",
                     "zeroRecords": "No hay usuarios encontrados, lo siento",
                     "info": "Mostrando _PAGE_ de _PAGES_ páginas",
                     "infoEmpty": "No hay usuarios",
                     "infoFiltered": "(Filtrando de _MAX_ registros totales)",
                     "search": "Buscar",
                     "paginate":{
                         "previous": "Anterior",
                         "next": "Siguiente",
                     }
                 }
             });
             });


            
            
    </script>
@endsection