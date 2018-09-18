<nav id="nav" class="navigation lwhite">
	<div class="container">
		<div class="row">
			<div class="span12">
				<ul class="menu fading">
					@foreach($menus as $menu)								
						<li class="active"><a href="{{url('/')}}/{{$menu['link']}}">{{\Harimayco\Menu\Models\MenuItems::find($menu['id'])->trans('label')}}</a>
							@if(!empty($menu['child']))
							<ul>
								@foreach($menu['child'] as $child)
									<li {{(!empty($child['child'])) ? 'class="parent"' : ''}}>
									<a href="{{url('/')}}/{{$child['link']}}">
										{{\Harimayco\Menu\Models\MenuItems::find($child['id'])->trans('label')}}</a>
										
									</a>
									@if(!empty($child['child']))
										<ul>
											@foreach($child['child'] as $child2)
												<li><a href="{{url('/')}}/{{$child2['link']}}">{{\Harimayco\Menu\Models\MenuItems::find($child2['id'])->trans('label')}}</a></a></li>
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
									<a href="#" class="current"><i class="icon-globe"></i> <span>{{ LaravelLocalization::getCurrentLocaleName() }}</span> <i class="icon-angle-down"></i></a>
									<div class="language-selector">
										<div class="page-header">
											<h5><i class="icon-globe"></i> {{trans('msg.select_language')}} <span class="pull-right"><a href="#" class="close"><i class="icon-remove-sign"></i></a></span></h5>
										</div>
										<ul class="unstyled">
											<li class="select">
												<a href="{{ \LaravelLocalization::getLocalizedURL('en', url()->current()) }}">
													<img src="{{asset('assets/frontend')}}/images/flags/us.png" alt=""> 
													{{trans('msg.english')}}
												</a>
											</li>
											<li>
												<a href="{{ \LaravelLocalization::getLocalizedURL('id', url()->current()) }}">
													<img src="{{asset('assets/frontend')}}/images/flags/id.png" alt=""> {{trans('msg.bahasa_indonesia')}}
												</a>
											</li>											
										</ul>
										<hr>
										
									</div>
								</div>
							</div>
			</div>
		</div>
	</div>
</nav>
