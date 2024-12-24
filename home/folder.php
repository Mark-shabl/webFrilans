<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";

  $info = [];

  if ($query = mysqli_query($mysqli, "SELECT *  FROM PackProjects")) {
    $info = $query->fetch_all(MYSQLI_ASSOC);
  } else {
    print_r($mysqli->error_info);
  }
  ?>

<div class="container">
  <div class="accordion" id="accordionExample">
    <!-- начало акордиона который всегда будет создаваться -->
    <?php foreach ($info as $data): ?>
      <?php if($data['idUser'] == $_SESSION['user_data']['id_data']):?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?= $data['id']; ?>">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $data['id']; ?>" aria-expanded="false" aria-controls="collapseTwo">
          <?= $data['folderName']; ?>
          </button>
        </h2>
        <div id="collapse<?= $data['id']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $data['id']; ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          <!-- карточка -->
         
                <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4">
            <div class="container text-center">
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                            <button type="button" data-bs-toggle="modal" class="btn btn-success " data-bs-target="#exampleModal3">
                  <img src="https://img.icons8.com/?size=100&id=nUbUJ2mLVook&format=png&color=000000" width="25" height="25" alt="Новый тип проектов">
                </button>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
            </div>
          </div><br>

          <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";

          $infoProjects = [];

          if ($query = mysqli_query($mysqli, "SELECT *  FROM Projects")) {
            $infoProjects = $query->fetch_all(MYSQLI_ASSOC);
          } else {
            print_r($mysqli->error_info);
          }
          ?>
          <?php foreach ($infoProjects as $dataProjects): ?>
          <?php if($dataProjects['idPack'] == $data['id']):?>
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="<?= $dataProjects['image']; ?>"
                  alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-1"><?= $dataProjects['nameProject']; ?></h5>
                  <p class="mb-2 pb-1"><?= $dataProjects['description']; ?></p>
                </div>
                <div class="flex-grow-3 ms-3">
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-secondary mb-3">изминить</button>
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger mb-4">удалить</button>
                </div>
              </div>
            </div>
          </div><br>
          <?php endif;?>
          <?php endforeach; 
          $mysqli->close; ?>
          <!-- карточка -->
        </div>
        </div>
      </div>
      <?php endif;?>
      <?php endforeach; 
      $mysqli->close; ?>
      <!-- конец акордиона который всегда будет создаваться -->
      <!-- начало акордиона кнопки создания -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button type="button" class="accordion-button collapsed" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                <img src="https://img.icons8.com/?size=100&id=nUbUJ2mLVook&format=png&color=000000" width="25" height="25" alt="Новый тип проектов">
            </button>
            <?php require_once __DIR__ . '/modal_add_filder.php'; ?>
        </h2>
      </div>
      <!-- конец акордиона кнопки создания -->
    </div>