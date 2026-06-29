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

<!--Start Contact Form Section-->
<section class="contact-form-area">
    <div class="container">
		<div class="sec-title text-center">
            <div class="big-title" style="font-size: 70px"><?=@$this->menu_model->settings()->title?></div> 
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 order-box-2">
                <div class="contact-page-info-box">
                    <div class="bottom">
                        <h3><?=lang('contact_info')?></h3>
                        <p><?=$this->settings->address?></p>
                        <p>
							<a href="mailto:nurota@nv.uz"><i class="fa fa-envelope"></i> nurota@nv.uz</a><br>
                            <a href="tel:<?=str_replace(' ','',str_replace('-','',$this->settings->phone))?>"><i class="fa fa-phone"></i> <?=$this->settings->phone?></a>   
                        </p>
                    </div>
                    <div class="social-contact-box">
                       <h3><?=lang('social')?></h3>
                        <ul>
                            <?php
								$social = $this->others_model->social();
								
								foreach($social as $link){
									echo '<li><a href="'.$link['link'].'" target="_blank"> <img src="'.base_url('assets/icon/'.$link['icon']).'" style="width: 32px"></img> </a></li>';
								}
							?>  
                        </ul>
                    </div>
                </div>
            </div> 
            <div class="col-xl-8 col-lg-8 order-box-1">  
				<?php
					if($this->session->flashdata('email_msg')){
						echo '<div class="alert alert-info">'.$this->session->flashdata('email_msg').'</div>';
					}
				?>
                <div class="contact-form">
                    <form action="<?=site_url(LANG_URL.'/home/send')?>" method="post">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="input-box"> 
                                    <input type="text" name="name" value="" placeholder="<?=lang('name')?>" required="">
                                </div>
                                <div class="input-box"> 
                                    <input type="text" name="phone" value="" placeholder="<?=lang('phone')?>">
                                </div>     
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="input-box"> 
                                    <input type="email" name="email" value="" placeholder="<?=lang('email')?>">
                                </div>
                                <div class="input-box"> 
                                    <input type="text" name="subject" value="" placeholder="<?=lang('subject')?>">
                                </div>      
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12"> 
                                <div class="input-box">    
                                    <textarea name="message" placeholder="<?=lang('message')?>" required=""></textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="button-box">
                                    <input name="send" class="btn btn-one" type="submit" value="<?=lang('send')?>">
                                         
                                </div>      
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--End Contact Form Section-->