@extends('layouts.main', ['activePage' =>'rubros', 'titlePage' => 'Listado de Rubros de Empresa'])

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
                                Rubros de Empresa
                            </h4>
                            <p class="card-category">
                                Listado de Rubros
                            </p>
                        </div>
                        
                        <div class="card-body mt-1">
                            
                            @if(session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-right my-2">
                                    <a href="{{ route('rubros.registro') }}" class="btn btn-sm btn-primary">Nueva Rubro</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tablaRubros" class="table table-striped">
                                    <thead class="text-primary">
                                        <th class="text-center">
                                            Nombre de Rubro
                                        </th>
                                        <th class="text-center">
                                            Eliminar
                                        </th>
                                       
                                        
                                    </thead>

                                     <tbody>
                                        @foreach($rubros as $rubro)
                                        <tr>
                                            <td class="text-center">{{$rubro->nombre}}</td>
                                            
                                          
                                        <td class="td-actions text-center">
                                           <form action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type='submit' class="btn btn-danger">
                                                <span class="material-icons ">
                                                    delete
                                                </span> 
                                            </button>
                                            </form>
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
            $('#tablaRubros').DataTable({
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