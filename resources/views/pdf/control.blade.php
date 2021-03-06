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

    .linesTable tr th, .linesTable tr td {
        border: 1px solid black;
        padding: 1px !important;
        font-size: 10px !important;
    }
    .tableWithoutLines tr th, .tableWithoutLines tr td { 
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

    <img src="./img/topImg.jpg" width="100%" class="topImg">
    <br>
    <div class="topTables">

    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m1">FECHA</th>
            <td class="m3">{{ $obj->getFechaFormat() }}</td>
            <th class="m1">HORA</th>
            <td class="m3">{{ $obj->getHourFormat() }} HRS</td>
        </tr>
    </table>
<br>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m1">NOMBRE</th>
            <td class="m3">{{ $obj->paciente->fullname() }}</td>
            <th class="m1">EDAD</th>
            <td class="m1">{{ $obj->paciente->edad() }}</td>
            <th class="m1">TELEFONO</th>
            <td class="m1">{{ $obj->telefono }}</td>
        </tr>
    </table>
    <br>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m1">NO. DE EMPL</th>
            <td class="m2">{{ $obj->paciente->no_empleado }}</td>
            <th class="m1">NO. DE FOLIO</th>
            <td class="m2">{{ $obj->paciente->no_folio }}</td>
            <th class="m1 centerText">ESTATUS</th>
            <td class="m2">{{ $obj->paciente->status }}</td>
        </tr>
    </table>
    <br>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m1">AREA</th>
            <td>{{ $obj->paciente->area }}</td>            
            <th class="m1">F. DE NAC</th>
            <td class="m3">{{ $obj->paciente->getNacimientoFormat() }}</td>
        </tr>
    </table>
    <br>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>            
            <th class="m1">ALERGIAS</th>            
        </tr>
        <tr>                        
            <td class="m3">{{ $obj->alergias }}</td>
        </tr>
    </table>
    </div>
    <br>
    <table style="width:100%" class="w3-centered w3-table linesTable datitos">
        <tr>
          <th>TA/mm/hg</th>
          <th>PESO(kg)</th>
          <th>TALLA(mt)</th>
          <th>TEM (°C)</th>
          <th>IMC</th>
          <th>SPO0</th>
          <th>FC</th>
          <th>FR</th>
          <th>DXTX(mg/dl)</th>
        </tr>
        <tr>
          <td>{{ $obj->TA }}</td>
          <td>{{ $obj->peso }} </td>
          <td>{{ $obj->talla }} </td>
          <td>{{ $obj->temperatura }} </td>
          <td>{{ $obj->IMC }} </td>
          <td>{{ $obj->SPO2 }} </td>
          <td>{{ $obj->FC }} </td>
          <td>{{ $obj->FR }} </td>
          <td>{{ $obj->DXTX }} </td>          
        </tr>
    </table>

    <br>
    
    <p><strong>P:</strong> {!! nl2br($obj->p) !!} </p>    
    <p><strong>S:</strong> {!! nl2br($obj->s) !!} </p>    
    <p><strong>O:</strong> {!! nl2br($obj->o) !!} </p>    
    <p><strong>A:</strong> {!! nl2br($obj->a) !!} </p>    
    <p><strong>DIAGNOSTICO:</strong> {!! nl2br($obj->diagnostico) !!} </p>    
    <p><strong>PRONOSTICO:</strong> {!! nl2br($obj->pronostico) !!} </p>    
    <p><strong>PLAN:</strong> {!! nl2br($obj->plan) !!} </p>    
    <p class="rightText"><strong>DR @if($obj->sexo == "Femenino")A @endif. {{ strtoupper($obj->medico->fullname()) }} CED PROF {{ strtoupper($obj->medico->cedula) }}</strong></p>
    
    <script type="text/php">
        if (isset($pdf)) {
            $x = 250;
            $y = 810;
            $text = "Página {PAGE_NUM} / {PAGE_COUNT}";
            $font = null;
            $size = 8;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>
</html>