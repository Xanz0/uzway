
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">

    
    
      <div class=" section-header">
        <span class="sh-icon"><i class="bi bi-newspaper"></i></span>
        <h2><?=lang('news')?></h2>
      </div>

      <div class="row gy-5">
        <?php
          foreach ($news as $key => $value) {

            echo '<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="post-item position-relative h-100">

                <div class="post-img position-relative overflow-hidden">
                  <img src="'.get_thumb($value['text']).'" class="img-fluid" style="width: 100%" alt="">
                  <span class="post-date"><i class="bi bi-calendar3"></i> '.nice_date($value['created'],'d.m.Y').'</span>
                </div>

                <div class="post-content d-flex flex-column">

                  <h3 class="post-title">'.character_limiter($value['title'],55).'</h3>

                  <hr>

                  <a href="'.site_url(LANG_URL.'/view/'.$value['id_key'].'-'.$value['alias'].'.html').'" class="readmore stretched-link"><span>'.lang('more').'</span><i class="bi bi-arrow-right"></i></a>

                </div>

              </div>
            </div>';
          }
        ?>
      </div>

      </div>
    </section>
    