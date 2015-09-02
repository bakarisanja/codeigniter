<div class="col-md-7" style="float:left">
<?php
echo "<table class='table table-striped'>";
echo"     
<tr>
    <td>user id</td>
    <td>first name</td> 
    <td>last name</td>
    <td>date of birth</td>
    <td>country</td> 
    <td>ip adress</td>
    <td>username</td>
</tr>
    ";
for($i = 0; $i < count($result); $i++){
    echo"     
  <tr>
    <td>".$result[$i]->id."</td>
    <td>".$result[$i]->first_name."</td> 
    <td>".$result[$i]->last_name."</td>
    <td>".$result[$i]->date_of_birth."</td>
    <td>".$result[$i]->country."</td> 
    <td>".$result[$i]->ip."</td>
    <td>".$result[$i]->username."</td>
    <td><a href='".base_url()."admincontroller/delete?id=".$result[$i]->id."&username=".$result[$i]->username."&token=".$result[$i]->token."'>delete</a></td>
  </tr>
    ";
    }
echo "</table>";
?>
</div>
