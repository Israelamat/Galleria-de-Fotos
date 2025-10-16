<?php
require_once __DIR__ . '/../src/utils.class.php';
?>
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <li class="<?php echo (utils::esOpcionMenuActiva('/index.php') || utils::esOpcionMenuActiva('/')) ? 'active lien' : 'lien'; ?>">
          <a href="/templates/index.php"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/about.php') ? 'active lien' : 'lien'; ?>">
          <a href="/templates/about.php"><i class="fa fa-bookmark sr-icons"></i> About</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/blog.php') ? 'active lien' : 'lien'; ?>">
          <a href="/templates/blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/contact.php') ? 'active lien' : 'lien'; ?>">
          <a href="/templates/contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/galeria.php') ? 'active lien' : 'lien'; ?>">
          <a href="/templates/galeria.php"><i class="fa fa-file-text sr-icons"></i> Galeria</a>
        </li>
      </ul>
    </div>
  </div>
</nav>