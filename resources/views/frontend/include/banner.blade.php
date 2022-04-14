@php
$banners=DB::table('banners')
        ->orderBy('id','DESC')->limit(5)->get();

$seeting=DB::table('settings')->first();		

        
@endphp




		   <!-- Hero Section Begin -->
		<section class="hero">
        <div class="hero__slider owl-carousel">
			@foreach($banners as $row)
				<div class="hero__items set-bg" data-setbg="{{asset($row->image)}}">
					<div class="container">
						<div class="row">
							<div class="col-xl-5 col-lg-7 col-md-8">
								<div class="hero__text">
									<h6>Welcome </h6>
									<h2>{{$row->title}}</h2>
									<p>{{$row->Short_title}}.</p>
									@if($row->offer_percentage !=null && $row->duration !=null)
									<p>Special offer <span> {{$row->offer_percentage}}% off </span> this {{$row->duration}}</p>
									@else
									@endif
									
									<div class="hero__social">
										<a href="{{$seeting->facebookb_link}}"><i class="fa fa-facebook"></i></a>
										<a href="{{$seeting->twiter_link}}"><i class="fa fa-twitter"></i></a>
										<a href="{{$seeting->linkdin_link}}"><i class="fa fa-linkedin"></i></a>
										<a href="{{$seeting->instragram_link}}"><i class="fa fa-instagram"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
          
        </div>
    </section>
    <!-- Hero Section End -->



	