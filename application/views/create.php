<?php
    if(!empty($result)){
        echo"<br />";
      if($result->error == true){
        echo $result->error_message;
      }else{
        echo $result->username." is inserted";
      }
    }
?>
<form action="actioncreate" method="post">
    <label>First name:</label><br>
    <input type="text" name="first_name">
    <br>
    <label>Last name:</label><br>
    <input type="text" name="last_name">
    <br>
    <label>date of birth:</label><br>
    <input type="text" name="date_of_birth">
    <br>
    <label>country:</label><br>
    <input type="text" name="country">
    <br>
    <label>username:</label><br>
    <input type="text" name="username">
    <br>
    <label>password:</label><br>
    <input type="password" name="password">
    <br>
    <label>email:</label><br>
    <input type="text" name="email">
    <br>
    <input type="submit" value="submit">
</form>