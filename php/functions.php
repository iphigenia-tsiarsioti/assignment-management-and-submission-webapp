<?php 

function setEnums($array,$value) {
    $flag=false;
    $length=count($array);
    for($i=0;$i<$length;$i++){
        if($array[$i]==$value){
            $flag=true;
            break;
        }
    }
    if($flag==false)
        $array[$length]=$value; 
    return $array;
}

// Vriskei ola ta enums apo ti vasi gia type kai semester
$sql="SELECT * FROM `lessons` ORDER BY type";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $typoi = array();
    $semesters = array();  
    while($row = $result->fetch_assoc()) {
        $type=$row['type'];
        $semester=$row['semester'];
        $typoi=setEnums($typoi,$type);
        $semesters=setEnums($semesters,$semester);
    }
}

// Vriskei ola ta enums apo ti vasi gia to year 
$sql="SELECT * FROM `lessons` ORDER BY year";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $years = array(); 
    while($row = $result->fetch_assoc()) {
        $year=$row['year'];
        $years=setEnums($years,$year);
    }
}

?>