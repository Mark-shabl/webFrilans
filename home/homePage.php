<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';?>
<div class="container">
  <body>
    <div class="container-lg">
      <main>
        <div class="row g-3">
          <div class="col-md-3">
            <img src="<?= $_SESSION['user_data']['images_data']; ?>" alt="Ваш аватар" width="300" height="300">
            <h2><?= $_SESSION['user_data']['name_data'] . ' ' . $_SESSION['user_data']['ferstname_data']; ?></h2>
            <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
              <?  require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";
                  $id = $_SESSION['user_data']['id_data'];
                  $res = $mysqli->query("SELECT count(*) FROM Projects WHERE idUser = $id");
                  $row = $res->fetch_row();
                  $count = $row[0];
              ?>
              <div>
                <p class="small text-muted mb-1">Проекты</p>
                <p class="mb-0"><?= $count ;?></p>
              </div>
              <div class="px-3">
                <p class="small text-muted mb-1">Слушатели</p>
                <p class="mb-0">0</p>
              </div>
              <div>
                <p class="small text-muted mb-1">Рейтинг</p>
                <p class="mb-0">0</p>
              </div>
              <div class="px-3">
                <p class="small text-muted mb-1"> Заказы</p>
                <p class="mb-0">0</p>
              </div>
            </div>
            <p><?= $_SESSION['user_data']['about_me_data']; ?></p>
            <hr>
            <?php require_once __DIR__ . '/cohalNet.php'; ?>
            <hr>
            <p></p>
            <ul class="icon-list ps-0">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <div class="container text-center">
                        <div class="row">
                            <div class="col">
                              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Подписаться</button>
                            </div>
                            <div class="col">
                              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Сделать заказ</button>
                            </div>
                        </div>
                    </div>
                <?php require_once __DIR__ . '/modal.php'; ?>
                <?php require_once __DIR__ . '/modal2.php'; ?>
              </div>
            </ul>
          </div>
          <div class="col-9">
          <?php if(isset($_SESSION['аdd_folder'])):?>
                    <div class="alert alert-success" role="alert">
                    <h5><?= $_SESSION['аdd_folder'];?></h5>
                    </div>
                    <?php unset($_SESSION['аdd_folder']);?>
                  <?php endif;?>
                  <?php if(isset($_SESSION['аdd_folder_fail'])):?>
                    <div class="alert alert-success" role="alert">
                    <h5><?= $_SESSION['аdd_folder_fail'];?></h5>
                    </div>
                    <?php unset($_SESSION['аdd_folder_fail']);?>
                  <?php endif;?>
            <div class="row align-items-center">
              <div class="col">
                <h2>Мои проекты</h2>
              </div>
              <div class="col">
              </div>
              <div class="col">
              </div>
              <div class="col">
              <h5>Новый проект</h5>
              <button type="button" data-bs-toggle="modal" class="btn btn-success " data-bs-target="#exampleModal3">
                  <img src="https://img.icons8.com/?size=100&id=nUbUJ2mLVook&format=png&color=000000" width="25" height="25" alt="Новый тип проектов">
                </button>
                <?php require __DIR__ . '/modal_new_projects.php'; ?>
              </div>
            </div>
            <h5>Не все проекты являються рабочими и имеит общий доступ.</h5>
            <?php require_once __DIR__ . '/folder.php'; ?>
          </div>
        </div>
    </div>
  </body>
</div> 
</div> 
<?php require_once __DIR__ . '/footer.php'; ?>