<?php 
class Functions{

    public function CurrentUrl(){
        if(isset($_GET['url'])){
            $Currenturl=rtrim($_GET['url'],'/');
            $Currenturl=filter_var( $Currenturl,FILTER_SANITIZE_URL);
            $Currenturl=explode($Currenturl,'/');
            return $Currenturl;
        }
    }
}
   


?>