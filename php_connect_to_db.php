<?php
/**
 * Created by PhpStorm.
 * User: GigiT
 * Date: 28.04.2016
 * Time: 09:26
 */
// php connect to mysql database

$dbuser = 'root'; //username of server
$dbpassword = ' '; //server password
$dbname = 'testingdb'; // database name

$conn =  new mysqli('localhost', $dbuser, $dbpassword, $dbname);
// check connection
if ($conn->connect_error) {
      die ("Connection failed: " . $conn->connect_error);
    echo "Not success";
}else{

   echo "connect success" . "<br>";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    if (mysqli_query($conn,"INSERT INTO `Users` (`UserName`) VALUES ('$name')")) {
        $userId = mysqli_insert_id();
        echo "successfully inserted";
    }
    else {
        echo "my false". mysqli_error($conn);
    }

    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $timestamp = date('Y-m-d H:i:s');
    $theUserId = "SELECT User_Id FROM Users where UserName = '".$name."'";
    $result2 = $conn->query($theUserId);
    if ($result2->num_rows> 0) {
    	while($rows = $result2->fetch_assoc()){
    
    		$userId = $rows['User_Id'];
    
    	}}
    	if (mysqli_query($conn,"INSERT INTO `Messages` (`UserId`, `Usermsgs`, `times`) VALUES ('$userId','$message','$timestamp' )")) {
    		echo "successfully inserted";
    	}
    	else {
    		echo "failed". mysqli_error($conn);
    	}
    
    $collect_data = "SELECT U.UserName,M.Usermsgs,M.times FROM Users as U join Messages as M where U.User_Id=M.UserId";
    $result = $conn->query($collect_data);
    if ($result->num_rows> 0) {
        while($rows = $result->fetch_assoc()){

//if xreiazomai edw?
           echo "User:". $rows["UserName"]. "--> ";
           echo $rows["Usermsgs"]. " ";
           echo $rows["times"]. " " . "<br>";
           
//            $testing = $rows;

        }
//        foreach ($testing as $entry)
//        {
//           echo $entry['Usermsgs'] . $entry['Name'] . $entry['times'];
//        }
    }

    
    $conn->close();
    

    
//}
//$sql = "SELECT User_id, userName FROM Users, Messages";
//$result = $conn->query($sql);
//
//
//
//if ($result->num_rows>0) {
    //output data of each row
//    while ($row = $result->fetch_assoc()) {
//       $testing =  "<div id=\"chatbox\"><br> id: " . $row["User_id"] . "Name:" . $row["userName"] . "Message:" . $row["Usermsgs"] . "Time:" . $row["times"] . "<br></div>";

//    }
//}
//else {
//
//    echo "0 results";
}





////Create database
//$sql = "select * from Messages where userName=465465";
//if($conn->query($sql)---TRUE){
//    echo "Database created successfully" ;
//} else {
//    echo "Error creating database: " .$conn->error;
//}
//
//$conn->close();
//?>

<!--//query create table-->
<?php
//CREATE TABLE Messages (
//    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//userName VARCHAR(30) NOT NULL,
//Usermsgs VARCHAR(120) NOT NULL,
//times TIMESTAMP
//)
//?>

