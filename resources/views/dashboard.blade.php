@extends('layouts.base')

@section('content')
	<div class="jumbotron">
	  <h1 class="display-4">Selamat Datang Di Aplikasi Pantau Korupsi!</h1>
	  <p class="lead">Aplikasi Simple yang menampilkan data visualisasi tentang data kasus korupsi di Indonesia.</p>
	  <hr class="my-4">
	  <p>Silahkan akses dan lihat beberapa data yang tersedia diaplikasi.</p>
	  <p class="lead">
	    <a class="btn btn-info btn-md" href="{!! route('data-kasus.pertahun') !!}" role="button">Kasus Korupsi Per Tahun</a>
	    <a class="btn btn-info btn-md" href="{!! route('data-kasus.perdaerah') !!}" role="button">Kasus Korupsi Per Daerah</a>
	    <a class="btn btn-info btn-md" href="{!! route('data-kasus.perlembaga') !!}" role="button">Kasus Korupsi Per Lembaga</a>
	    <a class="btn btn-info btn-md" href="{!! route('data-kasus.persektor') !!}" role="button">Kasus Korupsi Per Sektor</a>
	  </p>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		
	</script>
@endsection