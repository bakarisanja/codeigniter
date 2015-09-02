<div class="col-md-offset-3">
<?php
	echo "delete user with id ".$id.", username ".$username;
	if(!empty($result)) echo"<br />".$result;
?>
<form role="form" action='actionDelete' method='post'>
	<input type="hidden" name="del_id" value='<?php echo $id; ?>' />
	<input type="hidden" name="del_username" value='<?php echo $username; ?>' />
	<input type="hidden" name="del_token" value='<?php echo $token; ?>' />
	<input type='password' name='del_password' />
	<input type='submit' name='del_submit' />
</form>
</div>