<nav>
    <h1>{$titulo}</h1>
    {if !$admin}
        <form method="POST" action="auth" id="form">
            <div>
                <label>Usuario</label>
                <input type="text" name="userID" placeholder="Mail">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="passID" placeholder="Pass">
            </div>
            <input type="submit" name="login" value="Login">
            <input type="submit" name="register" value="Register">
        </form>
    {/if}
    <div class="row">
    {if isset($user)}
        <h1>Bienvenido, {$user}!</h1>
    </div>
    <div class="row">
        <h4><a href="logout" class="link">Logout</a></h4>
    {/if}
    <h4><a href="home" class="link">Back</a></h4>
    </div>
</nav>