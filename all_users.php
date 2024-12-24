<?php require_once __DIR__ . '/header.php'; ?>

<body>
  <?php
  require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";

  $info = [];

  if ($query = mysqli_query($mysqli, "SELECT *  FROM FrilansUser")) {
    $info = $query->fetch_all(MYSQLI_ASSOC);
  } else {
    print_r($mysqli->error_info);
  }
  ?>

  <div class="container">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
        </tr>
      </thead>
      <body>
        <?php foreach ($info as $data): ?>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img
                  src="<?= $data['images']; ?>"
                  alt=""
                  style="width: 45px; height: 45px"
                  class="rounded-circle" />
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?= $data['name'] . ' ' . $data['ferstname']; ?></p>
                  <p class="text-muted mb-0"><?= $data['login']; ?></p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $data['employment']; ?></p>
              <p class="text-muted mb-0"><?= $data['about_me']; ?></p>
            </td>
            <td>
            <?  require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";
                  $id = $data['id'];
                  $res = $mysqli->query("SELECT count(*) FROM Projects WHERE idUser = $id");
                  $row = $res->fetch_row();
                  $count = $row[0];
              ?>
              <p class="fw-normal mb-1">проектов</p>
              <span class="badge badge-success rounded-pill d-inline"><?= $count ;?></span>
            </td>
            <td>
              <p class="fw-normal mb-1">рейтинг</p>
              <span class="badge badge-success rounded-pill d-inline">0</span>
            </td>
            <td>
              <button type="submit" name='go' class="btn btn-success">Посмотреть</button>
            </td>
          </tr>
          <?php endforeach;
          $mysqli->close; ?>
      </tbody>
    </table>
  </div>
</body>
<?php require_once __DIR__ . '/footer.php'; ?>

</html>