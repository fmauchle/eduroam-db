<div class="help">
    <?php echo getLink("Login", "users/login") ?>
</div>
<div id="register">
    <form action="" method="post" onsubmit="this.login.disabled=true;">
        <input type="hidden" name="action" value="register">
        <label for="username">Email:</label>
            <input type="text" name="email">
        <label for="username">Name:</label>
            <input type="text" name="name">
        <label for="password">Location:</label>
            <textarea name="location" class="small_textarea"></textarea>
        <p>
            <input type="submit" name="login" value="Register">
        </p>
    </form>
</div>