<?php
/*
$mysqli = new mysqli("localhost", "root", "", "my_db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
    
if (isset($_GET['message'])) {
    
    $user=$mysqli->real_escape_string($_GET['user']);
    $message=$mysqli->real_escape_string($_GET['message']);
    $date=date('Y-m-d H:i:s');
    
    $sql="INSERT INTO forum(id, user, message, date) VALUES(0,'$user','$message','$date')";
    $mysqli->query($sql);
}
*/


?>

    <!DOCTYPE html>
    <html>

    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--Custom styles here-->
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Let's Talk</title>
    </head>

    <body>
        <!--Your HTML here-->
        <!--mobile friendly hamburger menu-->
        <nav class="navbar navbar-default affix-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
			</button>
                <a class="navbar-brand" href="#">Coders Annonymous </a>
            </div>
            <!--Blog post-->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="forum.php">Blog</a></li>
                    <li><a href="videos.php">Videos</a></li>
                    <li><a href="index.php">Logout</a></li>

                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </nav>
        <h2 class="Head" id="t"><u>Coding Hacks</u></h2>
        <div id ="jazz">
        <form method="post" class="takens" style>
            <p> <span class="Head">User:</span>
                <label for="user"></label>
                <input type="text" name="user" id="user" />
                <br />
            </p>
            <p><span class="Head">Message:</span> <br />
                <label for="message"></label>
                <textarea name="message" id="message" cols="45" rows="5"></textarea>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Post message" />
            </p>
        </form>

        <div class="comments" style="float:right;">
            <?php

$cnt = mysqli_connect('localhost','root','root','project_3');
//$cnt = mysqli_connect('localhost','obtil','obtil17!','obtstudent');
$sql = "SELECT * FROM Data";
$result = mysqli_query($cnt, $sql);
$array = array();

if ($result->num_rows > 0){
    while($data = mysqli_fetch_assoc($result)){
        $array[] = $data;
    };
};
$array = array_reverse($array);
//print_r($array);
foreach($array as $row){
    echo '<h1 id="name"><b>'.$row['user'].'</b></h1>
  <h5 id="time">'.$row['date'].'</h5>
  <p id="messages">'.$row['message'].'</p>';
}; 
mysqli_close($cnt);
            
?>
            </div>
                <?php
    if(isset($_POST['submit'])){
        $u = $_POST['user'];
        $d = $_POST['message'];
        $cnt = mysqli_connect('localhost', 'root','root','project_3');
//        $cnt = mysqli_connect('localhost', 'obtil','obtil17!','obtstudent');
        $sql = "insert into Data(user, message) values ('$u', '$d');";
        mysqli_query($cnt, $sql);
        mysqli_close($cnt);
        header('Location: '.$_SERVER['PHP_SELF']);
    }
?>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--Custom script here-->
        <script type="text/javascript"></script>

    </body>

    </html>
