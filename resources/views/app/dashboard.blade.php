@extends('blades.app')

@section('title', 'Inicio - Estadisticas y resumen')

@section('css')
@endsection

@section('content')
<h3>Inicio</h3>
    
    
@endsection

@section('scripts')
{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
 
	function drawChart() {
 
		var data = google.visualization.arrayToDataTable([
            ['Estatus de Negocio', '#'],
			['Negocios Al corriente', {{ count($businessNormal) }} ],			
			['Locales Pendientes', {{ count($businessPend) }} ],
		]);
 
 
		// grafico en 2d
		var options = {
			title: 'Estadisticas de Negocios'
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		chart.draw(data, options);

        var data = google.visualization.arrayToDataTable([
            ['Mensualidades', 'Dinero'],
			['Cobrado', {{ $moneyPayed }} ],			
			['Por Cobrar', {{ $moneyPend}} ],
		]);
 
 
		// grafico en 2d
		var options = {
			title: 'Dinero Por Cobrar'
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
		chart.draw(data, options);
 
		
	} --}}

</script>
@endsection