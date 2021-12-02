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
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-danger" role="success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger" role="error">
                                {{ session('error') }}
                            </div>
                        @endif


                            @if(session()->get('rol')==3)
                            <div class="row">
                                <div class="col-12 text-right my-2">
                                    <a href="{{ route('cotizaciones.registro') }}" class="btn btn-sm btn-primary">Nueva Solicitud de Cotización</a>
                                </div>
                            </div>
                            @endif

                            <div class="table-responsive mt-3">
                                <table table id="tablaCotizaciones" class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            @if(session()->get('rol')!=3)
                                            <th class="text-center col-md-1"><b>Empresa<b></th>
                                            @endif
                                            <th class="text-center col-md-1">Titulo</th>
                                            <th class="text-center col-md-1">Estado</th>
                                            <th class="text-center col-md-1">Responder</th>
                                            @if(session()->get('rol')!=3)
                                            <th class="text-center col-md-1">Modificar</th>
                                            @endif
                                            <th class="text-center col-md-1">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cotizaciones as $cotizacion)
                                        <tr>
                                            @if(session()->get('rol')!=3)
                                            <td class="text-center col-md-1">{{ $cotizacion->empresa }}</td>
                                            @endif
                                            <td class="text-center col-md-1">{{ $cotizacion->titulo }}</td>
                                            <td class="text-center col-md-1">{{ $cotizacion->estado }}</td>

                                            
                                            <td class="text-center col-md-1">
                                                <a href="{{ route('cotizaciones.responder', $cotizacion->id_cotizacion) }}" class="btn btn-sm btn-primary">Responder</a>
                                            </td>
                                            @if(session()->get('rol')!=3)
                                            <td class="text-center col-md-1 td-action">
                                                <a href="#" class="btn btn-sm btn-primary">Modificar</a>
                                            </td>
                                            @endif
                                            <td class="text-center col-md-1 td-action">
                                                <a href="#" class="btn btn-sm btn-danger"><span class="material-icons">
                                                    delete
                                                    </span</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
<script scr="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script scr="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/js/plugins/jquery.dataTables.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src=" https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#tablaUsuarios').DataTable({
    //         "language": {
    //             "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    //         },
    //         // "order": [[ 0, "desc" ]],
    //         // "responsive": true,
    //         //x-scroll
    //         // "scrollX": true,
    //         //  "columnDefs": [
    //         //      { responsivePriority: 1, targets: 0 },

    //         //  ]
    //     });
    // });

    //activar datatables para id #tablaCotizaciones
    $('#tablaCotizaciones').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "order": [[ 0, "desc" ]],
        "responsive": true,
        "scrollX": true,
        "columnDefs": [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 3, targets: 2 },
            { responsivePriority: 4, targets: 3 },
            { responsivePriority: 5, targets: 4 },
            { responsivePriority: 6, targets: 5 },

    ]
    });

</script>

@endsection
@endsection