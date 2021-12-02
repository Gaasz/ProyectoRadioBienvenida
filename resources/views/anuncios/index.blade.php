@extends('layouts.main', ['activePage' =>'anuncios', 'titlePage' => 'Listado Anuncios'])

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
                                Anuncios
                            </h4>
                            <p class="card-category">
                                Listado de Anuncios
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

                          
                            

                            <div class="table-responsive mt-3">
                                <table table id="tablaUsuarios" class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th class="text-center col-sm-2 col-sm-2"><b>Empresa<b></th>
                                            <th class="text-center col-sm-1">Titulo</th>
                                            <th class="text-center col-sm-1">Estado</th>
                                            <th class="text-center col-sm-1">Ver</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anuncios as $anuncio)
                                            <tr>
                                                <td class="text-center">{{ $anuncio->nombre_empresa }}</td>
                                                <td class="text-center">{{ $anuncio->titulo }}</td>
                                                <td class="text-center">{{ $anuncio->estatus_anuncio_id }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-primary btn-sm">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
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
    $(document).ready(function() {
        $('#tablaUsuarios').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [[ 0, "desc" ]],
            "responsive": true,
            "columnDefs": [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ]
        });
    });
</script>

@endsection
@endsection