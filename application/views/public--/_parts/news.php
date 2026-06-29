<!--Start Event Style1 Area-->
<section class="event-style1-area">
    <div class="container">
        <div class="sec-title style2 text-center">
            <h2><?=lang('news')?></h2>
        </div>
        <div class="row">
			<?php
				foreach ($news as $key => $value) {
					echo '<div class="col-xl-4 col-lg-4">
							<div class="single-event-style1 wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
								<div class="img-holder">
									<div class="inner">
										<img src="'.get_thumb($value['text']).'" alt="Awesome Image">
									</div>
									<div class="date-box">
										<h2 class="thm-clr2">'.nice_date($value['created'],'d').'<br><span>'.nice_date($value['created'],'F').'</span></h2>
									</div>
								</div> 
								<div class="text-holder">
									<h3><a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'">'.character_limiter($value['title'],55).'</a></h3>
									<div class="text">
										<p>'.character_limiter(strip_tags($value['title']),70).'</p>    
									</div>
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
<!--End Event Style1 Area-->
