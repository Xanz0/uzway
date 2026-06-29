<main id="main">

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

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">
              <?php if(!empty($result)): ?>

              <!-- <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div> -->

              <h2 class="title"><?=$result->title?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i> 
                    <time datetime="<?=nice_date($result->created,'d.m.Y')?>"><?=nice_date($result->created,'d.m.Y H:i')?></time>
                  </li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p><?=$result->text?></p>
              </div><!-- End post content -->
              <?php endif; ?>
            </article><!-- End blog post -->
            

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title"><?=lang('search')?></h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn--> 

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title"><?=lang('resent_posts')?></h3>

                <div class="mt-3">

                  <?php
                    foreach ($this->lastNews as $key => $value) {
                      echo '<div class="post-item mt-3">
                              <img src="'.get_thumb($value['text']).'"  alt="'.$value['title'].'">
                              <div>
                                <h4><a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'">'.character_limiter(strip_tags($value['title']),20).'</a></h4>
                                <time datetime="'.nice_date($value['created'],'d.m.Y').'">'.nice_date($value['created'],'d.m.Y').'</time>
                              </div>
                            </div>';
                    }
                  ?>

                </div>

              </div><!-- End sidebar recent posts-->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->