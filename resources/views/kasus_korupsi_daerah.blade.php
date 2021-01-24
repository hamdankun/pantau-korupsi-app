@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<canvas id="kasusKorupsiPerDaerah" width="400" height="400"></canvas>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">

		var provinsi = JSON.parse('{!! json_encode($provinsi) !!}');
		var jumlahKasus = JSON.parse('{!! json_encode($jumlah_kasus) !!}');
		var randomHexColor = JSON.parse('{!! json_encode($hexcolor) !!}')

		defineBarChartGroupByYear('kasusKorupsiPerDaerah', jumlahKasus);
		

		function defineBarChartGroupByYear(selectorId, data) {
			var ctx = document.getElementById(selectorId);
			var chart = new Chart(ctx, {
			    type: 'horizontalBar',
			    data: {
			        labels: provinsi,
			        datasets: [
				        {
				            label: 'Jumlah Kasus Per Daerah Periode 2016-2020',
				            data: data,
				            backgroundColor: randomHexColor,
				        }
			        ]
			    },
			    options: {
			    	tooltips: {
			            callbacks: {
			                label: function(tooltipItem, data) {
			                    return 'Jumlah Kasus : ' + formatCurrencyIndo(tooltipItem.xLabel);
			                }
			            }
			        },
			    }
			});
		}
	</script>
@endsection