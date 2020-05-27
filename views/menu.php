<div id="menu-scrolled-detector"></div>
<nav class="menu">
  <div class="menu-nav">
    <a href="#about">Notre approche</a>
    <span class="menu-sep">⬤</span>
    <a href="#offers">Votre projet</a>
  </div>

  <a class="menu-logo" href="#">
    <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-mini.png" alt="">
  </a>

  <div class="menu-nav">
    <a href="#references">Références</a>
    <span class="menu-sep">⬤</span>
    <a href="#contact">Nous contacter</a>
  </div>
</nav>

<script type="text/javascript">
  var observer = new IntersectionObserver(function(entries) {
    // no intersection with screen
    if(entries[0].intersectionRatio === 0)
      document.querySelector(".menu").classList.add("is-scrolled");
    // fully intersects with screen
    else if(entries[0].intersectionRatio === 1)
      document.querySelector(".menu").classList.remove("is-scrolled");
    }, { threshold: [0,1]
  });

  observer.observe(document.querySelector("#menu-scrolled-detector"));
</script>
