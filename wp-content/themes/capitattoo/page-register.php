<?php
ob_start();
// Template Name: Custom Register Page
get_header(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nonce check for security
    if (!isset($_POST['custom_registration_nonce']) || !wp_verify_nonce($_POST['custom_registration_nonce'], 'custom_user_registration')) {
        die('Security check failed.');
    }

    // Get form data and sanitize it
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = esc_attr($_POST['password']);
    $confirm_password = esc_attr($_POST['confirm_password']);
    $errors = [];

    // Validate form data
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = 'All fields are required.';
    } elseif (!is_email($email)) {
        $errors[] = 'Please enter a valid email address.';
    } elseif (username_exists($username) || email_exists($email)) {
        $errors[] = 'Username or email already exists.';
    } elseif ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // Register the user if no errors
    if (empty($errors)) {
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            $errors[] = $user_id->get_error_message();
        } else {
            // Log the user in after registration
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            wp_redirect(home_url('/'));
            exit;
        }
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style='background-color: rgba(0, 0, 0, 0.7);color:white;'>
                <div class="card-header bg-primary text-white" style='background-color:black !important;'>
                    <h3>Register an Account</h3>
                </div>
                <div class="card-body" style='background-color: rgba(0, 0, 0, 0.7);color:white;'>
                    <?php if (!empty($errors)) : ?>
                        <div class="alert alert-danger">
                            <?php echo implode('<br>', $errors); ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo esc_url(home_url('/register')); ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                        <!-- Add the nonce field for security -->
                        <?php wp_nonce_field('custom_user_registration', 'custom_registration_nonce'); ?>
                        <button type="submit" class="btn btn-light btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); 
ob_end_flush();

?>