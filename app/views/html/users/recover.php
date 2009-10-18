<div class="help">
    <?php load_partial("menu"); ?>
</div>
<div class="help">
    <?php echo getLink("Register", "users/register") ?> or <?php echo getLink("Login", "users/login") ?>
</div>
<div id="recover">
    <form action="" method="post" onsubmit="this.recover.disabled=true;">
        <input type="hidden" name="action" value="recover">
        <label for="username">Email:</label>
            <input type="text" name="email">
        <p>
            <input type="submit" name="recover" value="Recover">
        </p>
    </form>
</div>