<h1>User</h1>

<form method="post" action="<?php echo URL;?>user/create">
	<label>Login</label><input type="text" name="login"/><br/>
	<label>Password</label><input type="text" name="password"/><br/>
	<label>Rol</label>
		<select name="role">
			<option value="default">Default</option>
			<option value="admin">admin</option>
		</select><br/>
	<label>&nbsp</label><input type="submit"/>
</form>
<!--&nbsp not breaking space-->
<hr/>

<table>
		<?php 
		foreach($this->userList as $key =>$value){
			echo '<tr>';
			echo '<td>'.$value['userid'].'</td>';
			echo '<td>'.$value['login'].'</td>';
			echo '<td>'.$value['rol'].'</td>';
			echo '<td>
			<a href="'.URL.'user/edit/'.$value['userid'].'">Edit</a> 
			<a href="'.URL.'user/delete/'.$value['userid'].'">Delete</a></td>';
			echo '</tr>';
		}

	//print_r($this->userList);
		?>
</table>
