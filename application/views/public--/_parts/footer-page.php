<!--Start footer area-->  
<footer class="footer-area">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!--Start single footer widget-->
                <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 wow animated fadeInUp" data-wow-delay="0.1s">
                    <div class="single-footer-widget marbtm">
                        <div class="our-company-info">
                            <div class="footer-logo">
                                <a href="index.html"><img src="<?=base_url($this->settings->logo2)?>" alt="Awesome Footer Logo" title="Logo"></a>    
                            </div>
                            <div class="text">
                                <p><?=$this->settings->footer_about?></p>
                            </div>   
                        </div>      
                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.3s">
                    <div class="single-footer-widget marginleft">
                        <div class="title">
                            <h3><?=lang('cats')?></h3>
                        </div>
                        <ul class="site-links">
							<?php
                                $menu = $this->menu_model->get_menu($this->uri->segment(1));

                                foreach ($menu as $key => $value) {
                                    echo '<li><a href="'.site_url(LANG_URL.'/home/blog/'.$value['alias']).'">'.$value['title'].'</a></li>';
                                }
                            ?>     
                        </ul>                     	  
                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="single-footer-widget pdtop marginleft">
                        <div class="title">
                            <h3><?=lang('contact_info')?></h3>
                        </div>
                        <div class="footer-contact-info">
                            <p><?=$this->settings->address?></p>
                            <ul>
                                <li>
                                    <div class="left">
                                        <p>Tel:</p>
                                    </div>
                                    <div class="right">
                                        <a href="tel:<?=str_replace(' ','',str_replace('-','',$this->settings->phone))?>"><?=$this->settings->phone?></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p>Email:</p>
                                    </div>
                                    <div class="right">
                                        <a href="mailto:nurota@nv.uz">nurota@nv.uz</a>
                                    </div>
                                </li> 
                                   
                            </ul>
                        </div>                     	  
                    </div>
                </div>
                <!--End single footer widget-->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="outer-box">
                <div class="copyright-text">
                    <p><a href="<?=site_url(LANG_URL)?>"><?=$this->settings->site_name?></a> &copy; 2022</p>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li><a href="http://ncc.uz" target="_blank"><?=lang('dev')?> – NCC</a></li>
                    </ul>
                </div>
            </div>    
        </div>    
    </div>
</footer>   
<!--End footer area-->