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


<!--Start Blog single Area-->
<section class="blog-area blog-single-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-post">
                    <!--Start single blog post-->
                    <div class="single-blog-style1 style1-in-style2">
						
						<?php if(!empty($result)): ?>
							<!--div class="img-holder">
								<div class="inner">
									<img src="<?=get_photo($result->text)?>" alt="Awesome Image">
								</div>
								<div class="date-box">
									<h2><?=nice_date($result->created,'d')?><br><span><?=nice_date($result->created,'F')?></span></h2>
								</div>
							</div--> 
						<?php endif; ?>
						
                        <div class="text-holder">
							<?php if(!empty($result)): ?>
								<ul class="meta-info">
									<li>Yaratildi: <?=nice_date($result->created,'d.m.Y H:i')?></li>
									<!--<li class="mr-auto">Yangilandi: <?=nice_date($result->updated,'d.m.Y H:i')?></li>-->
								</ul>
								<h3><?=$result->title?></h3>
								<div class="text">
									<?=$result->text?>
								</div>
							<?php endif; ?>
                        </div>
                    </div>
                    <!--End single blog post-->  
                </div>
            </div>
            
            <!--Start sidebar Wrapper-->
            <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">
                <div class="sidebar-wrapper blog">
                    <!--Start single sidebar-->
                    <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.1s" data-wow-duration="1200ms">
                        <div class="title">
                            <h3><?=lang('search')?></h3>
                        </div>
                        <div class="sidebar-search-box">
                            <form class="search-form" action="#">
                                <input placeholder="<?=lang('search')?>" type="text">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <!--End single sidebar-->
                    <!--Start sidebar categories Box-->
                    <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.3s" data-wow-duration="1200ms">
                        <div class="title">
                            <h3><?=lang('cats')?></h3>
                        </div>
                        <div class="categories-box"> 
                            <ul class="categories clearfix">
                                <?php
									$menu = $this->menu_model->get_menu($this->uri->segment(1));

									foreach ($menu as $key => $value) {
										echo '<li><a href="'.site_url(LANG_URL.'/home/blog/'.$value['alias']).'">'.$value['title'].'</a></li>';
									}
								?> 
                            </ul>
                        </div>
                    </div>
                    <!--End sidebar categories Box-->
                    <!--Start single sidebar-->
                    <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.5s" data-wow-duration="1200ms">
                        <div class="title">
                            <h3><?=lang('resent_posts')?></h3>
                        </div>
                        <ul class="recent-posts">
							<?php
								foreach ($this->lastNews as $key => $value) {
									echo '<li>
											<div class="img-box">
												<img src="'.get_thumb($value['text']).'" alt="'.$value['title'].'">
												<div class="overlay-content">
													<a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'"><i class="fa fa-link" aria-hidden="true"></i></a>
												</div>    
											</div>
											<div class="title-box">
												<div class="date"><span class="flaticon-calendar"></span>'.nice_date($value['created'],'d.m.Y').'</div>
												<h4><a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'">'.character_limiter(strip_tags($value['title']),20).'</a></h4>
											</div>
										</li>';
								}
							?>                           
                        </ul>     
                    </div>
                    <!--End single sidebar--> 
                </div>    
            </div>
            <!--End Sidebar Wrapper-->
            
        </div>
    </div>    
</section>
<!--End Blog single Area-->