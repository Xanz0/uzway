<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo" style="font-size: 35px; font-weight: bold">
              <?=settings()->title?>
            </div>
            <?php 
              if(isset($message)){
                echo '<div class="alert alert-fill-danger" role="alert">
                  <i class="fa fa-exclamation-triangle"></i>
                  '.strip_tags($message).'
                </div>';
              }
            ?>           
            
            <?=form_open("login",'class="pt-3"');?>
              <div class="form-group">
                <label for="identity">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="fa fa-user text-primary"></i>
                    </span>
                  </div>
                  <input type="text" name="identity" class="form-control form-control-lg border-left-0" id="identity" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                      <i class="fa fa-lock text-primary"></i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password">                        
                </div>
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <?=form_checkbox('remember', '1', FALSE, 'class="form-check-input" id="remember"');?>
                    Keep me signed in
                  </label>
                </div>
              </div>
              <div class="my-3">
                <?=form_submit('submit', lang('login_submit_btn'),'class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"');?>
              </div>
            <?=form_close()?>
          </div>
        </div>
        <div class="col-lg-6 login-half-bg d-flex flex-row">
          <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <?=date('Y')?>  All rights reserved.</p>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->