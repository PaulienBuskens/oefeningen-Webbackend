<?php echo form_open('login/') ?>
	<ul>
		<li class="<?php echo form_error('email') ? 'input-error' : '' ?>">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?php echo set_value('email') ?>">
			<?php echo form_error('email') ?>
		</li>
		
		<li class="<?php echo form_error('password') ? 'input-error' : '' ?>">
			<label for="password">Paswoord</label>
			<input type="password" name="password" id="password" value="<?php echo set_value('password') ?>">
			<?php echo form_error('password') ?>
		</li>
	</ul>
	
	<input type="submit" name="submit" value="log in" />
</form>

<p>Nog geen login? <a href="register">Registreer dan hier.</a></p>

<p>Opm: het paswoord van alle gebruikers is "test"</p>