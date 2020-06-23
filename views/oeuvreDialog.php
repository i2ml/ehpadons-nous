<?
global $oeuvre, $etablissement;
$etablissement = get_field('etablissement', $oeuvre->ID);

?>
<div class="oeuvreDialog">

  <div class="oeuvreDialog-content">
    <?= get_field('content', $oeuvre->ID) ?>
  </div>

  <hr>

  <div class="oeuvreDialog-artist">
    Oeuvre réalisée par <strong><?= $oeuvre->post_title ?></strong>
    dans l'établissement :
  </div>

  <?
  if($etablissement):
    get_view('etablissementPreview');
  endif;
  ?>

</div>
