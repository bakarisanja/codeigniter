<div class="container">
<div class="row">
<div class="col-md-7" style="float:left">
<div class="span12">
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
  <form action='' method='post' class='delete'>
    <td>".$result[$i]->id."</td>
    <td>".$result[$i]->first_name."</td> 
    <td>".$result[$i]->last_name."</td>
    <td>".$result[$i]->date_of_birth."</td>
    <td>".$result[$i]->country."</td> 
    <td>".$result[$i]->ip."</td>
    <td><input type='hidden' name='username' id='username' value='".$result[$i]->username."' />".$result[$i]->username."</td>
    <td><input type='hidden' name='token' id='token' value='".$result[$i]->token."' />"."</td>
    <td><button type='submit' class='btn btn-default'>delete</button></td>
  </form>
  </tr>
    ";
    }
echo "</table>";
if(!empty($_POST['id'])){
    var_dump($_POST);
}
?>
</div>
</div>
</div>
</div>