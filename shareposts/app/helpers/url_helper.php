<?php 
//simple page redirect
function Redirect($page){
    return header('location:'.URLROOT.'/'.$page);

}


?>