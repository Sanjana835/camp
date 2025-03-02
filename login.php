<?php include 'header.php'; ?>

<main class="login-page">
    <div class="login-container">
        <div class="login-section user-login">
            <h2>User Login</h2>
            <form action="user_login_process.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                <button type="submit" class="btn login-btn">Login</button>
            </form>
        </div>
        <div class="login-section admin-login">
            <h2>Admin Login</h2>
            <form action="admin_login_process.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                <button type="submit" class="btn login-btn">Login</button>
            </form>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

