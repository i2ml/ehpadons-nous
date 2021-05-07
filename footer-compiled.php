<footer class="footer">
    <div class="inner">
        <div class="footer-organizer">
            <span>organisé par :</span>
            <a href="http://www.i2ml.fr/" target="_blank"
               title="le Festival EHPAD'ons-nous! est organisé par la fondation i2ml">
                <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-i2ml.png" alt="Logo i2ml">
            </a>
        </div>
        <div class="footer-nav">
            <? wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer-menu']) ?>
            <hr>
            <a href="https://www.facebook.com/EHPADONSNOUS/" target="_blank" class="footer-social">
                <? icon('facebook') ?>
                Suivez nous !
            </a>
        </div>
    </div>
</footer>

</div><!-- .wrapper -->

<div class="dialog" id="dialog">
    <div class="dialog-inner">
        <div class="dialog-mask" data-dialog="close"></div>
        <div class="dialog-body"></div>
    </div>
</div>

<div id="svg-store"><!-- inject:svg -->
    <svg xmlns="http://www.w3.org/2000/svg">
        <symbol id="icon-close" viewBox="0 0 24 24">
            <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
        </symbol>
        <symbol id="icon-facebook" viewBox="0 0 24 24">
            <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/>
        </symbol>
        <symbol id="icon-marker" viewBox="0 0 24 24">
            <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
        </symbol>
        <symbol id="icon-menu" viewBox="0 0 24 24">
            <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
        </symbol>
        <symbol id="icon-time" viewBox="0 0 24 24">
            <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
        </symbol>
    </svg><!-- endinject --></div>

<? wp_footer() ?>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/app.js?noCache=f8e75fa6"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167999934-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-167999934-1');
</script>


</body>
</html>
