@extends('layouts.main', ['activePage' =>'listadoUsuarios', 'titlePage' => 'Listado de Clientes'])

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
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
                                Ususarios
                            </h4>
                            <p class="card-category">
                                Usuarios Registrados
                            </p>
                        </div>
                        <div class="card-body mt-1">
                            <div class="table-responsive">
                                <table id="tablaUsuarios" class="table">
                                    <thead class="text-primary">
                                        <th class="d-block d-sm-none">
                                            Empresa
                                        </th>
                                    
                                       
                                        <th>
                                            Correo Electronico
                                        </th>
                                        <th>
                                            Teléfono
                                        </th>
                                        <th>
                                            Ver
                                        </th>
                                        <th>
                                            Editar
                                        </th>
                                        <th>
                                            Eliminar
                                        </th>
                                    </thead>

                                     <tbody>
                                        @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>
                                                <div class="row-sm d-block d-sm-none">
                                                    <button class="btn btn-success">
                                                        <i class="material-icons">
                                                            add_circle
                                                        </i>
                                                    </button>
                                                 {{$usuario->empresa->nombre_empresa}}
                                                </div>
                                            </td>
                                            
                                            
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->telefono}}</td>
                                            <td> 
                                                <button class="btn btn-info">
                                                    <span class="material-icons ">
                                                        person_search
                                                        </span> 
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning">
                                                    <span class="material-icons ">
                                                        edit
                                                        </span> 
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger">
                                                    <span class="material-icons ">
                                                        delete
                                                        </span> 
                                                </button>
                                            </td>
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
            $('#tablaUsuarios').DataTable({
                responsive:true,
                autoWidth:false,
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
    </script>
@endsection