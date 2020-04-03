<?php include 'inc/header.php' ?>
<div class="row marketing">
    <form method="POST" action="login.php">
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" value="Login" />
        </div>
        <div class="form-group">
            <div class="well" style="text-align: center;">
                <p>No account yet? Register new account <a href="register.php">here</a>!
            </div>
        </div>
    </form>
</div>
<?php include 'inc/footer.php' ?>