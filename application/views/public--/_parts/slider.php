<!-- Start Main Slider-->
<section> 
        <div id="demo" class="carousel slide" data-ride="carousel">

		  <!-- Indicators -->
		  <ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
			<li data-target="#demo" data-slide-to="3"></li>
		  </ul>

		  <!-- The slideshow -->
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="<?=base_url('assets/public/images/slides/slide.jpg')?>" alt="Los Angeles">
			</div>
			<div class="carousel-item">
			  <img src="<?=base_url('assets/public/images/slides/slide2.jpg')?>" alt="Chicago">
			</div>
			<div class="carousel-item">
			  <img src="<?=base_url('assets/public/images/slides/slide3.jpg')?>" alt="New York">
			</div>
			<div class="carousel-item">
			  <img src="<?=base_url('assets/public/images/slides/slide4.jpg')?>" alt="New York">
			</div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		  </a>
		</div>
</section>
<nav class="social-new">
    <ul>
		<?php
			$social = $this->others_model->social();

			foreach($social as $link){
				echo '<li>
						<a href="'.$link['link'].'" target="_blank"> 
							'.$link['name'].' 
							<img src="'.base_url('assets/icon/'.$link['icon']).'" style="width: 32px"></img> 
						</a>
					</li>';
			}
		?>
	</ul>
</nav>
