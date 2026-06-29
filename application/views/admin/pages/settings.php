      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
            
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Настройки сайта</h4>
                   
                    <?=form_open('admin/settings/settings_update')?>
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
                            $settings = $this->others_model->settings($value['slug']);

                            $var = lang_tab_selected_active($value['default']);
                            $icon = lang_icon($value['slug']);

                                echo '<div class="tab-pane '.$var['active'].'" id="lang-'.$value['slug'].'" role="tabpanel" aria-labelledby="lang-'.$value['slug'].'-tab">';
                                        echo 
                                        '
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <div class="form-group">
                                              <label for="title-'.$value['slug'].'">Sarlavha * <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <input id="title-'.$value['slug'].'" class="form-control" name="title-'.$value['slug'].'" minlength="2" type="text" value="'.$settings->title.'" required>
                                            </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="phone">Aloqa raqami * <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <input id="phone" class="form-control" name="phone" minlength="2" type="text" value="'.$settings->phone.'" required>
                                            </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="phone2">Ishonch telefoni * <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <input id="phone2" class="form-control" name="phone2" minlength="2" type="text" value="'.$settings->phone2.'" required>
                                            </div>
                                          </div>

                                          <div class="col-sm-12">
                                            <div class="form-group">
                                              <label for="address-'.$value['slug'].'">Manzil* <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <input id="address-'.$value['slug'].'" class="form-control" name="address-'.$value['slug'].'" minlength="2" type="text" value="'.$settings->address.'" required>                                              
                                            </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="footer_about-'.$value['slug'].'">Footer biz haqimizda* <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <textarea class="form-control" rows="10" name="footer_about-'.$value['slug'].'">'.$settings->footer_about.'</textarea>
                                            </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="about_text-'.$value['slug'].'">Biz haqimizda matn* <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                              <textarea class="form-control" rows="10" name="about_text-'.$value['slug'].'">'.$settings->about_text.'</textarea>
                                            </div>
                                          </div>
                                        </div> 
                                        ';
                              echo '</div>';
                          }
                        ?>
                      </div>
                      <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" name="update" value="Yangilash">
                      </div>
                    <?=form_close()?> 
                </div>
              </div>
            </div>

            <!--div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Филиалы</h4>
                   
                    <?=form_open()?>
                      <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                        <?php
                          foreach ($this->lang as $value) {

                            $var = lang_tab_selected_active($value['default']);
                            $icon = lang_icon($value['slug']);
                            
                            echo '<li class="nav-item">
                                  <a class="nav-link '.$var['active'].'" id="filial-'.$value['slug'].'-tab" data-toggle="pill" href="#filial-'.$value['slug'].'" role="tab" aria-controls="filial-'.$value['slug'].'" aria-selected="'.$var['selected'].'">
                                    <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i> '.$value['language_name'].'
                                  </a>
                                </li>';
                          }
                        ?>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <?php
                          foreach ($this->lang as $value) {
                            $filial = $this->admin_model->filial($value['slug']);

                            $var = lang_tab_selected_active($value['default']);
                            $icon = lang_icon($value['slug']);

                                echo '<div class="tab-pane '.$var['active'].'" id="filial-'.$value['slug'].'" role="tabpanel" aria-labelledby="filial-'.$value['slug'].'-tab">';
                                        echo '<div class="row">';
                                          foreach ($filial as $key => $f_value) {
                                            echo '<div class="col-sm-12">
                                                    <div class="form-group">
                                                      <label for="place-'.$value['slug'].'">Filial ('.($key+1).') * <i class="flag-icon flag-icon-'.$icon.'" title="'.$icon.'" id="'.$icon.'"></i></label>
                                                      <input id="place-'.$value['slug'].'" class="form-control" name="place-'.$value['slug'].'" minlength="2" type="text" value="'.$f_value['place'].'" required>
                                                    </div>
                                                  </div>';
                                          }
                                        echo '</div>';
                              echo '</div>';
                          }
                        ?>
                      </div>
                      <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" name="update" value="Yangilash">
                      </div>
                    <?=form_close()?> 
                </div>
              </div>
            </div-->
          </div>
        </div>
        <!-- content-wrapper ends -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Авторские права <a href="https://www.alimov.uz/" target="_blank">@akaabbos</a> © <?=date('Y')?> Все права защищены...</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Ручная работа и сделано с <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->