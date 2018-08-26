<div class="span4">
						<!-- Aside -->
						<aside>	
						<div class="widget">
								<!-- Ad-336 Widget -->
								<div class="ad-336 ad-336-widget">
									<div class="image">
										<a href="{{route('page.download.brosur')}}"><img src="{{url('assets/frontend')}}/images/banners/300x250.jpg" alt="Advertising"></a>
									</div>
									<div class="advertising"></div>
								</div>
								<!-- End Ad-336 Widget -->
							</div>						
							<div class="widget">
							<div class="page-header">
											<h2><i class="icon-file"></i> Terbaru</h2>
										</div>
								<ul class="articles articles-widget unstyled">
									@foreach(latestPosts() as $sidebarLatestPost)
									<li>
										<a href="single.html"><img src="{{url('/')}}/{{$sidebarLatestPost->thumbnail}}" alt="" class="pull-left"></a>
										<h5>
											<a href="{{route('page.single',$sidebarLatestPost->slug)}}">{{$sidebarLatestPost->title}}</a>											
										</h5>
										<small><i class="icon-calendar"></i> <time datetime="2013-04-26T09:00:08+00:00">{{$sidebarLatestPost->published_at->format('d M, Y')}}</time>, by <a href="single.html">{{$sidebarLatestPost->user->getNameOrEmail(true)}}</a></small>
									</li>
									@endforeach								
								</ul>
							</div>
							
						</aside>
						<!-- End Aside -->
					</div>