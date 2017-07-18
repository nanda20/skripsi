
<!DOCTYPE html>

<html lang="en">
<br><br><br><br><br><br>

<head>
<meta charset="utf-8">
<title>LOGIN ADMINISTRATOR PLN Rayon Tulung</title>
<link href="<?php echo base_url('assets/css/login/style.css'); ?>" rel="stylesheet">
</head>

<body>
<div class="container">

  <section id="content">
    <form action="<?php echo base_url('login/cek'); ?>" method="POST">
      <h1>Login Administrator</h1>
      <div>
        <input type="text" placeholder="Username" required="" id="username" name="username"/>
      </div>
      <div>
        <input type="password" placeholder="Password" required="" id="password" name="password"/>
      </div>
      <div>
        <input type="submit" value="LOGIN" name="login"/>
      </div>
    </form><!-- form -->
    <div class="button">

    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
</body>
</html>
