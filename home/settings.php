<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//bootstraptema.ru/plugins/2018/bsm/password-score.js"></script>
<script type="text/javascript" src="//bootstraptema.ru/plugins/2018/bsm/password-score-options.js"></script>
<script src="//bootstraptema.ru/plugins/2018/bsm/bootstrap-strength-meter.js"></script>
<script>
    $(document).ready(function() {
        $('#example-progress-bar').strengthMeter('progressBar', {
            container: $('#example-progress-bar-container')
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#contentbox").keyup(function() {
            var box = $(this).val();
            var main = box.length * 100;
            var value = (main / 255);
            var count = 255 - box.length;
            if (box.length <= 255) {
                $('#count').html(count);
                $('#bar').animate({
                    "width": value + '%',
                }, 1);
            } else {
                $('#bar').attr({
                    class: 'progress-bar progress-bar-danger progress-bar-striped'
                });
            }
            return false;
        });
    });
</script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";

$info = [];
if ($query = mysqli_query($mysqli, "SELECT *  FROM PackProjects")) {
    $info = $query->fetch_all(MYSQLI_ASSOC);
} else {
    print_r($mysqli->error_info);
}
$infoProjects = [];
if ($query2 = mysqli_query($mysqli, "SELECT *  FROM Projects")) {
    $infoProjects = $query2->fetch_all(MYSQLI_ASSOC);
} else {
    print_r($mysqli->error_info);
}
?>
<body>
    <div class="container">

            <div class="row">
                <div class="col">
                    <label for="formFile" class="form-label">Аватар</label>
                    <input class="form-control" type="file" id="formFile">

                    <label>Логин</label>
                    <input type="text" class="form-control" maxlength="255" required name='login' value="<?= $_SESSION['user_data']['login_data']; ?>" placeholder="Логин" aria-label="First name">

                    <label>Направление</label>
                    <input type="text" class="form-control" maxlength="255" required name='login' value="<?= $_SESSION['user_data']['employment_data']; ?>" placeholder="напрвавление" aria-label="First name">

                    <div class="row">
                        <div class="col">
                            <label>Имя</label>
                            <input type="text" class="form-control" maxlength="255" required name='name' value="<?= $_SESSION['user_data']['name_data']; ?>" placeholder="Имя" aria-label="First name">
                        </div>
                        <div class="col">
                            <label>Фамилия</label>
                            <input type="text" class="form-control" maxlength="255" required name='ferstname' placeholder="Фамилия" value="<?= $_SESSION['user_data']['ferstname_data']; ?>" aria-label="Last name">
                        </div>
                    </div>
                    <label>О себе</label>
                    <textarea class="form-control" name="oSebe" maxlength="255" placeholder="О себе (не более 255 символов)" id="contentbox" rows="3"><?= $_SESSION['user_data']['about_me_data']; ?></textarea>
                    <p>
                    <div class="progress" id="barbox">
                        <div id="bar" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="156">
                            <span id="count"></span>
                        </div>
                    </div>

                    <label>Общее описание проектов</label>
                    <input type="text" class="form-control" maxlength="255" required name='progetOps' value="тут это тут" placeholder="Общее описание проектов" aria-label="First name">
                    <br>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Добавить старонии ссылки</option>
                            <option value="1">ВК</option>
                            <option value="2">Tg</option>
                            <option value="3">github</option>
                        </select>
                        <p>
                            <input type="text" class="form-control" maxlength="255" required name='http' placeholder="Сcылка на источник" aria-label="First name">
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                                <th scope="col"><button type="submit" name='go' class="btn btn-success">изменить</button></th>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                <label>удалить проекты</label><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">название</th>
                                <th scope="col">Проектов</th>
                                <th scope="col">изменить</th>
                                <th scope="col">удалить</th>
                            </tr>
                        </thead>
                        <?php foreach ($infoProjects as $dataProjects): ?>
                            <?php if ($dataProjects['idUser'] == $_SESSION['user_data']['id_data']): ?>
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex align-items-center">
                                            <img
                                            src="<?= $dataProjects['image']; ?>"
                                            alt=""
                                            style="width: 45px; height: 45px"
                                            class="rounded-circle" />
                                            <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $dataProjects['nameProject'] ?></p>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col"> <?= $dataProjects['data']; ?></th>
                                    <th scope="col"><button type="submit" name='go' class="btn btn-success">изменить</button></th>
                                    <th scope="col"><button type="submit" name='go' class="btn btn-success">удалить</button></th>
                                <tr>
                                <?php endif; ?>
                            <?php endforeach;
                        $mysqli->close; ?>
                    </table>
                </div>
                <div class="col">
                    <label>удалить папку</label><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">название</th>
                                <th scope="col">Проектов</th>
                                <th scope="col">изменить</th>
                                <th scope="col">удалить</th>
                            </tr>
                        </thead>
                        <?php foreach ($info as $data): ?>
                            <?php if ($data['idUser'] == $_SESSION['user_data']['id_data']): ?>
                                <?  require_once $_SERVER['DOCUMENT_ROOT'] . "/include/db.php";
                                    $id = $data['id'];
                                    $res = $mysqli->query("SELECT count(*) FROM Projects WHERE idPack = $id");
                                    $row = $res->fetch_row();
                                    $count = $row[0];
                                ?>
                                <tr>
                                    <th scope="col"><?= $data['folderName']; ?></th>
                                    <th scope="col"><?= $count;?></th>
                                    <th scope="col"><button type="submit" name='go' class="btn btn-success">изменить</button></th>
                                    <th scope="col"><button type="submit" name='go' class="btn btn-success">удалить</button></th>
                                <tr>
                                <?php endif; ?>
                            <?php endforeach;
                        $mysqli->close; ?>
                    </table>
                    <br>
                </div>
            </div>
        </div>
        <div class="mb-3"><br>
        <div class="container text-center">
          
            </div>
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <a href=''>Сменить пароль?</a>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>

    </div>
</body>
<?php require_once __DIR__ . '/footer.php'; ?>