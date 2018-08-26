<div class="span2">
	<!-- Menus -->
	<h3><i class="icon-plus-sign"></i> Menu</h3>
	<ul class="menu-footer unstyled register">
		@foreach(\Menu::getByName('Footer Menu') as $menu)								
			<li><a href="{{$menu['link']}}"><i class="fa fa-plus"></i> {{$menu['label']}}</a></li>
		@endforeach	
	</ul>
	<h3><i class="icon-info-sign"></i> Bantuan</h3>
	<ul class="menu-footer unstyled suport">
		@foreach(\Menu::getByName('Footer Bantuan') as $menu)								
			<li><a href="{{$menu['link']}}"><i class="fa fa-plus"></i> {{$menu['label']}}</a></li>
		@endforeach	
	</ul>
	<!-- End Menus -->
</div>