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
<!--Start Features Style2 Area-->
<section class="features-style2-area">
    <div class="container">
        <div class="row justify-content-center">
            <!--Start Single Feature Box-->
			<?php
				foreach($cat_list as $key => $value){
					echo '<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="single-feature-box">
									<div class="img-holder">
										<div class="inner">
											<img class="js-tilt" src="'.get_photo($value['text']).'" alt="'.$value['title'].'">
										</div>
										<div class="title text-center">
											<h3>'.$value['title'].'</h3>
											<a href="'.site_url(uri_string().'/'.$value['alias']).'">'.lang('more').'</a>    
										</div>
									</div>    
								</div>
							</div>';
				}
			?> 
            <!--End Single Feature Box-->
        </div>
    </div>    
</section>
<!--End Features Style2 Area-->