<div id="category<?= $idCategoria ?>" class="tab-pane<?= $idCategoria === 1 ? ' active' : '' ?>">
  <div class="row popup-gallery">
    <?php foreach ($imagenesCategoria as $imagen): ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="sol">
          <img class="img-responsive"
            src="<?= $imagen->getUrlPortfolio() ?>"
            alt="<?= $imagen->getDescripcion() ?>">
          <div class="behind">
            <div class="head text-center">
              <ul class="list-inline">
                <li>
                  <a class="gallery" href="<?= $imagen->getUrlGaleria() ?>" data-toggle="tooltip" data-original-title="Quick View">
                    <i class="fa fa-eye"></i>
                  </a>
                </li>
                <li><a href="#" data-toggle="tooltip" data-original-title="Like"><i class="fa fa-heart"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-original-title="Download"><i class="fa fa-download"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-original-title="Info"><i class="fa fa-info"></i></a></li>
              </ul>
            </div>
            <div class="row box-content">
              <ul class="list-inline text-center">
                <li><i class="fa fa-eye"></i> <?= $imagen->getNumVisualizaciones() ?></li>
                <li><i class="fa fa-heart"></i> <?= $imagen->getNumLikes() ?></li>
                <li><i class="fa fa-download"></i> <?= $imagen->getNumDownloads() ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <nav class="text-center">
    <ul class="pagination">
      <li class="<?= $idCategoria === 1 ? 'active' : '' ?>"><a href="#">1</a></li>
      <li class="<?= $idCategoria === 2 ? 'active' : '' ?>"><a href="#">2</a></li>
      <li class="<?= $idCategoria === 3 ? 'active' : '' ?>"><a href="#">3</a></li>
      <li><a href="#" aria-label="Siguiente"><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
  </nav>
</div>