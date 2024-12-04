<?php get_header(); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style='background-color: rgba(0, 0, 0, 0.7);color:white;'>
                <div class="card-header bg-primary text-white text-center" style='background-color:black !important;'>
                    <h3>Login to Your Account</h3>
                </div>
                <div class="card-body" style='background-color: rgba(0, 0, 0, 0.7);'>
                    <form method="post" action="<?php echo wp_login_url(); ?>">
                        <div class="form-group">
                            <label for="user_login">Username or Email</label>
                            <input type="text" name="log" id="user_login" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="user_pass">Password</label>
                            <input type="password" name="pwd" id="user_pass" class="form-control" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="rememberme" value="forever" id="rememberme">
                            <label class="form-check-label" for="rememberme">Remember Me</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-light btn-block">Login</button>
                        </div>
                        <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>" >
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a>
                    <br>
                    <a href="<?php echo site_url('/register'); ?>">Don't have an account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>