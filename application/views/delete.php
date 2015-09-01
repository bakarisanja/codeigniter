<?php
	echo"<br />";
	echo "delete user with id: ".$id.", ".$username;
?>
<form action='actionDelete' method='post'>
	<input type="hidden" name="del_username" value='<?php echo $username; ?>' />
	<input type="hidden" name="del_token" value='<?php echo $token; ?>' />
	<input type='password' name='del_password' />
	<input type='submit' name='del_submit' />
</form>