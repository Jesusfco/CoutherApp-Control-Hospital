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

    {{-- <img src="{{ asset('img/topImg.jpg') }}" width="100%" class="topImg"> --}}
    <img src="./img/topImg.jpg" width="100%" class="topImg">
    <br>
    <h3>Historia Clínica</h3>
    <div class="topTables">

    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m1">FECHA</th>
            <td class="m3">{{ $obj->getFechaFormat() }}</td>
            <th class="m1">HORA</th>
            <td class="m3">{{ $obj->getHourFormat() }} HRS</td>
        </tr>
    </table>

    <p>I.- Ficha de Identificación</p>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m2">No. De Expediente:</th>
            <td class="m2">{{ $obj->id }}</td>
            <th class="m2">No. De Empleado:</th>
            <td class="m2">{{ $obj->paciente->no_empleado }}</td>
        </tr>
    </table>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m2">No. De Folio:</th>
            <td class="m2">{{ $obj->paciente->no_folio }}</td>
            <th class="m2">Area:</th>
            <td class="m2">{{ $obj->paciente->area }}</td>
        </tr>
    </table>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m2">Nombre:</th>
            <td class="m2">{{ $obj->paciente->nombre_completo }}</td>
            <th class="m2">Estatus:</th>
            <td class="m2">{{ $obj->paciente->status }}</td>
        </tr>
    </table>
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m2">Edad:</th>
            <td class="m2">{{ $obj->paciente->edad() }}</td>
            <th class="m2">Sexo:</th>
            <td class="m2">{{ $obj->paciente->sexo }}</td>
        </tr>
    </table>
    
    <br>
        
    <table style="width:100%" class="tableWithoutLines w3-table">
        <tr>
            <th class="m2">Lugar y Fecha de Nacimiento:</th>
            <td class="">{{ $obj->paciente->lugar_nacimiento }} {{ $obj->paciente->nacimiento }}</td>            
        </tr>
    </table>

    <p>II.- Interrogatorio</p>
    <p><strong>Antecedentes Heredofamiliares:</strong><br><br> {!! nl2br($obj->heredofamiliares) !!} </p>    
    <p><strong>Antecedentes Persnolaes No Patológicos:</strong><br><br> {!! nl2br($obj->personales_no_patologicos) !!} </p>    
    <p><strong>Antecedentes Persnolaes Patológicos:</strong><br><br> {!! nl2br($obj->personales_patologicos) !!} </p>    
    <p><strong>Musculo-Esquelético:</strong><br><br> {!! nl2br($obj->musculo_esqueletico) !!} </p>    
    <p><strong>Piel y Anexos:</strong><br><br> {!! nl2br($obj->piel_anexos) !!} </p>    
    <p>III. Exploración Fisica</p>
    <table class="linesTable w3-table">
        <thead>    
            <tr>
                <th>Peso Actual kg</th>
                <th>Presión Arterial <strong>mmHg</strong></th>
                <th>Temperatura <strong>°C</strong></th>
                <th>Frec. Respiratoria <strong>x minuto</strong></th>
                <th>Talla <strong>cm</strong></th>
                <th>Frecuencia Cardiaca <strong>x minuto</strong></th>
            </tr>        
        </thead>
        <tbody>
            <tr>
                <td>{{ $obj->peso }}</td>
                <td>{{ $obj->mm_hg }}</td>
                <td>{{ $obj->temperatura }}</td>
                <td>{{ $obj->frecuencia_respiratoria }}</td>
                <td>{{ $obj->frecuencia_cardiaca }}</td>
                <td>{{ $obj->talla }}</td>
            </tr>
        </tbody>
    </table>    

    <p><strong>Habitus Exterior:</strong><br><br> {!! nl2br($obj->habitus_exterior) !!} </p>    
    <p><strong>Cabeza:</strong><br><br> {!! nl2br($obj->cabeza) !!} </p>    
    <p><strong>Cuello:</strong><br><br> {!! nl2br($obj->cuello) !!} </p>    
    <p><strong>Tórax:</strong><br><br> {!! nl2br($obj->torax) !!} </p>    
    <p><strong>Abdomen:</strong><br><br> {!! nl2br($obj->abdomen) !!} </p>    
    <p><strong>Genitales:</strong><br><br> {!! nl2br($obj->genitales) !!} </p>    
    <h5>Interrogacón Por Aparatos y Sistemas</h5>
    <p><strong>Respiratorio:</strong><br><br> {!! nl2br($obj->respiratorio) !!} </p>    
    <p><strong>Cardiovascular:</strong><br><br> {!! nl2br($obj->cardiovascular) !!} </p>    
    <p><strong>Digestivo:</strong><br><br> {!! nl2br($obj->digestivo) !!} </p>    
    <p><strong>Urinario:</strong><br><br> {!! nl2br($obj->urinario) !!} </p>    
    <p><strong>Reproductor:</strong><br><br> {!! nl2br($obj->reproductor) !!} </p>    
    <p><strong>Hemolinfático:</strong><br><br> {!! nl2br($obj->hemolinfatico) !!} </p>    
    <p><strong>Endocrino:</strong><br><br> {!! nl2br($obj->endocrino) !!} </p>    
    <p><strong>Sistema Nervioso:</strong><br><br> {!! nl2br($obj->sistema_nervioso) !!} </p>    
    <p><strong>Exploración Ginecologica:</strong><br><br> {!! nl2br($obj->exploracion_ginecologica) !!} </p>    
    <p><strong>Columna Vertebral:</strong><br><br> {!! nl2br($obj->columna_vertebral) !!} </p>    
    <p><strong>Extremidades Superiores e Inferiores:</strong><br><br> {!! nl2br($obj->extremidades) !!} </p>    
    <p><strong>Exploración Neurologica:</strong><br><br> {!! nl2br($obj->exploracion_neurologica) !!} </p>            
     
    <p><strong>IV. DIAGNOSTICO:</strong></p>        
    <p style="text-align: center">DIAGNOSTICO</p>
    <p>{!! nl2br($obj->diagnostico) !!} </p>        
    <p><strong>PLAN A SEGUIR:</strong><br><br> {!! nl2br($obj->plan) !!} </p>    
    

    <br><br><br>
    <table style="width:100%" class="w3-table">
        <tr>
            <th class="m1 center-text" style="width:50%">
                <div style="text-align: center; ">
                    <div style="border-bottom: 1px solid black; font-size: 10px">{{ $obj->medico->nombre_completo }}</div>
                    <div style="font-size: 12px">Nombre y Firma del Médico</div>
                </div>
            </th>
            <th class="center-text" style="width:50%">
                <div style="text-align: center; ">
                    <div style="border-bottom: 1px solid black; font-size: 10px">{{ $obj->medico->cedula }}</div>
                    <div style="font-size: 12px">Cédula Profesional</div>
                </div>    
            </td>            
        </tr>
    
    </table>

    <script type="text/php">
        if ( isset($pdf) ) {
            $font = Font_Metrics::get_font("helvetica", "bold");
            $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
        }
    </script>
    
</body>
</html>