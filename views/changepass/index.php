<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
  

<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:40%; height:90%; text-align:center">
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <img src="/images/passforgot.png" alt="Avatar" style="width:30%" class="w3-margin-top">
        </div>
        <form class="w3-container" action="changepass/passwordreset" method="post">
          <p><b>Reset the password</b></p><br>
          <p>Please enter new password to reset your password</p><br>
          <input style="width:70%" type="text" placeholder="Change Password" name="resetpass" required>
          <input type="hidden" name="resetemail" value="<?php echo $decrypemail; ?>">
          <button class="cancelbtn" type="submit">Reset and Login</button>

          <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </form>
      </div>
</body>

</html>