<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<style>

    .center-text {
        text-align: center
    }

    .table-font-middle {
        font-size: 11.5px !important;
        padding: 1px !important;
    }
    .linesTable tr th, .linesTable tr td {
        border: 1px solid black;
        padding: 1px !important;
        font-size: 10px !important;
    }
    .datitos th, .datitos td {
        width: 11%;
    }

    .m1 { width: 12.5%; }
    .m2 { width: 25%; }
    .m3 { width: 37.5%; }
    .m4 { width: 50%; }
    .topTables .w3-table th, .topTables .w3-table td  {
        padding-left: 7px !important;
    }

    .centerText { text-align: center !important;}
    .rightText { text-align: right }

    .topImg { 
        position: relative;
        margin-top: -25px
    }

    p { font-size: 10px }
</style>

<body>

    {{-- <img src="{{ asset('img/topImg.jpg') }}" width="100%" class="topImg"> --}}
    <img src="./img/pdf/monitoreoTopBar.png" width="100%" class="topImg">
    <br><br>
    <div class="topTables">

        <table style="width:100%" class="w3-table table-font-middle">
            <tr>
                <th class="" style="width: 9%">Fecha:</th>
                <td class="2">{{ $obj->getFechaFormat() }}</td>                
            </tr>
        </table>
        <table style="width:100%" class="w3-table table-font-middle">
            <tr>
                <th class="m1" style="width: 9%">Nombre:</th>
                <td class="" style="width: 35%">{{ $obj->paciente->nombre_completo }}</td>                
                <th class="" style="width: 17%">No. De Empleado:</th>
                <td class="2">{{ $obj->paciente->no_empleado }}</td>                
                <th class="" style="width: 15%">No. De Folio:</th>
                <td class="2">{{ $obj->paciente->id }}</td>                
            </tr>
        </table>

     
 
    <table class="linesTable w3-table">
        <thead>    
            <tr>
                <th>Dia</th>
                <th>Antes</th>
                <th>Desayuno</th>
                <th>Después</th>
                <th>Antes</th>
                <th>Comida</th>
                <th>Después</th>
                <th>Antes</th>
                <th>Cena</th>
                <th>Después</th>                
            </tr>        
        </thead>
        <tbody>
            @for ($i = 0; $i < 31; $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>                
            @endfor                            
        </tbody>
    </table>    
    
    <p style="text-align: right; font-size: 14px">{{ $obj->medico->nombre_completo }}<br> {{ $obj->medico->cedula }}</p>    
    
</body>
</html>