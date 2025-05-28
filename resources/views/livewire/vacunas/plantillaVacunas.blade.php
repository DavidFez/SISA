<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF formato</title>
        <style>

            @page {
                size: landscape;
                margin: 1cm 0.5cm;
            }

            body {
                font-family: "Bookman Old Style", serif;
                margin: 5px;
                text-align: center;
            }

            .header {
                text-align: center;
                margin-bottom: 10px;
            }

            .table-encabezado {
                width: 100%;
                margin: 0 auto;
                border-collapse: collapse;
                border: 1px solid white;
            }

            .table-encabezado td {
                text-align: center;
                vertical-align: middle;
                border: 1px solid white;
                padding: 1px;
            }

            .img {
                height: 60px;
                vertical-align: middle;
            }


            .table {
                width: 100%;
                margin: 0 auto;
                border-collapse: collapse;
                border: 1px solid black;
            }

            .table th,
            .table td {
                border: 1px solid black;
                padding: 2px;
                text-align: center;
                font-size: 11pt;
            }

            .table th {
                background-color: #b8b7b7d0;
                font-size: 11pt;
            }

            .texto-encabezado {
                 font-size: 11pt;
            }

            
        </style>
    </head>

    <body>

        <div class="header">

            <table class="table-encabezado">

                <tr>
                    <td style="width: 15%;">
                        <img class="img" src="{{ public_path('images/minsal.png') }}" alt="Logo">
                    </td>
                    <td>
                        <p class="texto-encabezado">
                            <b>MINISTERIO DE SALUD <br>
                                DIRECCIÓN DEL PRIMER NIVEL DE ATENCIÓN <br>
                                UNIDAD DE SALUD COMUNITARIA <br>
                                ESQUEMA DE VACUNACIÓN DE ADOLESCENTES, ADULTOS Y ADULTOS MAYORES
                            </b>
                        </p>
                    </td>
                </tr>

            </table>
            
        </div>

        <div class="body-content">

            <p class="texto-encabezado">
                NOMBRE DEL PROMOTOR(A) DE SALUD: <u>JOSÉ ADONAY DEL CID</u>  UCSF: <u>UNIDAD DE SALUD EL ESPINO</u>  CANTÓN: <u>EL JÍCARO</u>  REGIÓN: <u>ORIENTAL</u>  SIBASI: <u>USULUTÁN.</u>
            </p>

            <table class="table">
                
                <thead>
                    <tr>
                        <td rowspan="2">No.</td>
                        <td rowspan="2">NOMBRE Y APELLIDO</td>
                        <td rowspan="2">FECHA DE NAC.</td>
                        <td colspan="8">ESQUEMA DE VACUNACIÓN TD: ADOLESCENTES Y ADULTOS MAYORES (UNA DOSIS CADA 10 AÑOS)</td>
                        <td rowspan="2">NEUMOCOCO CONJUGADO<br><br>UNA DOSIS</td>
                        <td colspan="3">EMBARAZADAS</td>
                        <td colspan="8">INFLUENZA HEMISFERIO SUR, GRUPOS DE RIESGOS</td>
                    </tr>
                    <tr>
                        <td class="small-cell">1</td>
                        <td class="small-cell">2</td>
                        <td class="small-cell">3</td>
                        <td class="small-cell">4</td>
                        <td class="small-cell">5</td>
                        <td class="small-cell">6</td>
                        <td class="small-cell">7</td>
                        <td class="small-cell">8</td>
                        <td>TD: UNA DOSIS A PARTIR DE LA SEMANA 16</td>
                        <td>TDPA: UNA DOSIS A PARTIR DE LA SEMANA 20</td>
                        <td>INFLUENZA UNA DOSIS EN EL PRIMER CONTROL</td>
                        <td class="small-cell">1</td>
                        <td class="small-cell">2</td>
                        <td class="small-cell">3</td>
                        <td class="small-cell">4</td>
                        <td class="small-cell">5</td>
                        <td class="small-cell">6</td>
                        <td class="small-cell">7</td>
                        <td class="small-cell">8</td>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($habitantes as $habitante)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Número de vivienda (puedes ajustar según corresponda) -->
                            <td>{{ $habitante->nombre }} {{ $habitante->apellido }}</td> <!-- Nombre y apellido -->
                            <td>{{ $habitante->fechaNacimientoFomato() }}</td> <!-- Fecha de nacimiento en formato DD/MM/YYYY -->
                            
                            <!-- Celdas vacías para el esquema de vacunación -->
                            @for ($i = 0; $i < 8; $i++)
                                <td></td>
                            @endfor
                            
                            <td></td> <!-- Neumococo conjugado -->
                            
                            <!-- Celdas vacías para embarazadas -->
                            @for ($i = 0; $i < 3; $i++)
                                <td></td>
                            @endfor
                            
                            <!-- Celdas vacías para influenza hemisferio sur -->
                            @for ($i = 0; $i < 8; $i++)
                                <td></td>
                            @endfor
                        </tr>
                    @endforeach
                
                    @if ($habitantes->isEmpty())
                        <tr>
                            <td colspan="20" class="text-center">No hay habitantes para el mes y año seleccionados.</td>
                        </tr>
                    @endif
                </tbody>
                

            </table>

        </div>

    </body>

</html>
