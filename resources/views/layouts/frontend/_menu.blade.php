<nav id="nav" class="navigation lwhite">
	<div class="container">
		<div class="row">
			<div class="span12">
				<ul class="menu fading">
					@foreach($menus as $menu)								
						<li class="active"><a href="{{$menu['link']}}">{{$menu['label']}}</a>
							@if(!empty($menu['child']))
							<ul>
								@foreach($menu['child'] as $child)
									<li {{(!empty($child['child'])) ? 'class="parent"' : ''}}>
									<a href="{{$child['link']}}">
										{{$child['label']}}
										
									</a>
									@if(!empty($child['child']))
										<ul>
											@foreach($child['child'] as $child2)
												<li><a href="{{$child2['link']}}">{{$child2['label']}}</a></li>
											@endforeach
										</ul>										
									@endif
									</li>
								@endforeach
							</ul>	
							@endif
						</li>
					@endforeach					
				</ul>	
				<div class="pull-right">
								<div id="language" class="language visible-desktop">
									<a href="#" class="current"><i class="icon-globe"></i> <span>English</span> <i class="icon-angle-down"></i></a>
									<div class="language-selector">
										<div class="page-header">
											<h5><i class="icon-globe"></i> Select your language <span class="pull-right"><a href="#" class="close"><i class="icon-remove-sign"></i></a></span></h5>
										</div>
										<ul class="unstyled">
											<li class="select"><img src="{{asset('assets/frontend')}}/images/flags/us.png" alt=""> <a href="#">English</a></li>
											<li><a href="#"><img src="{{asset('assets/frontend')}}/images/flags/id.png" alt=""> Indonesia</a></li>											
										</ul>
										<hr>
										
									</div>
								</div>
							</div>
			</div>
		</div>
	</div>
</nav>
