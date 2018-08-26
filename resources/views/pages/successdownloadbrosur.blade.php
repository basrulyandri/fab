@extends('layouts.frontend.master')

@section('content')

<div class="main">
	<div class="container">
		<div class="row">
			<div class="span12">				
			<div class="description shadow-large text-center">
				<h3>Terima Kasih {{$aplikan->nama}}</h3>
				<h4>Atas permintaan download Brosur STIKES IMC</h4>
				<h4>Kami juga telah mengirimkan email yang berisi link downloadnya. Jika tidak ada di inbox biasanya masuk folder SPAM dan jangan lupa untuk memindahkan email tersebut ke folder inbox agar kami dapat mengirimkan info-info terkait program yang diadakan di STIKES IMC.</h4>
				<a href="{{url('/')}}{{getOption('file_brosur')}}" class="btn btn-success btn large">Download PDF</a>
			</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer')

@stop