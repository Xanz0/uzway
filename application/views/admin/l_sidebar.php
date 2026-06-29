<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="<?=base_url(settings()->logo)?>" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Вы вошли как админ
                </p>
                <p class="designation">
                 	<?=settings()->site_name?>
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('admin/dashboard')?>">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Главная</span>
            </a>
          </li>
          <?php if($this->ion_auth->is_admin()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('admin/article')?>">
                <i class="fa fa-file-word menu-icon"></i>
                <span class="menu-title">Материалы</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('admin/menu')?>">
                <i class="fa fa-list menu-icon"></i>
                <span class="menu-title">Меню</span>
              </a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="<?=base_url('admin/service')?>">
                <i class="fa fa-list menu-icon"></i>
                <span class="menu-title">Rahbariyat</span>
              </a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('admin/settings')?>">
                <i class="fa fa-cog menu-icon"></i>
                <span class="menu-title">Настройки сайта</span>
              </a>
            </li>

          <?php endif; ?>
            
        </ul>
      </nav>
      <!-- partial -->