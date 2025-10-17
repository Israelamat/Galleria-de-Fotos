<?php require_once __DIR__ . '/../inicio.part.php'; ?>


<!-- Navigation Bar -->
<?php require_once __DIR__ . '/../navegacion.part.php';
?>
<!-- End of Navigation Bar -->

<!-- Principal Content Start -->
<div id="index">

  <!-- Header -->
  <div class="row">
    <div class="col-xs-12 intro">
      <div class="carousel-inner">
        <div class="item active">
          <img class="img-responsive" src="/public/images/index/woman.jpg" alt="header picture">
        </div>
        <div class="carousel-caption">
          <h1>FIND NICE PICTURES HERE</h1>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div id="index-body">
    <!-- Pictures Navigation table -->
    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <td><a class="link active" href="#category1" data-toggle="tab">category I</a></td>
            <td><a class="link" href="#category2" data-toggle="tab">category II</a></td>
            <td><a class="link" href="#category3" data-toggle="tab">category III</a></td>
          </tr>
        </thead>
      </table>
      <hr>
    </div>

    <!-- Navigation Table Content -->
    <div class="tab-content">

      <?php
      // Primera categoría
      $idCategoria = 1;
      shuffle($imagenesHome);
      $imagenesCategoria = array_slice($imagenesHome, 0, 4);
      require __DIR__ . '/../imagenindex.part.php';

      // Segunda categoría
      $idCategoria = 2;
      shuffle($imagenesHome);
      $imagenesCategoria = array_slice($imagenesHome, 4, 4);
      require __DIR__ . '/../imagenindex.part.php';

      // Tercera categoría
      $idCategoria = 3;
      shuffle($imagenesHome);
      $imagenesCategoria = array_slice($imagenesHome, 8, 4);
      require __DIR__ . '/../imagenindex.part.php';
      ?>

      <!-- Newsletter form -->
      <div class="index-form text-center">
        <h3>SUSCRIBE TO OUR NEWSLETTER </h3>
        <h5>Suscribe to receive our News and Gifts</h5>
        <form class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
              <input class="form-control" type="text" placeholder="Type here your email address">
              <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a>
            </div>
          </div>
        </form>
      </div>
      <!-- End of Newsletter form -->

      <!-- Box within partners name and logo -->
      <?php require_once __DIR__  . '/../indexlogos.view.part.php';?>
      <!-- End of Box within partners name and logo -->

    </div><!-- End of index box -->

    <!-- Footer -->
    <?php require_once __DIR__ . '/../fin.part.php'; ?>