<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Gösterge Paneli</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">


                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="x_panel">
                
                <div class="x_content">
                    <h1>İstatistiksel</h1>
                    <h1>bilgiler</h1>
                    <h1>bu</h1>
                    <h1>panelde</h1>
                    <h1>gösterilecek</h1>
                    <?php
//The socket functions described here are part of an extension to PHP which must be enabled at compile time by giving the --enable-sockets option to configure.
//Add extension=php_sockets.dll in php.ini and extension=sockets
//user defined rule 4
//super admin rule 14
//normal user 0
include "./Classess/zklibrary.php";
echo 'Library Loaded</br>';
$zk = new ZKLibrary('192.168.1.233', 4370, 'TCP');
echo 'Requesting for connection</br>';
$zk->connect();
echo 'Connected</br>';
$zk->disableDevice();
echo 'disabling device</br>';
$users = $zk->getUser();

print_r($users);
//$attendace = $zk->getAttendance();

//$zk->deleteUser(2);

//$zk->clearAttendance();
//setUser($uid, $userid, $name, $password, $role)
//Reading fingerprint data
//for($i=0;$i<=9;$i++){
//$f = $zk->getUserTemplate(1,6); echo '</br>-----'; print_r($f); echo '</br>';
/*
echo 'FP length: '.$f[0].'</br>';
echo 'UID: '.$f[1].'</br>';
echo 'Finger ID: '.$f[2].'</br>';
echo 'Valid: '.$f[3].'</br>';
echo 'template: '.$f[4].'</br>';
*/

// $zk->enableDevice();
// $zk->disconnect();

?>                </div>
            </div>
        </div>
    </div>
</div>
