<!-- main header -->
<header class="main-header header-style-two">
    <!--Start Header Top-->
    <div class="header-top">
        <div class="outer-container">
            <div class="outer-box clearfix">
                <div class="header-top-left pull-left">
                    <p><i class="fa fa-bullhorn text-white" aria-hidden="true"></i><?=$this->settings->address?></p>    
                </div>
                <div class="header-top-right clearfix pull-right">
                    <div class="header-social-link">
						<ul>  
							<?php
								foreach ($this->_lang as $key => $_lang) {
									if($key == 0){
										$st = 'style="margin-left: 20px"';
									}else{$st='';}
									echo '<li '.$st.'><a href="'.$this->lang->switch_uri(site_url($_lang['slug'])).'"><img src="'.base_url('assets/icon/'.$_lang['slug'].'.png').'" style="width: 32px" /></a></li>';
								}
							?>
							<li>
								<button type="button" class="btn btn-sm bvi-open bg-white" style="border-radius: 50%; width: 35px; height: 35px" data-toggle="tooltip" data-placement="bottom" title="Версия для слабовидящих">
									<img src="<?=base_url('assets/public/images/icon/eye.png')?>">
								</button>
							</li>
                        </ul>
                    </div>
                    <div class="header-contact-info">
                        <ul>							
                            <li><span class="flaticon-phone text-white"></span><a href="tel:<?=str_replace(' ','',str_replace('-','',$this->settings->phone))?>"><?=$this->settings->phone?></a></li>
                            <li><span class="flaticon-mail text-white"></span><a href="mailto:nurota@nv.uz">nurota@nv.uz</a></li>
                        </ul>
                    </div>    
                </div>
            </div>  
        </div>    
    </div>
    <!--End Header Top-->
    <!--Start header-->
    <div class="header-style2">
        <div class="outer-container">
            <div class="outer-box clearfix">
                <!--Start Header Left-->
                <div class="header-left-style2 pull-left">
                    <div class="logo">
                        <a href="<?=site_url(LANG_URL)?>"><img src="<?=base_url($this->settings->logo)?>" alt="Awesome Logo" title="" style="width: 70%"></a>
                    </div>
                    <div class="nav-outer">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style2 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
									<?php
									  foreach ($this->cat as $cat) {
										// active class name: current
										  $child_menu = $this->menu_model->get_menu_child(LANG_URL,$cat['id_key']);
										  
										  if(count($child_menu) > 0){
											  $have_child = 'class="dropdown"';
										  }else{
											  $have_child = '';
										  }
										echo '<li '.$have_child.'><a href="'.site_url(LANG_URL.'/home/blog/'.$cat['alias']).'">'.$cat['title'].'</a>';

											
											echo "<ul>";
											  foreach ($child_menu as $child) {
												$child_menu2 = $this->menu_model->get_menu_child(LANG_URL,$child['id_key']);
												
												   
												if(count($child_menu2) > 0){
													echo '<li class="dropdown"><a href="'.site_url(LANG_URL.'/home/blog/'.$cat['alias'].'/'.$child['alias']).'">&nbsp;'.$child['title'].' </a>';
														echo "<ul>";
															foreach ($child_menu2 as $child2) {
															  echo '<li><a href="'.site_url(LANG_URL.'/home/blog/'.$cat['alias'].'/'.$child['alias'].'/'.$child2['alias']).'">&nbsp;&nbsp;&nbsp;'.$child2['title'].' </a></li>';
															}
														echo "</ul>";
													echo '</li>';
												}else{
													if($child['type']=='links'){

													  $link = $this->db->select('*')->where('id_category', $child['id_key'])->where('lang', LANG_URL)->get('links')->row();

													  if($link->target == '_blank'){
														$target = 'target="_blank"';
													  }else{
														$target = '';
													  }

													  echo '<li><a href="'.$link->link.'" '.$target.'>&nbsp;'.$child['title'].' </a></li>';
													}else{
													  echo '<li><a href="'.site_url(LANG_URL.'/home/blog/'.$cat['alias'].'/'.$child['alias']).'">&nbsp;'.$child['title'].' </a></li>';
													}
												}

											  }
											echo "</ul>";

										echo "</li>";
									  }
									?>
                                    
                                </ul>
                            </div>
                        </nav>                        
                        <!-- Main Menu End-->
                    </div> 
                </div>
                <!--End Header Left-->
                <!--Start Header Right-->
                <div class="header-right-style2 pull-right clearfix">
                    <div class="outer-search-box-style1">
                        <div class="seach-toggle"><i class="fa fa-search"></i></div>
                        <ul class="search-box">
                            <li>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="search" name="search" placeholder="Search Here" required="">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>        
                </div>
                <!--End Header Right-->
            </div>  
        </div>
    </div>
    <!--End header -->
    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container-fluid">
            <div class="clearfix">
                <!--Logo-->
                <div class="logo float-left">
                    <a href="<?=site_url(LANG_URL)?>" class="img-responsive"><img src="<?=base_url($this->settings->logo2)?>" alt="" title="" style="width: 70%;"></a>
                </div>
                <!--Right Col-->
                <div class="right-col">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>   
                </div>
            </div>
        </div>
    </div>
    <!--End Sticky Header-->
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="<?=base_url($this->settings->logo2)?>" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu --> 
</header>