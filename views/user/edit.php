<h1>User: Edit</h1>


<?php
	print_r($this->user);

	//en user vienen los datos que tome del usersinglelist

?>



<form method="post" action="<?php echo URL;?>user/editSave/<?php  echo $this->user[0]['userid']; ?>">
	<label>Login</label><input type="text" name="login" value="<?php  echo $this->user[0]['login']; ?>"/><br/>
	<label>Password</label><input type="text" name="password"/><br/>
	<label>Rol</label>
		<select name="role">
			<option value="default" <?php  if($this->user[0]['rol'] == 'default') echo 'selected';?>>Default</option>
			<option value="admin" <?php  if($this->user[0]['rol'] == 'admin') echo 'selected';?>>admin</option>
			<option value="owner" <?php  if($this->user[0]['rol'] == 'owner') echo 'selected';?>>owner</option>
		</select><br/>
	<label>&nbsp</label><input type="submit"/>
</form>