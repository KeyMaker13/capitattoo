<?php get_header(); ?>
<div style='color:white;background-color: rgba(0, 0, 0, 0.7);'>
<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data" class="container mt-5">
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
    </div>

    <div class="form-group">
        <label for="description">Tattoo Design/Description</label>
        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Describe your tattoo idea" required></textarea>
    </div>

    <div class="form-group">
        <label for="reference">Reference Image (Optional)</label>
        <input type="file" id="image" name="image" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="comments">Additional Comments (Optional)</label>
        <textarea id="comments" name="comments" class="form-control" rows="3" placeholder="Any other details you want to share"></textarea>
    </div>

    <div class="form-check">
        <input type="checkbox" id="consent" name="consent" class="form-check-input" required>
        <label for="consent" class="form-check-label">
            I understand the risks associated with getting a tattoo
        </label>
    </div>

    <div class="form-check">
        <input type="checkbox" id="age-confirmation" name="age_confirmation" class="form-check-input" required>
        <label for="age-confirmation" class="form-check-label">
            I confirm that I am 18 years of age or older
        </label>
    </div>
    <input type="hidden" name="action" value="submit_booking_form">
    <?php wp_nonce_field('book_appointment_action', 'book_appointment_nonce'); ?>
    <button type="submit" class="btn btn-light mt-4">Book Appointment</button>
</form>
</div>


<?php get_footer(); ?>