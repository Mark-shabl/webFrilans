<div class="row d-flex justify-content-center">
    <div class="col col-md-9 col-lg-7 col-xl-6">
      <div class="card" style="border-radius: 15px;">
        <div class="card-body p-4">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <img src="<?= $data['images'];?>"
                alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
            </div>
            <div class="flex-grow-1 ms-3">
              <h5 class="mb-1"><?= $data['name'].' '.$data['ferstname'];?></h5>
              <p class="mb-2 pb-1"><?= $data['about_me'];?></p>
              <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-body-tertiary">
                <div>
                  <p class="small text-muted mb-1">Проекты</p>
                  <p class="mb-0">0</p>
                </div>
                <div class="px-3">
                  <p class="small text-muted mb-1">Слушатели</p>
                  <p class="mb-0">0</p>
                </div>
                <div>
                  <p class="small text-muted mb-1">Рейтинг</p>
                  <p class="mb-0">0</p>
                </div>
              </div>
              <div class="d-flex pt-1">
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary me-1 flex-grow-1">Написать</button>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-grow-1">Слушать</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>