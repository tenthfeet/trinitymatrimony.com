@extends('layouts.app')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{url('/')}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">About</li>
     </ul>
   </div>
   <div class="about">
   	  <div class="col-md-6 about_left">
   	  	<img src="images/a3.jpg" class="img-responsive" alt=""/>
   	  </div>
   	  <div class="col-md-6 about_right">
   	  	<h1>About us</h1>
   	  	<p>TRINITY MATRIMONY, online matrimonial service was founded with a simple objective - to help people find their soulmates. </p>
   	  	<div class="accordation">
		   <div class="jb-accordion-wrapper">
				<div class="jb-accordion-title">Mission<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion-1-"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				</p><div id="accordion-1-" class="jb-accordion-content collapse in" style="height: auto;">
				<p>TRINITY MATRIMONY, online matrimonial service was founded with a simple objective - to help people find their soulmates. </p>
				</div>
				<p><!-- /.collapse --></p>
			</div>
			<div class="jb-accordion-wrapper">
				<div class="jb-accordion-title">Vision <button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion2-"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				</p><div id="accordion2-" class="jb-accordion-content collapse ">
				<p>TRINITY MATRIMONY, online matrimonial service was founded with a simple objective - to help people find their soulmates. </p>
				</div>
				<p><!-- /.collapse --></p>
			</div>
			<div class="jb-accordion-wrapper">
				<div class="jb-accordion-title">Values<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion3"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				</p><div id="accordion3" class="jb-accordion-content collapse ">
				<p>TRINITY MATRIMONY, online matrimonial service was founded with a simple objective - to help people find their soulmates. </p>
				</div>
				<p><!-- /.collapse --></p>
			</div>
		</div>
   	  </div>
   	  <div class="clearfix"> </div>
   </div>
  </div>
</div>

<div class="about_bottom">
	<div class="container">
		<h3>Our Spritual Leaders</h3>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="images/pjp.jpg"  class="img-responsive" alt=""/></a>
					<div class="post_networks">
						<ul>
							<li class="network_0"><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
			    </figure>
			    <div class="desc">
			    	<h4><a href="#">Pope John Paul II </a></h4>
			    	<p>spiritual leaders in our lives,</p>
			    </div>
			 </li>
	       </ul>
	   </div>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="images/pjp.jpg"  class="img-responsive" alt=""/></a>
					<div class="post_networks">
						<ul>
							<li class="network_0"><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
			    </figure>
			    <div class="desc">
			    	<h4><a href="#">Pope John Paul II </a></h4>
			    	<p>spiritual leaders in our lives,</p>
			    </div>
			 </li>
	       </ul>
	   </div>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="images/pjp.jpg"  class="img-responsive" alt=""/></a>
					<div class="post_networks">
						<ul>
							<li class="network_0"><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
			    </figure>
			    <div class="desc">
			    	<h4><a href="#">Pope John Paul II </a></h4>
			    	<p>spiritual leaders in our lives,</p>
			    </div>
			 </li>
	       </ul>
	   </div>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="images/pjp.jpg"  class="img-responsive" alt=""/></a>
					<div class="post_networks">
						<ul>
							<li class="network_0"><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
			    </figure>
			    <div class="desc">
			    	<h4><a href="#">Pope John Paul II </a></h4>
			    	<p>spiritual leaders in our lives,</p>
			    </div>
			 </li>
	       </ul>
	   </div>
	   <div class="clearfix"> </div>
	</div>
</div>
@endsection