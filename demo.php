<?php
  



if(isset($_POST['s']))
{
    if(!isset($_POST['c']))
    {

    
   
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Message</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

    }
    else
    {
        echo "success";
    }
}


?>
<form action="" method="post">
    <input type="checkbox" name="c"> agree
    <br>
    <input type="submit" name="s"> 
</form>