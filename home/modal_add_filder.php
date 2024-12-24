<form method="get"  action="add_folder.php" >
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Новая папка</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <input type="text" class="form-control" maxlength="255" required name='folderName' placeholder="Название папки" aria-label="First name">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="submit" name='GO'  class="btn btn-success">Создать</button>
        </div>
    </div>
</div>
</div>
</form>
