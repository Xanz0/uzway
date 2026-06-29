
  </main>
  <!-- ======= Footer ======= -->

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12211.362530692835!2d65.39990124649773!3d40.078966814636374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f51c3235079d9c7%3A0xaef3fd2389aa60f1!2sNavoiy%20Mintaqaviy%20yo&#39;llarga%20buyurtmachi%20xizmati%20DUK!5e0!3m2!1sru!2s!4v1677065475466!5m2!1sru!2s" height="350" style="border:0; width: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h4><?=$this->settings->title?></h4>
              <p>
                <?=$this->settings->address?><br>
                <strong><?=lang('phone')?>:</strong> <?=$this->settings->phone?><br>
                <strong><?=lang('email')?>:</strong> nav.mintaqaviy@uzavtoyul.uz<br>
              </p>
              <div class="social-links d-flex mt-3">
                <?php
                  $social = $this->others_model->social();

                  foreach($social as $link){
                    echo '<a href="'.$link['link'].'" class="d-flex align-items-center justify-content-center" target="_blank"> 
                            <img src="'.base_url('assets/icon/'.$link['icon']).'" style="width: 32px"></img> 
                          </a>';
                  }
                ?>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4><?=lang('useful_links')?></h4>
            <ul>
              <li><a href="http://my.gov.uz">My.gov.uz</a></li>
              <li><a href="http://lex.uz">Lex.Uz</a></li>
              <li><a href="http://mintrans.uz">Mintrans.Uz</a></li>
              <li><a href="http://president.uz">President.Uz</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-4 col-md-3 footer-links">
            <h4><?=lang('about')?></h4>
            <ul>
              <li><a href="#"><i class="fas fa-map-marker-alt"></i> <?=$this->settings->address?></a></li>
              <li><a href="#"><i class="fa fa-phone"></i> <?=$this->settings->phone?></a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> nav.mintaqaviy@uzavtoyul.uz</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4><?=lang('cats')?></h4>
            <ul>
              <?php
                  $menu = $this->menu_model->get_menu($this->uri->segment(1));

                  foreach ($menu as $key => $value) {
                      echo '<li><a href="'.site_url(LANG_URL.'/home/blog/'.$value['alias']).'">'.$value['title'].'</a></li>';
                  }
              ?>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>uzway.uz</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          By <a href="https://ncc.uz/">NCC</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>