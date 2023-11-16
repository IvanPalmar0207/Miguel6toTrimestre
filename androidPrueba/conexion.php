<?php

$db = mysqli_connect('localhost','root','','androidprueba',3307);

if($db->errno){
    return false;
}else{
    return true;
}

?>