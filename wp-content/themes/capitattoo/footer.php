
<footer>
    <div style='height:100px;'>

    </div>
    <div class="container-fluid" style="background-color:black; color:white; padding:20px;">
        <div class="row">
            <!-- Store Hours -->
            <div class="col-md-4">
                <h5>Store Hours</h5>
                <ul class="list-unstyled">
                    <li>Monday - Friday: 10 AM - 8 PM</li>
                    <li>Saturday: 10 AM - 6 PM</li>
                    <li>Sunday: Closed</li>
                    <li>Phone: 555-555-5555</li>
                    <li>Email: admin@capitattoo.com</li>
                </ul>
            </div>
            
            <!-- Social Media Links -->
            <div class="col-md-4 text-center">
                <h5>Follow Us</h5>
                <a href="https://facebook.com/yourpage" target="_blank">
                    <i class="fab fa-facebook fa-2x" style="color:white;"></i>
                </a>
                <a href="https://instagram.com/yourpage" target="_blank" class="ml-3">
                    <i class="fab fa-instagram fa-2x" style="color:white;"></i>
                </a>
                <a href="https://tiktok.com/@yourpage" target="_blank" class="ml-3">
                    <i class="fab fa-tiktok fa-2x" style="color:white;"></i>
                </a>
            </div>
            
            <!-- Store Location -->
            <div class="col-md-4">
                <h5>Our Location</h5>
                <div id="map" style="width:100%;height:150px;">
                    <!-- Google Maps Embed -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8354345075534!2d-122.41941548468196!3d37.77492977975939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809cfd36d9fb%3A0x27a64b56e0ff924d!2sYour%20Tattoo%20Shop!5e0!3m2!1sen!2sus!4v1607880077806!5m2!1sen!2sus" 
                        width="100%" 
                        height="150" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
        
        <!-- Privacy Policy and Terms Modals -->
        <div class="text-center mt-4">
            <button type="button" class="btn btn-link text-white" data-toggle="modal" data-target="#privacyModal">
                Privacy Policy
            </button>
            |
            <button type="button" class="btn btn-link text-white" data-toggle="modal" data-target="#termsModal">
                Terms of Service
            </button>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="container text-center mt-3" style='background-color:black;color:white;'>
        <p>&copy; <?php echo date('Y'); ?> Capi Tattoo. All rights reserved.</p>
    </div>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="color:black;">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your privacy policy content goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms of Service Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="color:black;">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms of Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your terms of service content goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  

    <?php wp_footer(); ?>
</footer>
<!-- Add Font Awesome and Bootstrap 4 dependencies -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>-->

<!-- for artists page -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/templatemo-script.js"></script>


</body>
</html>
