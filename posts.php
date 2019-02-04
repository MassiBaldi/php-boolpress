<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posts</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <?php include 'database.php'; ?>

      <?php
        $getTag = $_GET['tag'];

        if (empty($getTag)) {
          $title = 'Tutti i Posts :';
          $postsDaStampare = $posts;
        }
        else {
          $title = 'Tutti i post del tag: '. $getTag;
          $postsDaStampare = [];

          foreach ($posts as $post)
          {
            if (in_array($getTag, $post['tag']))
            {
              $postsDaStampare[] = $post;
            }
          }
        }
      ?>

      <h1><?php echo $title; ?></h1>

      <?php foreach ($postsDaStampare as $post) { ?>
        <?php
          $date = DateTime::createFromFormat('d/m/Y H:i:s', $post['published_at']);
        ?>
        <h3>
          <a href="http://localhost/php-boolpress/post-details.php?slug=<?php echo $post['slug']; ?>"><?php echo $post['title']; ?>
          </a>
        </h3>

        <small>Pubblicato il <?php echo $date->format('d F'); ?> alle <?php echo $date->format('H'); ?></small>

        <p><?php echo substr($post['content'], 0, 150) . '...'?></p>
      <?php } ?>

    </div>

  <script src="main.js"></script>
  </body>
</html>
