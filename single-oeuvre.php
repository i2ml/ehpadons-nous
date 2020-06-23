<?
global $post;
$oeuvre = $post;
$fullPage = !isset($_GET['dialog']);

if($fullPage) {
  get_header('compiled');
  ?>
  <div class="page__fulldialog">
    <div class="inner">
      <?
      get_view('oeuvreDialog');
      ?>
    </div>
  </div>
  <?
  get_footer('compiled');
} else {
    get_view('oeuvreDialog');
}
?>
