<!--Start Features Style2 Area-->
<section class="features-style2-area">
    <div class="container">
        <div class="sec-title text-center">
            <div class="big-title"><?=lang('tourism')?></div>
            <h3 class="thm-clr2"><?=lang('for_tourists')?></h3> 
        </div>
        <div class="row justify-content-center">
            <!--Start Single Feature Box-->
			<?php
				foreach($turizm as $key => $value){
					echo '<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="single-feature-box">
									<div class="img-holder">
										<div class="inner">
											<img class="js-tilt" src="'.get_photo($value['text']).'" alt="'.$value['title'].'">
										</div>
										<div class="title text-center">
											<h3>'.$value['title'].'</h3>
											<a href="'.site_url(LANG_URL.'/home/blog/'.$value['alias']).'">'.lang('more').'</a>    
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