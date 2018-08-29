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
			</div>
		</div>
	</div>
</nav>
