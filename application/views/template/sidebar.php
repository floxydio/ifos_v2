<div class="navbar-title">
  <span>Main Navigation</span>
</div>
<ul class="main-navigation-menu">
  <?php
  foreach ($moduls as $modul) {
    $namamenu = $modul->nm_menu;
  ?>
    <li>
      <a href="#">
        <div class='item-content'>
          <div class='item-media'>
          </div>
          <div class='item-inner'>

            <span class='title'><?php echo $modul->nm_menu; ?></span>
            <i class='icon-arrow'></i>
          </div>
        </div>
      </a>
      <ul class='sub-menu'>
        <?php
        foreach ($menus as $menu) {
          if ($menu->id_menuutama == $modul->id_menu) {
            $submenu = $menu->nm_submenu;
        ?>
            <li>
              <a href="<?php echo base_url(); ?><?php echo $menu->linksub; ?>" class="menu__link">
                <span class='title'><?php echo $menu->nm_submenu; ?></span>
              </a>
            </li>
        <?php
          }
        }
        ?>
      </ul>
    </li>
  <?php
  }
  ?>

</ul>