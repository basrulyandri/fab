@extends('layouts.frontend.master')
@section('og')
    
@stop
@section('content')
<div class="main">
	<div class="container">
		<div class="row">
			
				
					<div class="span12">
									<div class="error-page">
										<div class="row-fluid">
											<div class="span8 offset2">
												<h2>404</h2>
												<h4>Halaman yang anda maksud tidak ditemukan</h4>
												
												<br>
												<a href="{{route('page.index')}}" class="btn btn-large btn-success btn-solid">Kembali ke Halaman Utama</a>
											</div>
										</div>
									</div>
								</div>
						
				
				<!-- End Content -->
			
		</div>
		<a href="#" class="scroll-top"><i class="icon-chevron-up"></i></a>
	</div>
</div>		
@stop