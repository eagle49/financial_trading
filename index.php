<?php
    session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <title>ML Predictive</title>
    <script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="http://www.amcharts.com/lib/3/serial.js"></script>
    <script src="http://www.amcharts.com/lib/3/amstock.js"></script>
    <script src="./assets/js/dataloader.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/login_signup.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/tab_panel.css">

    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="./assets/js/myChart.js"></script>
    <script type="text/javascript" src="./assets/js/login_signup.js"></script>
    <script type="text/javascript" src="./assets/js/function.js"></script>
</head>

<body>

    <header class="header-body">
        <div class="header-limiter">
            <h1><a href="#">Company<span>logo</span></a></h1>
            <nav>
                <div class="header-user-menu"><span class="model-name">ALGN</span>
                    <?php
                        // include('/include/header_table.php');
                    ?>
                    <table class="tbl-stock-list">
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Change</th>
                            <th>Open</th>
                            <th>Close</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Volume</th>
                        </thead>
                        <tbody class="cur-history-stock">
                        </tbody>
                    </table>
                </div>
            </nav>
            <ul>
                <?php
                    if ( !isset($_SESSION['username']) || ($_SESSION['username'] == '')) {
                ?>
                <li><a href="#login-box" class="login-window">Login</a></li>
                <li><a href="#signup-box" class="login-window">Sign up</a></li>
                <?php 
                    } else {
                ?>
                <div class="dropdown" style="float:right;">
                    <a class="dropbtn"><?php echo $_SESSION['username'] ?></a>
                    <div class="dropdown-content">
                        <a href="#" id="logout_btn">Logout</a>
                        <!-- <a href="#">Link 2</a>
                        <a href="#">Link 3</a> -->
                    </div>
                </div>
                <?php
                    }
                ?>
            </ul>
        </div>
    </header>
    <div class="main-body">
        <div class="content">
            <div class="charttools">
                Group by:
                <input type="button" value="days" onclick="setGrouping('DD', this);" class="selected" />
                <input type="button" value="weeks" onclick="setGrouping('WW', this);" />
                <input type="button" value="months" onclick="setGrouping('MM', this);" />
            </div>
            <div id="chartdiv">
            
            </div>
        </div>
        <div class="sidebar">
            <div class="header-user-menu" style="margin-top: 30px;"><h2 style="color:white; margin-left: 10px;"><span class="model-name">ALGN</span></h2>
                <?php //include('/include/header_table.php'); ?>
                <table class="tbl-stock-list">
                    <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Change</th>
                        <th>Open</th>
                        <th>Close</th>
                        <th>High</th>
                        <th>Low</th>
                        <th>Volume</th>
                    </thead>
                    <tbody class="cur-history-stock">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="news-body">
        <div class="tabPanel-widget">
            <label for="tab-1" tabindex="0"></label>
            <input id="tab-1" type="radio" name="tabs" checked="true" aria-hidden="true">
            <h2>News</h2>
            <div>
                <?php include_once('include/news_panel.php'); ?>
            </div>
            <label for="tab-2" tabindex="0"></label>
            <input id="tab-2" type="radio" name="tabs" aria-hidden="true">
            <h2>Press Releases</h2>
            <div>
                <?php include_once('include/press_panel.php'); ?>
            </div>        
        </div>
    </div>

    <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="./assets/img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
        <form method="post" class="signin" action="#">
            <fieldset class="textbox">
                <label class="username">
                <span>Username or email</span>
                <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
                </label>
                <label class="password">
                <span>Password</span>
                <input id="password" name="password" value="" type="password" placeholder="Password">
                </label>
                <button class="submit button" type="button" id="signin_btn">Sign in</button>     
            </fieldset>
        </form>
    </div>

    <div id="signup-box" class="login-popup">
        <a href="#" class="close"><img src="./assets/img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
        <form method="post" class="signin" action="#">
            <fieldset class="textbox">
                <label class="username">
                <span>Username</span>
                <input id="up-username" name="up-username" value="" type="text" autocomplete="on" placeholder="Username">
                <label class="username">
                <span>Email</span>
                <input id="up-email" name="up-email" value="" type="email" autocomplete="on" placeholder="Email">
                </label>
                <label class="password">
                <span>Password</span>
                <input id="up-password" name="up-password" value="" type="password" placeholder="Password">
                </label>
                <label class="password">
                <span>Confirm Password</span>
                <input id="up-password1" name="up-password1" value="" type="password" placeholder="Confirm Password">
                </label>
                <button class="submit button" type="button" id="signup_btn">Register</button>
            </fieldset>
        </form>
    </div>

</body>
</html>