<!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?=site_url(LANG_URL)?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/assets/public/img/logo-uzway.svg" alt="">
        <h1 style="font-size: 15px">“NAVOIY MINTAQAVIY YO’LLARGA <br>BUYURTMACHI XIZMATI” <span>DUK</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#" class="active">Bosh sahifa</a></li>
          <?php
            foreach ($this->cat as $cat) {
            // active class name: current
              $child_menu = $this->menu_model->get_menu_child(LANG_URL,$cat['id_key']);
              
              if(count($child_menu) > 0){
                $have_child = 'class="dropdown"';
                $icon = ' <i class="bi bi-chevron-down dropdown-indicator"></i>';
              }else{
                $have_child = '';
                $icon = '';
              }
            echo '<li '.$have_child.'><a href="'.site_url(LANG_URL.'/home/blog/'.$cat['alias']).'">'.$cat['title'].$icon.'</a>';

              
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
           
           <?php
                foreach ($this->_lang as $key => $_lang) {
                  if($key == 0){
                    $st = 'style="margin-left: 20px"';
                  }else{$st='';}
                  echo '<li '.$st.'><a href="'.$this->lang->switch_uri(site_url($_lang['slug'])).'"><img src="'.base_url('assets/icon/'.$_lang['slug'].'.png').'" style="width: 24px" /></a></li>';
                }
              ?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">