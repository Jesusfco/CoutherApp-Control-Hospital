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

    <img src="{{ url('img/topImg.jpg') }}" width="100%" class="topImg">
    <br>
    <div class="topTables">

    <table style="width:100%" class="linesTable w3-table">
        <tr>
            <th class="m1">FECHA</th>
            <td class="m3">{{ $obj->getFechaFormat() }}</td>
            <th class="m1">HORA</th>
            <td class="m3">{{ $obj->getHourFormat() }} HRS</td>
        </tr>
    </table>

    <table style="width:100%" class="linesTable w3-table">
        <tr>
            <th class="m1">NOMBRE</th>
            <td class="m3">{{ $obj->paciente->fullname() }}</td>
            <th class="m1">EDAD</th>
            <td class="m1">{{ $obj->paciente->edad() }}</td>
            <th class="m1">TELEFONO</th>
            <td class="m1">{{ $obj->telefono }}</td>
        </tr>
    </table>

    <table style="width:100%" class="linesTable w3-table">
        <tr>
            <th class="m1">NO. DE EMPL</th>
            <td class="m3">{{ $obj->paciente->no_empleado }}</td>
            <th class="m2 centerText">STATUS</th>
            <td class="m2">{{ $obj->paciente->status }}</td>
        </tr>
    </table>

    <table style="width:100%" class="linesTable w3-table">
        <tr>
            <th class="m1">AREA</th>
            <td>{{ $obj->paciente->area }}</td>            
        </tr>
    </table>

     

    <br>
    
    <p><strong>Alergias:</strong><br><br> {!! nl2br($obj->alergias) !!} </p>    
    <p><strong>Antecedentes Heredofamiliares:</strong><br><br> {!! nl2br($obj->heredofamiliares) !!} </p>    
    <p><strong>Antecedentes Persnolaes No Patológicos:</strong><br><br> {!! nl2br($obj->personales_no_patologicos) !!} </p>    
    <p><strong>Antecedentes Persnolaes Patológicos:</strong><br><br> {!! nl2br($obj->personales_patologicos) !!} </p>    
    <p><strong>Musculo-Esquelético:</strong><br><br> {!! nl2br($obj->musculo_esqueletico) !!} </p>    
    <p><strong>Piel y Anexos:</strong><br><br> {!! nl2br($obj->piel_anexos) !!} </p>    
    <h4>Exploración Fisica</h4>
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
     
    <p><strong>DIAGNOSTICO:</strong><br><br> {!! nl2br($obj->diagnostico) !!} </p>        
    <p><strong>PLAN:</strong><br><br> {!! nl2br($obj->plan) !!} </p>    
    
    <table style="width:100%" class="linesTable w3-table">
        <tr>
            <th class="m1 center-text" style="width:50%">{{ $obj->medico->nombre_completo }}</th>
            <th class="center-text" style="width:50%">{{ $obj->medico->cedula }}</td>            
        </tr>
        <tr>
            <th class="m1 center-text">Nombre y Firma del Médico</th>
            <th class="center-text">Cedula</td>            
        </tr>
    </table>
    
</body>
</html>