<?php

  include 'data-comments.php';

  $slug = $_GET['slug'];

  if (empty($slug))
  {
      die('Errore');
  }

  if (!array_key_exists($slug, $comments))
  {
      die('Chiave inesistente');
  }

  $commentiDisponibili = $comments[$slug];

  $json = json_encode($commentiDisponibili);

  echo $json;
?>
