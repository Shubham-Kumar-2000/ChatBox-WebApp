<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">-->
<head>
<title>Domain Default page</title>
<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--    <meta http-equiv="Cache-Control" content="no-cache" />-->
<!--    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />-->
<!--    <link rel="icon" href="favicon.ico" type="image/x-icon" />-->
<link rel="stylesheet" type="text/css" href="ChatStyle.css" />
<script type="text/javascript"src=”https://ajax. googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js”></script>
    

</head>
<body>

<div id="chat-wrap">
    <h1>Chat Window</h1>
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_POST['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox">  <?php  include 'php_connect_to_db.php'; ?> </div>
<!--        --><?php //echo $rows["UserName"] . $rows["Usermsgs"] . " - " . $rows["times"] ; ?>

    <form name="message" action="index.php" method="post">
        <!--            <input name="usermsg" type="text" id="usermsg" size="63" />-->
        <p>Your message: </p>
        <textarea id="usermsg" maxlength="120"></textarea>
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>

<!--<script type="text/javascript">
    //If user submits the form
    //include 'log.html';
    $("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});
        $("#usermsg").attr("value", "");
        return false;
    });
</script>-->



<?php
session_start();
unset($_SESSION['name']);
function loginForm(){
    echo '
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Please enter your name to continue:</p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}



if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $userName = $_POST['name'];
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }

}

?>


<?php
include_once('php_connect_to_db.php');
if(!isset($_SESSION['name'])){
    loginForm();
}
else {

}
    ?>

<?php
//if(isset($_POST['Send'])){
//    if($_POST['message'] != ""){
//        $userMsgs = $_POST['message'];
//        $_SESSION['message'] = stripslashes(htmlspecialchars($_POST['message']));
//    }
//    else{
//        echo '<span class="error">Please type in a message</span>';
//    }
//
//}
//?>

    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document
        $(document).ready(function(){
        });
    </script>-->



<!--<script>
//to send and receive data throught the form without refreshing the page and handle
// the data requested.Load the file containing the chat log
function loadLog(){

$.ajax({
url: "log.html",
cache: false,
success: function(html){
$("#chatbox").html(html); //Insert chat log into the #chatbox div
},
});
}

//Auto scrolling. Load the file containing the chat log
function loadLog(){
var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
$.ajax({
url: "log.html",
cache: false,
success: function(html){
$("#chatbox").html(html); //Insert chat log into the #chatbox div

//Auto-scroll
var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
if(newscrollHeight > oldscrollHeight){
$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
}
},
});
}

setInterval (loadLog, 2500);	//Reload file every 2500 ms or x ms if you wish to continuously Updating the Chat Log

</script>-->



<!-- <script type="text/javascript">(function(){var D=document,W=window;function A(){if(W.plesk){return;}W.plesk=1;if(D.getElementsByTagName){var S=D.getElementsByTagName("head")[0].appendChild(D.createElement("script"));S.setAttribute("type","text/javascript");S.setAttribute("src","http://promo.parallels.com/js/promo.plesk.js")}}if(D.addEventListener){D.addEventListener("DOMContentLoaded",A,false)}/*@cc_on D.write("\x3cscript id=\"_IE_onload\" defer=\"defer\" src=\"javascript:void(0)\">\x3c\/script>");(D.getElementById("_IE_onload")).onreadystatechange=function(){if(this.readyState=="complete"){A()}};@*/if(/WebK/i.test(navigator.userAgent)){var C=setInterval(function(){if(/loaded|complete/.test(D.readyState)){clearInterval(C);A()}},10)}W[/*@cc_on !@*/0?'attachEvent':'addEventListener'](/*@cc_on 'on'+@*/'load',A,false)})()</script>-->
<!--<script type="text/javascript">-->
<!--    // jQuery Document-->
<!--    $(document).ready(function(){-->
<!--        //If user wants to end session-->
<!--        $("#exit").click(function(){-->
<!--            var exit = confirm("Are you sure you want to end the session?");-->
<!--            if(exit==true){window.location = 'index.php?logout=true';}-->
<!--        });-->
<!--    });-->
<!--</script>-->
<?php
//
//if(isset($_GET['logout'])){
//
////Simple exit message
//$fp = fopen("log.html", 'a');
//fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
//fclose($fp);
//
//session_destroy();
//header("Location: index.php"); //Redirect the user
//}
//?>

</body>