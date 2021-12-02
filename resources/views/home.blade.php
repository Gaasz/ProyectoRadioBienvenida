@php
switch (session()->get('rol')) {
    case '1':
        $titlePage = 'Panel de Inicio de Administrador';
        break;
    case '2':
        $titlePage = 'Panel de Inicio de Trabajador Radial';
    break;
    case '3':
        $titlePage = 'Panel de Inicio de Cliente';
        break;
    default:
        $titlePage = 'Panel de Inicio de Usuario';
        break;}
@endphp

@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => $titlePage])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">
                    campaign
                    </i>              
                </div>
              <p class="card-category">Total Cotizaciones</p>
              <h3 class="card-title">{{$cotizaciones}}
              </h3>
            </div>
            <div class="card-footer">
              @if (session()->get('rol') !=3)
              <div class="stats">
<<<<<<< HEAD
                <a href="{{route('cotizaciones.listado')}}">Revisar Detalle</a>
              </div>
              @else
              <div class="stats">
                <a href="{{route('cotizaciones.listado')}}">Revisar mis Cotizaciones</a>
=======
                <a href="{{route('cotizaciones.listado')}}">Revisar detalle</a>
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">keyboard_voice</i>
              </div>
              <p class="card-category">Total Auspicios</p>
              <h3 class="card-title">10</h3>
            </div>
            <div class="card-footer">
              @if(session()->get('rol') !=3)
              <div class="stats">
                <a href="#pablo">Revisar detalle</a>
              </div>
              @else
              <div class="stats">
                <a href="#pablo">Revisar mis Auspicios</a>
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">monetization_on</i>
              </div>
              <p class="card-category">Precio Actual del Anuncio</p>
              <h3 class="card-title"><small>$</small>{{$ofertaPrecio}}</h3>
            </div>
           @if (session()->get('rol')!=3)
           <div class="card-footer">
            <div class="stats">
              <a href="{{route('ofertas.registro')}}">Crear Ofertas</a>
              </div>
            </div>
            @else
            <div class="card-footer">
              <div class="stats">
                <a href="{{route('ofertas.listado')}}">Revisar detalle</a>
              </div>
            </div>
           @endif
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">
                  savings
                </i>
              </div>
              <p class="card-category">Oferta Vigentes</p>
              <h4 class="card-title">
                @if($oferta->id == 1)
                No Hay Ofertas Activas
                @endif
                @if($oferta->id != 1)
                {{$oferta->nombre}}
                @endif
              </h4>
            </div>
            <div class="card-footer">
                @if(session()->get('rol') !=3)
                <div class="stats">
                  <a href="{{route('ofertas.registro')}}">Crear Ofertas</a>
                </div>
                @else
                <div class="stats">
                  <a href="{{route('ofertas.listado')}}">Revisar detalle</a>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        {{-- <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Tasks:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Bugs
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">code</i> Website
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Create 4 Invisible User Experiences you Never Knew About</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              @if(session()->get('rol')!=3)
              <h4 class="card-title">Nuevas Solicitudes de Cotizacion</h4>
              @endif
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th class="text-center">Empresa</th>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">Cantidad</th>
                  <th class="text-center">Precio Total</th>
                  <th class="text-center">Detalle</th>
                </thead>
                <tbody>
                  
                  @if(session()->get('rol')!=3)
                  @foreach($tablaCotizaciones as $cotizacionTabla)
                  <tr>
                    <td class="text-center">{{$cotizacionTabla->empresa}}</td>
                    <td class="text-center">{{$cotizacionTabla->titulo}}</td>
                    <td class="text-center">{{$cotizacionTabla->cantidad}}</td>
                    <td class="text-center">${{$cotizacionTabla->valor * $cotizacionTabla->cantidad}}</td>
                    <td class="text-center">
                      <a href="{{route('cotizaciones.responder',$cotizacionTabla->id_cotizacion)}}" class="btn btn-info btn-link btn-sm">
                        <i class="material-icons">info</i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @if (session()->get('rol')!=3)
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Usuarios Nuevos</h4>
              {{-- <p class="card-category">Nuevos Usuarios</p> --}}
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th class="text-center">Empresa</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Correo</th>
                  <th class="text-center">Telefono</th>
                  <th class="text-center">Detalle</th>
                </thead>
                <tbody>
                  @foreach ($usuarios as $usuario)
                    <tr>
                      <td>{{$usuario->empresa->nombre_empresa}}</td>
                      <td>{{$usuario->primer_nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</td>
                      <td>{{$usuario->email}}</td>
                      <td>{{$usuario->telefono}}</td>
                      <td class="td-actions">
                        <a href="{{route('usuarios.detalle', $usuario->id)}}" class="btn btn-warning">
                          <span class="material-icons ">
                            person_search
                              </span> 
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
@endsection

{{-- @push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush --}}