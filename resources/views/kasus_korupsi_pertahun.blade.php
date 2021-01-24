@extends('layouts.base')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<canvas id="kasusKorupsiPertahunChart" width="400" height="400"></canvas>
		</div>
		<div class="col-md-6">
			<canvas id="jumlahTersangkaPertahunChart" width="400" height="400"></canvas>
		</div>
		<div class="col-md-6">
			<canvas id="jumlahNilaiKerugianPertahunChart" width="400" height="400"></canvas>
		</div>
		<div class="col-md-6">
			<canvas id="jumlahNilaiSuapPertahunChart" width="400" height="400"></canvas>
		</div>
		<div class="col-md-6">
			<canvas id="groupKasusPertahunChart" width="400" height="400"></canvas>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		var jumlahKasus = JSON.parse('{!! json_encode($jumlah_kasus) !!}');
		var jumlahTersangka = JSON.parse('{!! json_encode($jumlah_tersangka) !!}');
		var jumlahNilaiKerugian = JSON.parse('{!! json_encode($nilai_kerugian) !!}');
		var jumlahNilaiSuap = JSON.parse('{!! json_encode($nilai_suap) !!}');
		var tahun = JSON.parse('{!! json_encode($tahun) !!}');

		defineLineChartGroupByYear('kasusKorupsiPertahunChart', jumlahKasus, '# Jumlah Kasus Korupsi Dari Tahun 2016-2020');

		defineLineChartGroupByYear('jumlahTersangkaPertahunChart', jumlahTersangka, '# Jumlah Tersangka Kasus Korupsi Dari Tahun 2016-2020');

		defineLineChartGroupByYear('jumlahNilaiKerugianPertahunChart', jumlahNilaiKerugian, '# Jumlah Nilai Kerugian Dari Tahun 2016-2020');

		defineLineChartGroupByYear('jumlahNilaiSuapPertahunChart', jumlahNilaiSuap, '# Jumlah Nilai Suap Dari Tahun 2016-2020');

		defineBarChartGroupByYear('groupKasusPertahunChart');

		function defineLineChartGroupByYear(selectorId, data, label) {
			var ctx = document.getElementById(selectorId);
			var chart = new Chart(ctx, {
			    type: 'line',
			    data: {
			        labels: tahun,
			        datasets: [{
			            label: label,
			            data: data,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1,
			            fill: false,
			            lineTension: 0
			        }]
			    },
			    options: {
			    	tooltips: {
			            callbacks: {
			                label: function(tooltipItem, data) {
			                    return 'Jumlah Kasus : ' + formatCurrencyIndo(tooltipItem.yLabel);
			                }
			            }
			        },
			        scales: {
			            yAxes: [{
			                ticks: {
			                    // Include a dollar sign in the ticks
			                    callback: function(value, index, values) {
			                        return formatCurrencyIndo(value);
			                    }
			                }
			            }]
			        }
			    }
			});
		}

		function defineBarChartGroupByYear(selectorId) {
			var ctx = document.getElementById(selectorId);
			var chart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: tahun,
			        datasets: [
				        {
				            label: 'Jumlah Kasus',
				            data: jumlahKasus,
				            backgroundColor: '#cedcf2'
				        },
				        {
				            label: 'Jumlah Tersangka',
				            data: jumlahTersangka,
				            backgroundColor: '#56d67e'
				        }
			        ]
			    },
			    options: {
			    	barValueSpacing: 20,
			        scales: {
			            yAxes: [{
			                ticks: {
			                    min: 0,
			                    callback: function(value, index, values) {
			                        return formatCurrencyIndo(value);
			                    }
			                }
			            }]
			        }
			    }
			});
		}
	</script>
@endsection