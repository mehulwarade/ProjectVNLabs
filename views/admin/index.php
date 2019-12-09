<?php
use yii\widgets\Breadcrumbs;

?>

<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
  <div class="imgcontainer">
    <img src="/images/img.png" alt="Avatar" class="avatar">
  </div>
  <p align="center"><b>Admin Login</b></p>
  <div style="text-align:center">
    <form action="admin" method="post">
      <input type="hidden" name="_csrf" value="<?= \Yii::$app->request->getCsrfToken() ?>" />

      <input type="text" placeholder="Username" name="username"><br>
      <input type="password" placeholder="Password" name="password"><br>
      <button type="submit">Login</button>
      <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </form>
    
    <button onclick="document.getElementById('id01').style.display='block'" class="cancelbtn">Forget Password</button>

    </form>


    <!-- Forget password popup following -->
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:30%; height:80%">
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <img src="/images/passforgot.png" alt="Avatar" style="width:30%" class="w3-margin-top">
        </div>
        <form class="w3-container" action="admin" method="post">
          <lxabel><b>Enter your registered email to reset the password</b></label><br>
          <input style="width:70%" type="text" placeholder="Email Address" name="forgetpassemail" required>
          <button class="cancelbtn" type="submit">Reset password</button>
        </form>
      </div>
    </div>


  </div>


</body>

</html>