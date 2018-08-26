@extends('layouts.frontend.master')
@section('og')
    <meta property="og:type" content="website" /> 
    <meta property="og:title" content="Download Brosur | STIKes IMC BINTARO" />
    <meta property="og:description" content="Download brosur sekarang untuk mendapatkan penawaran yang menarik dari STIKes IMC Bintaro" />
    <meta property="og:image" content="{{url('/')}}/assets/frontend/images/STIKES-IMC-BINTARO-OG-IMAGE.jpg" />
    <meta property="title" content="Download Brosur | Sekolah Tinggi Ilmu Kesehatan IMC BINTARO" />
    <meta name="description" content="Download brosur sekarang untuk mendapatkan penawaran yang menarik dari STIKes IMC Bintaro" />
@stop

@section('content')

<div class="main">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="page-header">
					<h1 class="text-center rollo-page-header-full">FORMULIR DOWNLOAD BROSUR</h1>
					<h3 class="text-center rollo-page-header-full">Dapatkan Potongan 50% Biaya Pendaftaran, dengan mengisi form ini. Berakhir 28 Mei 2018</h3>
				</div>

				<form method="POST" action="{{route('post.page.download.brosur')}}" class="form-horizontal">
				{{csrf_field()}}

				

				<div class="control-group">
				    <label class="control-label" for="nama">Nama</label>
				    <div class="controls">
				      <input type="text" name="nama" class="input-block-level rollo-form" placeholder="Nama Lengkap" value="{{old('nama')}}" required>
				    </div>
				    @if($errors->has('nama'))
				      <span style="color: red;" class="help-block">{{$errors->first('nama')}}</span>
				    @endif
				</div>

				  <div class="control-group">
				    <label class="control-label" for="email">E-mail</label>
				    <div class="controls">
				      <input type="email" name="email" class="input-block-level rollo-form" placeholder="E-mail" value="{{old('email')}}" required>
				    </div>
				    @if($errors->has('email'))
				      <span style="color: red;" class="help-block">{{$errors->first('email')}}</span>
				    @endif
				  </div>
				<div class="control-group">
				    <label class="control-label" for="telepon">Telepon</label>
				    <div class="controls">
				      <input type="text" id="telpon" name="telepon" class="input-block-level rollo-form" placeholder="Telpon" value="{{old('telepon')}}" required>
				    </div>
				    @if($errors->has('telepon'))
				      <span style="color: red;" class="help-block">{{$errors->first('telepon')}}</span>
				    @endif
				</div>
				<div class="control-group">
				    <label class="control-label" for="telpon">Jenis Kelamin</label>
				    <div class="controls">
					    <label class="radio inline">
						  <input type="radio" name="jenis_kelamin" class="input-block-level rollo-form" value="P">
						  Pria
						</label>
						<label class="radio inline">
						  <input type="radio" name="jenis_kelamin" class="input-block-level rollo-form" value="W">
						  Wanita
						</label>	
				    </div>
				</div>
				@if (\Cookie::get('psr') !== null)
					<input type="hidden" name="user_id" value="{{\Cookie::get('psr')}}">
				@endif
				<div class="control-group">
				    <div class="controls">				      
				      <button type="submit" class="btn btn-info btn-large pull-right">Download</button>
				    </div>
				</div>
				</form>

			</div>
		</div>
	</div>
</div>
@stop

@section('footer')

@stop