      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-12">
              <div class="text-right">
                <a href="<?=site_url('admin/article/article_add')?>" class="btn btn-primary mb-3">Создать материал</a>
              </div>
              <?=alert('alert-success',$this->session->flashdata('msg'))?>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Материалы</h4>
                  <table class="table table-bordered" id="order-listing">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Sarlavha <i class="flag-icon flag-icon-uz" title="uz" id="uz"></th>
                        <th>Заголовок <i class="flag-icon flag-icon-ru" title="ru" id="ru"></th>
                        <th>Heading <i class="flag-icon flag-icon-gb" title="en" id="en"></th>
                        <th>Категория</th>
                        <th>Редактировать</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i=1;
                        foreach ($result as $key => $value) {

                          echo "<tr>
                                <td>".$i."</td>
                                <td>".$value["uz"]."</td>
                                <td>".$value["ru"]."</td>
                                <td>".$value["en"]."</td>
                                <td>".$value["cat_name"]."</td>
                                <td class='text-center'>
                                  <button type='button' class='btn btn-sm btn-primary btn-rounded btn-icon' onclick='location.href=\"".site_url('admin/article/edit/'.$value['id_key'])."\"'>
                                    <i class='fa fa-edit'></i>
                                  </button>
                                  <button type='button' class='btn btn-sm btn-danger btn-rounded btn-icon deleteArticle' data-xkey='".$value['id_key']."'>
                                    <i class='fa fa-trash'></i>
                                  </button>
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

        <!-- content-wrapper ends -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Авторские права <a href="https://www.ncc.uz/" target="_blank">NCC</a> © <?=date('Y')?> Все права защищены...</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Ручная работа и сделано с <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->