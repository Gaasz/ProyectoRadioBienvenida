<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cotización</title>
</head>
<body >
    <div>

        <div class="row">
            <div class="ml-auto pl-3">
                <img src="{{asset('img/bienvenida.png')}}" height="200px">
            </div>
            <div>
                <table class="table">
                    <tr>
                        <td>
                            Cliente
                        </td>
                        <td>
                            {{$empresa->nombre_empresa}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Año - Mes
                        </td>
                        <td>
                            {{$año.' - '.$mes}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Campaña 
                        </td>
                        <td>
                            {{$cotizacion->titulo}}
                        </td>
                    </tr>
                </table>

                <table>
                    
                </table>
            </div>
        </div>

        <div class="row">
            <label for=""></label>
        </div>

        <table class="table table-bordered mx-3">
            <thead style="background-color:orange">
                <tr>
                    <th>Medio</th>
                    <th>Comuna</th>     
                    <th>Formato</th>
                    @for($i=0;$i<$dias;$i++)
                        <th>{{$dias_nombre[$i].' '.$i+1}}</th>   
                    @endfor
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                       <td>Radio Bienvenida</td>
                       <td>Rancagua</td>
                       <td>Frases de 30 Segundos Repartidas</td>
                       @for($i=0;$i<$dias;$i++)
                            <td>{{$cotizacion->cantidad}}</td>
                          @endfor
                    </tr>
                    <tr>
                        <td style="visibility: hidden"></td>
                        <td style="visibility: hidden"></td>
                        <td>Frases Bonificación</td>
                        @for($i=0;$i<$dias;$i++)
                            <td>{{$cotizacion->extra}}</td>
                          @endfor
                    </tr>
        </table>

       <footer class=" text-center text-lg-start fixed-bottom" style="background-color: orange;">
        
        <div class="text-center py-2">
            <p>2021 - Radio Bienvenida</p>
            <p> Cuevas Nº 289, Rancagua </p>
        </div>
        
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>