<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";
  $info = [];
  if ($query = mysqli_query($mysqli, "SELECT *  FROM PackProjects")) {
    $info = $query->fetch_all(MYSQLI_ASSOC);
  } else {
    print_r($mysqli->error_info);
  }
  ?>
<form method="get"  action="add_project.php" >
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Новый проект</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="formFile" class="form-label">Изображения проекта</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <input type="text" class="form-control" maxlength="50" required name='nameProject' placeholder="название проекта" aria-label="First name">
            <br>
            <textarea class="form-control" name="description" maxlength="255" placeholder="Описание проекта" id="contentbox" rows="3"></textarea>
            <br>
            <select class="form-select" name="idPack" aria-label="Default select example">
                <option selected>Выбирете папку</option>
                <?php foreach ($info as $data): ?>
                <?php if($data['idUser'] == $_SESSION['user_data']['id_data']):?>
                <option value="<?= $data['id']; ?>"><?= $data['folderName']; ?></option>
                <?php endif;?>
                <?php endforeach; 
                $mysqli->close; ?>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="submit" name='GO'  class="btn btn-success">Создать</button>
        </div>
    </div>
</div>
</div>
</form>


      