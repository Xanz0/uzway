      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Создать меню</h4>
                    <?=form_open('admin/menu/insert_menu','id="menuForm"');?>
                    <div class="row clearfix">                      
                      <div class="col-12 pb-3">
                        <input class="btn btn-primary" type="submit" value="Сохранить" name="insert">  
                        <a href="<?=site_url('admin/menu')?>" onclick="return confirm('Вы уверены что хотите выйти?')" class="btn btn-danger">Закрыть</a>                  
                      </div>
                      <div class="col-8 mb-5">
                        <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                          <?php
                            foreach ($this->lang as $value) {

                              $var = lang_tab_selected_active($value['default']);
                              $icon = lang_icon($value['slug']);
                              
                              echo '<li class="nav-item">
                                    <a class="nav-link '.$var['active'].'" id="lang-'.$value['slug'].'-tab" data-toggle="pill" href="#lang-'.$value['slug'].'" role="tab" aria-controls="lang-'.$value['slug'].'" aria-selected="'.$var['selected'].'">
                                      <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i> '.$value['language_name'].'
                                    </a>
                                  </li>';
                            }
                          ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <?php
                            foreach ($this->lang as $value) {
                              
                              $var = lang_tab_selected_active($value['default']);
                              $icon = lang_icon($value['slug']);

                                  echo '<div class="tab-pane '.$var['active'].'" id="lang-'.$value['slug'].'" role="tabpanel" aria-labelledby="lang-'.$value['slug'].'-tab">';
                                          echo 
                                          '
                                          <div class="row">
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label for="title-'.$value['slug'].'">Заголовок * <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                                <input id="title-'.$value['slug'].'" class="form-control" name="title-'.$value['slug'].'" minlength="2" type="text" required>
                                              </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label for="alias-'.$value['slug'].'">Алиас *  <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i> <span class="text-muted">(Faqat lotincha harflarda)</span></label>
                                                <input id="alias-'.$value['slug'].'" class="form-control" name="alias-'.$value['slug'].'" minlength="2" type="text" placeholder="Avtomatik tarzda yaratiladi" required>
                                              </div>
                                            </div>
                                            <div class="col-sm-12">
                                              <div class="form-group">
                                                <textarea class="textarea" name="text-'.$value['slug'].'" > </textarea>
                                              </div>
                                            </div>
                                          </div>

                                          <script type="text/javascript">
                                            $("#title-'.$value['slug'].'").on("input", function() {
                                              var dInput = this.value;
                                              $("#alias-'.$value['slug'].'").val(alias(dInput));
                                            });
                                          </script>
                                          ';
                                echo '</div>';
                            }
                          ?>
                        </div>
                      </div> <!-- /col-8 -->         
                      <div class="col-4 pt-5">
                        <div class="form-group">
                          <label for="id_category">Родительский элемент</label>
                          <select class="js-example-basic-single w-100" name="id_category" required>
                            <option value="0">Корневой пункт меню</option>
                            <?php
                              foreach ($cats as $cat) {
                                echo '<option value="'.$cat['id_key'].'">'.$cat['title'].'</option>';

                                $child_menu = $this->menu_model->get_menu_child('uz',$cat['id_key']);
                                  foreach ($child_menu as $child) {
                                    echo '<option value="'.$child['id_key'].'"> - '.$child['title'].'</option>';
                                    
                                    $child_menu2 = $this->menu_model->get_menu_child('uz',$child['id_key']);
                                    foreach ($child_menu2 as $child2) {
                                      echo '<option value="'.$child2['id_key'].'"> -- '.$child2['title'].'</option>';
                                    }
                                  }
                              } 
                            ?>
                          </select>
                        </div>
                      
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label text-danger font-weight-bold">
                              <input type="checkbox" class="form-check-input" name="visibility" value="1" checked>
                              Опубликовать
                            </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Тип меню *</label>
                        <div class="accordion accordion-multi-colored" id="menu_types" role="tablist">
                          <?php 
                            $groups = [];
                            foreach($this->menu_type as $row) {
                              $groups[$row['main_title']][]=$row;
                            }

                            foreach ($groups as $group_name => $group_types) {
                              echo '<div class="card">
                                <div class="card-header" role="tab" id="menu_type_heading">
                                  <h6 class="mb-0">
                                    <a data-toggle="collapse" href="#'.str_replace(' ','-',$group_name).'" aria-expanded="false" aria-controls="menu_type_collapse">
                                      '.$group_name.'
                                    </a>
                                  </h6>
                                </div>
                                <div id="'.str_replace(' ','-',$group_name).'" class="collapse" role="tabpanel" aria-labelledby="menu_type_heading" data-parent="#menu_types">
                                  <div class="card-body">';
                                    echo '<ul class="list-group list-group-flush">';
                                      
                                      foreach ($group_types as $type) {
                                          if($type['title']){
                                            echo '<li class="list-group-item">
                                                    <div class="form-check">
                                                      <label class="form-check-label text-primary font-weight-bold">
                                                        <input type="radio" class="form-check-input" name="type" value="'.$type['alias'].'" required>
                                                        '.$type['title'].'
                                                      </label>
                                                      <small class="text-muted">
                                                        '.$type['description'].'
                                                      </small>
                                                    </div>
                                                  </li>';
                                          }else{
                                            echo "Нет данных!";
                                          }
                                      }
                                      
                                    echo '</ul>';
                                echo '</div>
                                </div>
                              </div>';
                            }
                          ?>                          
                        </div>
                        </div>
                      </div>             
                    </div> <!-- /.row -->

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