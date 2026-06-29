      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-12">
              <div class="text-right">
                <a href="<?=site_url('admin/menu/add_menu')?>" class="btn btn-primary mb-3">Создать пункт меню</a>
              </div>
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data table</h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">                        
                        <table id="order-listing" class="table table-bordered">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Родительский элемент</th>
                                <th>Nomlanishi <i class="flag-icon flag-icon-uz" title="uz" id="uz"></i></th>
                                <th>Название <i class="flag-icon flag-icon-ru" title="ru" id="ru"></i></th>
                                <th>Name <i class="flag-icon flag-icon-gb" title="gb" id="gb"></i></th>
                                <th>Тип меню</th>
                                <th>Редактировать</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $i = 1;
                              foreach ($cat_list as $value) {
                                $icon = lang_icon($value['lang']);

                                echo "<tr>
                                  <td class='text-center'>".$i."</td>
                                  <td>".cat_parent($value['id_parent'],$value['ru'])."</td>
                                  <td>
                                    ".$value['uz']."
                                  </td>
                                  <td>
                                    ".$value['ru']."
                                  </td>
                                  <td>
                                    ".$value['en']."
                                  </td>
                                  <td>
                                    <p>".$value['title']."</p>
                                    <small class='text-muted'>".$value['description']."</small>
                                  </td>
                                  <td class='text-center'>
                                    <button type='button' class='btn btn-sm btn-primary btn-rounded btn-icon' onclick='location.href=\"".site_url('admin/menu/edit/'.$value['id_key'])."\"'>
                                      <i class='fa fa-edit'></i>
                                    </button>
                                    <!--button type='button' class='btn btn-sm btn-danger btn-rounded btn-icon'>
                                      <i class='fa fa-trash'></i>
                                    </button-->
                                  </td>
                                </tr>";
                                $i++;
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
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