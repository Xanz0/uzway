<!--Start breadcrumb area-->     
<section class="breadcrumb-area" style="background-image: url(<?=base_url('assets/public/images/bg-details.jpg')?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <ul class="clearfix">
							<?php
								$this->mybreadcrumb->add(lang('home'), site_url());
								$this->mybreadcrumb->add(@$this->menu_model->settings()->title, current_url());
								echo $this->mybreadcrumb->render();
							?> 
                        </ul>    
                    </div>
                    <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                       <h2><?=@$this->menu_model->settings()->title?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start Blog Style1 Area-->
<section class="blog-style1-area">
    <div class="container">
        <div class="row">
            
			<?php
				foreach ($news as $key => $value) {
					echo '<div class="col-xl-3 col-lg-3">
							<div class="single-blog-style1">
								<div class="img-holder">
									<div class="inner">
										<img src="'.get_photo($value['text']).'" alt="Awesome Image">
									</div>
								</div> 
								<div class="text-holder">
									<h3><a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'">'.character_limiter($value['title'],55).'</a></h3> 
									<div class="button">
										<a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'">'.lang('more').'</a>
									</div>
								</div>   
							</div>
						</div>';
				}
			?>
        </div>
    </div>
</section>
<!--End Blog Style1 Area-->