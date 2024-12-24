
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//bootstraptema.ru/plugins/2018/bsm/password-score.js"></script>
<script type="text/javascript" src="//bootstraptema.ru/plugins/2018/bsm/password-score-options.js"></script>
<script src="//bootstraptema.ru/plugins/2018/bsm/bootstrap-strength-meter.js"></script>
<script>$(document).ready(function() {$('#example-progress-bar').strengthMeter('progressBar', {container: $('#example-progress-bar-container')});});</script>
<script>$(document).ready(function(){$("#contentbox").keyup(function(){var box=$(this).val();var main = box.length *100;var value= (main / 255);var count= 255 - box.length;if(box.length <= 255){$('#count').html(count);$('#bar').animate({"width": value+'%',}, 1);}else{$('#bar').attr({ class: 'progress-bar progress-bar-danger progress-bar-striped' }); }return false;});});</script>

  <body> 
    <div class="container">
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <!-- не заполнять -->
          </div>
          <div class="col">
            <form method="get"  action="rigF.php" oninput='password2.setCustomValidity(password2.value != password1.value ? "Пароли не схоижи" : "")'>
              <div class="mb-3">
                <br>
                <input type="email" class="form-control" maxlength="255" required name="email" placeholder="Электронная почта" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                  <?php if(isset($_SESSION['errorEmail'])):?>
                    <div class="alert alert-danger" role="alert">
                    Этот адрес электронной почты уже используется! <a href="#" class="alert-link">НАЖМИТЕ</a>. Что бы вастонановть пароль.
                    </div>
                    <?php unset($_SESSION['errorEmail']);?>
                  <?php endif;?>
              </div>
              <div class="row">
                <div class="mb-3">
                  <input type="text" class="form-control" maxlength="255" required name='login' placeholder="Логин" aria-label="First name">
                </div>
                  <?php if(isset($_SESSION['errorLogin'])):?>
                    <div class="alert alert-danger" role="alert">
                    Этот логин уже используется!
                    </div>
                    <?php unset($_SESSION['errorLogin']);?>
                  <?php endif;?>
              </div>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" maxlength="255" required name='name' placeholder="Имя" aria-label="First name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" maxlength="255" required name='ferstname' placeholder="Фамилия" aria-label="Last name">
                </div>
              </div><br>
              <div class="mb-3">
                <textarea class="form-control" name="oSebe" maxlength="255" placeholder="О себе (не более 255 символов)" id="contentbox" rows="3"></textarea>
                <p>
                <div class="progress" id="barbox">
                  <div id="bar" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                  aria-valuenow="0" aria-valuemin="0" aria-valuemax="156">
                  <span id="count"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                  <input type="password" id="example-progress-bar" maxlength="255" required name='password1' placeholder="Придумайте пароль" class="form-control" aria-describedby="passwordHelpBlock">
                  <label class="form-label">Надежность Пароля</label>
                  <div class="mb-3" id="example-progress-bar-container"></div>
                </div>
              <div class="mb-3">
                
                  <input type="password" id="password2" maxlength="255" name='password2' placeholder="Повторите пароль" class="form-control" aria-describedby="passwordHelpBlock">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required name="check_agreements">
                <label class="form-check-label" for="invalidCheck2">
                Регистрируясь, я подтверждаю, что ознакомлен и согласен с политикой конфиденциальности и правилами данного сайта.
                </label>
              </div>
              <br>
              <button type="submit" name='puh'  class="btn btn-success">Зарегистрироваться</button>
            </form>
          </div>
          <div class="col">
          <!-- не заполнять -->
          </div>
        </div>
      </div>
    </div>
  </body>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/footer.php';?>





