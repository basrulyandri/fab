<!-- Slideshow -->
			<div class="overall">
				<div class="inner">
					<!-- Hero Carousel -->
					<section class="hero">
						<div id="hero-carousel" class="hero-carousel">
						@foreach(sliders() as $slider)
							<article>
								<img class="slider-image" src="{{url('/')}}/{{$slider->thumbnail}}" alt="" />
								<div class="overlay"></div>
								<div class="contents">
									<h2><a href="{{route('page.single',$slider->slug)}}">{{$slider->title}}</a></h2>
									<p>{{$slider->excerpt}}</p>
								</div>
							</article>
							@endforeach							
						</div>
					</section>
					<!-- End Hero Carousel -->
				</div>
			</div>
			<!-- End Slideshow -->