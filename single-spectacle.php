<?
global $post;
$spectacle = $post;
$fullPage = !isset($_GET['dialog']);

if($fullPage) {
  get_header('compiled');
  ?>
  <div class="page__fulldialog">
    <div class="inner">
      <?
      get_view('spectacleDialog');
      ?>
    </div>
  </div>
  <?
  get_footer('compiled');
} else {
    get_view('spectacleDialog');
}
?>
