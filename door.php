<?php session_start();?>
<?php require_once __DIR__ . '/header.php';?>
<body>     
<form method="get"  action="doorGo.php">
    <div class="container-sm">
        <div class="container text-center">
            <div class="row">
              <div class="col">
              </div>
              <div class="col"><br>
              <div class="mb-3">
                <?php if(isset($_SESSION['status1'])):?>
                    <div class="alert alert-success" role="alert">
                    <h5><?= $_SESSION['status1'];?></h5>
                    </div>
                    <?php unset($_SESSION['status1']);?>
                  <?php endif;?>
                </div>    
                <div class="mb-3">
                  <?php if(isset($_SESSION['status'])):?>
                    <div class="alert alert-danger" role="alert">
                    <h5><?= $_SESSION['status'];?></h5>
                    </div>
                    <?php unset($_SESSION['status']);?>
                  <?php endif;?>
                </div>    
                <div class="mb-3">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control"  name="login" placeholder="Электронная почта" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <label for="floatingInput">Адрес электронной почты или логин</label>
                    </div>
                    <div id="emailHelp" class="form-text">Мы никогда не передадим вашу электронную почту кому-либо еще.</div>
                  </div>
                  <div class="mb-3">
                    <div class="form-floating">
                      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Пароль</label>
                    </div>
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Запомнить</label>
                  </div>
                  <button type="submit" name='go'  class="btn btn-success">Войти</button>
                  <a class="btn btn-dark" href="registration/freelancerRegistration.php" role="button">Регистрация</a>
                </form>
              </div>
              <div class="col">
                
              </div>
            </div>
          </div>
      </div>
   
      </form>
</body>
<?php require_once __DIR__ . '/footer.php';?>
</html>