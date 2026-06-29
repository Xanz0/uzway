      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Редактировать материал</h4>
                    <?=form_open('admin/article/update','id="articleForm"');?>
                    <div class="row clearfix">
                      <div class="col-12 pb-3">
                        <input class="btn btn-primary" type="submit" name="update" value="Сохранить">
                        <a href="<?=site_url('admin/article')?>" onclick="return confirm('Вы уверены что хотите выйти?')" class="btn btn-danger">Закрыть</a>
                      </div>
                      <div class="col-8">
                        <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                          <?php
                            $i = 1;
                            foreach ($this->lang as $value) {
                              if($i == 1){
                                $active = 'active';
                                $selected = 'selected';
                              }else{
                                $active = '';
                                $selected = '';
                              }

                              $icon = lang_icon($value['slug']);

                              echo '<li class="nav-item">
                                    <a class="nav-link '.$active.'" id="lang-'.$value['slug'].'-tab" data-toggle="pill" href="#lang-'.$value['slug'].'" role="tab" aria-controls="lang-'.$value['slug'].'" aria-selected="'.$selected.'">
                                      <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i> '.$value['language_name'].'
                                    </a>
                                  </li>';
                              $i++;
                            }
                          ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <?php
                            $i = 1;
                            foreach ($this->lang as $value) {

                              if($i == 1){
                                $active = 'active';
                              }else{
                                $active = '';
                              }

                              $art = $this->article_model->_by_id_lang($this->uri->segment(4),$value['slug']);

                              //var_dump($art);
                              $icon = lang_icon($value['slug']);

                                  echo '<div class="tab-pane '.$active.'" id="lang-'.$value['slug'].'" role="tabpanel" aria-labelledby="lang-'.$value['slug'].'-tab">';
                                          echo
                                          '
                                            <div class="form-group">
                                              <label for="title-'.$value['slug'].'">Заголовок * <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <input id="title-'.$value['slug'].'" class="form-control" name="title-'.$value['slug'].'" minlength="2" type="text" value="'.$art->title.'" required>
                                            </div>
                                            <div class="form-group">
                                              <textarea class="textarea" name="text-'.$value['slug'].'" required>'.$art->text.'</textarea>
                                            </div>

                                            <div class="form-group">
                                              <label for="source">Источник:</label>
                                              <input type="text" name="source-'.$value['slug'].'" value="'.$art->source.'" class="form-control" />
                                            </div>
                                          ';
                                echo '</div>';
                                echo '<input type="hidden" name="id-'.$value['slug'].'" value="'.$art->id.'">';
                              $i++;
                            }
                          ?>
                        </div>
                      </div> <!-- /col-8 -->
                      <div class="col-4 pt-5">

                        <div class="form-group">
                          <label for="id_category">Категория *</label>
                          <select class="js-example-basic-single w-100" name="id_category[]" multiple required>
                            <option value="">Выберите...</option>
                            <?php
							  $artX = $this->article_model->_by_id_lang($this->uri->segment(4),'uz');
							  
                              $re = $this->admin_model->_by_menu_lang($artX->id_key,'uz');
                              $check = array();
                              foreach($re as $row){
                                  $check[$row['id_category']] = true;
                              }

                              foreach ($cats as $cat) {
                                $sel = '';
                                if (isset($check[$cat['id_key']])) {
                                    $sel = 'selected';
                                }
                                echo '<option value="'.$cat['id_key'].'" '.$sel.'>'.$cat['title'].'</option>';

                                $child_menu = $this->menu_model->get_menu_child('uz',$cat['id_key']);
                                  foreach ($child_menu as $child) {
                                    $sel2 = '';
                                    if (isset($check[$child['id_key']])) {
                                        $sel2 = 'selected';
                                    }
                                    echo '<option value="'.$child['id_key'].'" '.$sel2.'> - '.$child['title'].'</option>';

                                    $child_menu2 = $this->menu_model->get_menu_child('uz',$child['id_key']);
                                    foreach ($child_menu2 as $child2) {
                                      $sel3 = '';
                                      if (isset($check[$child2['id_key']])) {
                                          $sel3 = 'selected';
                                      }
                                      echo '<option value="'.$child2['id_key'].'" '.$sel3.'> -- '.$child2['title'].'</option>';

                  										$child_menu3 = $this->menu_model->get_menu_child('uz',$child2['id_key']);
                  										foreach ($child_menu3 as $child3) {
                  											$sel4 = '';
                  											if (isset($check[$child3['id_key']])) {
                  												$sel4 = 'selected';
                  											}
                  										  echo '<option value="'.$child3['id_key'].'" '.$sel4.'> --- '.$child3['title'].'</option>';
                  										}
                                    }
                                  }
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="created">Дата:</label>
                          <input type="text" name="updated" value="<?=date('Y-m-d H:i:s')?>" class="form-control" />
                        </div>
                        <div class="form-group">
                          <div class="form-check">
                            <?php
                              if($artX->visibility == 1){
                                $checked = 'checked';
                              }else{
                                $checked = '';
                              }
                            ?>
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="visibility" <?=$checked?> >
                              Опубликовать
                            </label>
                          </div>
                        </div> 
 

                      </div> <!-- /col-4 -->

                      <input type="hidden" name="key_article" value="<?=$artX->id_key?>">
                    </div>
                  <?=form_close();?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Авторские права <a href="https://www.ncc.uz/" target="_blank">NCC</a> © <?=date('Y')?> Все права защищены... </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Ручная работа и сделано с <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
