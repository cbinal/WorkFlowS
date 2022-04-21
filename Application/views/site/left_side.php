<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title p-2" style="border: 0;">
            <a href="<?=SITE_URL;?>" class=""><img class="img-fluid" src="<?=IMG_PATH;?>/logo.png" alt=""></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?=IMG_PATH;?>/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>Sayın;</h2>
                <h2><?php echo $this->userInfo["first_name"]." ".$this->userInfo["last_name"]; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                    <li><a href="<?=SITE_URL?>"><i class="fa fa-home"></i> Giriş </a>
                    </li>
                    <li><a href="<?=SITE_URL.'/offer/list'?>"><i class="fa fa-file-text"></i> Teklifler </a>
                    </li>
                    <li><a href="#"><i class="fa fa-credit-card-alt"></i> Siparişler </a>
                    </li>
                    <li><a href="#"><i class="fa fa-tasks"></i> Üretim İşlemleri </a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
