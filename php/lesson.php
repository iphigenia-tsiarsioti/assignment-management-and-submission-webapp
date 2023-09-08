<?php
// Selida pou diaxeirizetai leitourgies pou sxetizontai me to lesson.php

// Eyresi tou lesson id kai elegxos an yparzei i oxi
if(isset($_GET['lesson_id']) && $_GET['lesson_id'] !== ''){
  $invalid_lesson=0;
  $lesson_id = $_GET['lesson_id'];
  $sql="SELECT lesson_name FROM `lessons`  WHERE lesson_id='$lesson_id' ";
  $result = $db->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $lesson_name=$row["lesson_name"];
    }
  }else{
    $invalid_lesson=1;
  }
}else{
  $invalid_lesson=1;
}
 
// Eggrafi mathiti sto mathima
if(isset($_POST['enroll'])){
  $sql="INSERT INTO `enrollment` (student_id,lesson_id) VALUES ('$student_id','$lesson_id')"; 
  if ($db->query($sql) === TRUE) {
      // echo "New record created successfully";
  }else{
      echo "Error: " . $sql . "<br>" . $db->error;
  }
}  

// Diagrafi mathiti apo to mathima
if(isset($_POST['undo-enroll'])){
  $sql="DELETE FROM `enrollment` WHERE enrollment.student_id='$student_id' AND enrollment.lesson_id='$lesson_id'"; 
  if ($db->query($sql) === TRUE) {
      // echo "New record created successfully";
  }else{
      echo "Error: " . $sql . "<br>" . $db->error;
  }
}  

$today = date('Y-m-j', time());
?>