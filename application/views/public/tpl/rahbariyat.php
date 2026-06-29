    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/public/img/bg-deatil.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2><?=@$this->menu_model->settings()->title?></h2>         
        <?php
          $this->mybreadcrumb->add(lang('home'), site_url());
          $this->mybreadcrumb->add(@$this->menu_model->settings()->title, current_url());
          echo $this->mybreadcrumb->render();
        ?>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">
          <?php
            foreach ($news as $key => $value) {
              echo '<div class="col-xl-4 col-md-6">
                      <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                          <img src="'.get_thumb($value['text']).'" class="img-fluid" alt="">
                        </div>

                        <div class="post-content d-flex flex-column">
                          <h3 class="post-title">'.character_limiter($value['title'],55).'</h3>
                          <hr>

                          <a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'" class="readmore stretched-link">
                            <span>'.lang('more').'</span>
                            <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>

                      </div>
                    </div>';
            }
          ?>
        </div><!-- End blog posts list --> 
      </div>
    </section><!-- End Blog Section -->