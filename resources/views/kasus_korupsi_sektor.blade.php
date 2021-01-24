@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3" style="text-align: center;">
			<h4>Jumlah Kasus Korupsi Per Sektor Periode 2016-2020</h4>
			<canvas id="kasusKorupsiPerDaerah" width="400" height="400"></canvas>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		var sektor = JSON.parse('{!! json_encode($sektor) !!}');
		var jumlahKasus = JSON.parse('{!! json_encode($jumlah_kasus) !!}');
		var randomHexColor = JSON.parse('{!! json_encode($hexcolor) !!}')

		definePieChartGroupByDaerah('kasusKorupsiPerDaerah', jumlahKasus);
		

		function definePieChartGroupByDaerah(selectorId, data) {
			var ctx = document.getElementById(selectorId);
			var chart = new Chart(ctx, {
			    type: 'polarArea',
			    data: {
			        labels: sektor,
			        datasets: [
				        {
				            label: 'Jumlah Kasus Per Sektor Periode 2016-2020',
				            data: data,
				            backgroundColor: randomHexColor,
				        }
			        ]
			    },
			    options: {}
			});
		}
	</script>
@endsection