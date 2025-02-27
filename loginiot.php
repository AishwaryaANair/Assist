<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login / Sign Up</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet"  type="text/css" href="css/login.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  
</head>
<body>
  
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <form class="sign-in-htm" action="login.php" method="POST">

        <?php  include('login.php'); 
        if (count($errors) > 0) : ?>
          <div class="error">
            <?php foreach ($errors as $error) : ?>
              <p><?php echo $error ?></p>
            <?php endforeach ?>
          </div>
        <?php  endif ?>

        <div class="group">
          <label for="user" class="label">Email</label>
          <input class="username" name="email" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input class="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="checkbox" class="check" checked>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In" name="reg_user">
        </div>
        <div class="hr"></div>
      </form>

      <form class="sign-up-htm" action="login.php" method="POST">

        <div class="group">
          <?php  if (count($errors) > 0) : ?>
              <div class="error">
                <?php foreach ($errors as $error) : ?>
                  <p><?php echo $error ?></p>
                <?php endforeach ?>
              </div>
          <?php  endif ?>
          <label for="user" class="label">Email</label>
          <input class="username" name="email" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input class="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input class="password" name  = "password2" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up" name="unreg_user">
        </div>
        <div class="hr"></div>
      </form>
    </div>
  </div>
</div>
  
  
</body>
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>loginpage</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet"  type="text/css" href="css/login.css">
      
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  
</head>
<body>
  
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <form class="sign-in-htm" action="loginiot.php" method="GET">

          <?php include('errors.php'); ?>

        <div class="group">
          <label for="user" class="label">Username</label>
          <input name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
      </form>
      <form class="sign-up-htm" action="loginiot.php" method="POST">
                 
		            <?php include('errors.php'); ?> 
      
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input" value="<?php echo $username; ?>">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1"><a href="loginiot.php">Already a Member?</a>
        </div>
      </form>
    </div>
  </div>
</div>
  
  
</body>
</html>