<div class="help">
	<?php load_partial("menu"); ?>
</div>
<div id="changepass">
    <form action="" method="post" onsubmit="this.login.disabled=true;">
        <input type="hidden" name="action" value="changepass">
        <label for="username">Name:</label>
            <input type="text" name="email" disabled="disabled" value="<?php echo $name ?>">
        <label for="username">Email:</label>
            <input type="text" name="email" disabled="disabled" value="<?php echo $email ?>">
        <label for="newpassword">Password:</label>
            <input type="password" name="newpassword">
        <p>
            <input type="submit" name="login" value="Update">
        </p>
    </form>
</div>