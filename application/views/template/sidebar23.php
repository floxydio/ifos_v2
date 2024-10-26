 <div class="navbar-title">
   <span>Main Navigation</span>
 </div>
 <ul class="main-navigation-menu">
   <?php
    foreach ($moduls as $modul) {
    ?>
     <li>
       <a href="#">
         <div class='item-content'>
           <div class='item-media'>
           </div>
           <div class='item-inner'>

             <span class='title'><? echo $modul->nm_menu; ?></span>
             <i class='icon-arrow'></i>
           </div>
         </div>
       </a>
       <ul class='sub-menu'>
         <?php
          foreach ($menus as $menu) {
            if ($menu->id_menuutama == $modul->id_menu) {
          ?>
             <li>
               <a class="active" href="<?php echo base_url(); ?><? echo $menu->linksub; ?>">
                 <span class='title'><? echo $menu->nm_submenu; ?></span>
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