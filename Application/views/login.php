<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sekizli İş Akış</title>

    <!-- Bootstrap -->
    <link href="<?=BUILD_PATH;?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=BUILD_PATH;?>/font-awesome/css/font-awesome1.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=BUILD_PATH;?>/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=BUILD_PATH;?>/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=BUILD_PATH;?>/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?=SITE_URL;?>/login/send" method="post">
              <h1>Kullanıcı Girişi</h1>
              <div>
                <input type="text" class="form-control" placeholder="Kullanıcı Adı" required="" name="userName"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Şifre" required="" name="uPasswd" />
              </div>
              <div>
<!--                <a class="btn-lg btn-primary submit" href="index.html">Log in</a>-->
<!--                  <input type="button" value="Giriş" class="btn btn-primary">-->
<!--                <a class="reset_pass" href="#">Lost your password?</a>-->
                  <button class="btn btn-primary submit" type="submit">Giriş</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="<?=IMG_PATH?>/logo.png" alt="Sekizli Logo"></h1>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
