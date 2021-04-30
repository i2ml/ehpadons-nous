<nav class="mobileNav">
  <a href="#" class="mobileNav-close" data-mobilenav="toggle">
    <? icon('close') ?>
  </a>
  <div class="mobileNav-content">
    <? wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'menu_class' => 'mobileNav-menu']) ?>
  </div>
</nav>
