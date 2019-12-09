<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$session = Yii::$app->session;

AppAsset::register($this);
?>

<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Dashboard</title>

    <link href="../css/dashboard/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard/metisMenu.min.css" rel="stylesheet">
    <link href="../css/dashboard/timeline.css" rel="stylesheet">
    <link href="../css/dashboard/startmin.css" rel="stylesheet">
    <link href="../css/dashboard/morris.css" rel="stylesheet">
    <link href="../css/dashboard/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href="/css/mehul.css">
    <link rel="stylesheet" type="text/css" href="/css/w3school.css">
    <link href="/assets/a1e48079/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <a class="navbar-brand">Admin Page</a>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" style="background-color: transparent;">
                    <?php echo $session['decryplogusr']; ?><b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a onclick="document.getElementById('id01').style.display='block'">Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div id="wrapper">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a onclick=managemember() id="member"class="active">Manage Members</a>
                        </li>
                        <li>
                            <a onclick=dayleavemanage() id="leavemanage">Day Leave management</a>
                        </li>
                        <li>
                            <a onclick=dayleavestat() id="stat">Day Leave statistics</a>
                        </li>
                        <li>
                            <a onclick=dayleavehis() id="history">Day Leave History</a>
                        </li>
                        <li>
                            <a onclick=statoutexcel() id="excel">Statistics and Output Excel Monthly</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    
    <div class="wrap" style="display:inline">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $this->params['paramtest']; ?>
            <?= Alert::widget() ?>
            <?= $content ?>
            
        </div>
    </div>

    <!-- Forget password popup following -->
    <div id="id01" class="w3-modal" style="text-align:center">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:30%; height:80%">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <img src="/images/change_password.png" alt="Avatar" style="width:60%" class="w3-margin-top">
            </div>
            <form class="w3-container" action="/dashboard/changepass" method="post">
                <input style="width:70%" type="password" placeholder="Enter old password" name="oldpass" required>
                <input style="width:70%" type="password" placeholder="Enter new password" name="newpass" required>
                <input style="width:70%" type="password" placeholder="Confirm new password" name="newcpass" required>
                <button class="submit" type="submit">Reset password</button>
            </form>
        </div>
    </div>


    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/metisMenu.min.js"></script>
    <script src="/js/raphael.min.js"></script>
    <script src="/js/morris.min.js"></script>
    <script src="/js/morris-data.js"></script>
    <script src="/js/startmin.js"></script>

</body>

</html>


<script>
    function managemember() {
        document.getElementById('managemember').style.display = 'block';
        document.getElementById('member').className = "active";
        document.getElementById('dayleavemanage').style.display = 'none';
        document.getElementById('leavemanage').className = "";
        document.getElementById('dayleavestat').style.display = 'none';
        document.getElementById('stat').className = "";
        document.getElementById('dayleavehis').style.display = 'none';
        document.getElementById('history').className = "";
        document.getElementById('statoutexcel').style.display = 'none';
        document.getElementById('excel').className = "";
    }

    function dayleavemanage() {
        document.getElementById('managemember').style.display = 'none';
        document.getElementById('member').className = "";
        document.getElementById('dayleavemanage').style.display = 'block';
        document.getElementById('leavemanage').className = "active";
        document.getElementById('dayleavestat').style.display = 'none';
        document.getElementById('stat').className = "";
        document.getElementById('dayleavehis').style.display = 'none';
        document.getElementById('history').className = "";
        document.getElementById('statoutexcel').style.display = 'none';
        document.getElementById('excel').className = "";
    }

    function dayleavestat() {
        document.getElementById('managemember').style.display = 'none';
        document.getElementById('member').className = "";
        document.getElementById('dayleavemanage').style.display = 'none';
        document.getElementById('leavemanage').className = "";
        document.getElementById('dayleavestat').style.display = 'block';
        document.getElementById('stat').className = "active";
        document.getElementById('dayleavehis').style.display = 'none';
        document.getElementById('history').className = "";
        document.getElementById('statoutexcel').style.display = 'none';
        document.getElementById('excel').className = "";
    }

    function dayleavehis() {
        document.getElementById('managemember').style.display = 'none';
        document.getElementById('member').className = "";
        document.getElementById('dayleavemanage').style.display = 'none';
        document.getElementById('leavemanage').className = "";
        document.getElementById('dayleavestat').style.display = 'none';
        document.getElementById('stat').className = "";
        document.getElementById('dayleavehis').style.display = 'block';
        document.getElementById('history').className = "active";
        document.getElementById('statoutexcel').style.display = 'none';
        document.getElementById('excel').className = "";
    }

    function statoutexcel() {
        document.getElementById('managemember').style.display = 'none';
        document.getElementById('member').className = "";
        document.getElementById('dayleavemanage').style.display = 'none';
        document.getElementById('leavemanage').className = "";
        document.getElementById('dayleavestat').style.display = 'none';
        document.getElementById('stat').className = "";
        document.getElementById('dayleavehis').style.display = 'none';
        document.getElementById('history').className = "";
        document.getElementById('statoutexcel').style.display = 'block';
        document.getElementById('excel').className = "active";
    }
</script>