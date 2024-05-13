<?php
/*
Plugin Name: Custom Contact Form Annemiek
Description: A Contact Form for Annemiek ter Steeg
Version: 1.0
Author: Sander Bakkum
*/

// styles and scripts
function custom_contact_form_scripts() {
    
}
add_action('wp_enqueue_scripts', 'custom_contact_form_scripts');

// Function to handle form submission
function custom_contact_form_handle_submission() {
    if (isset($_POST['submit'])) {
        // Sanitize inputs
        $email = sanitize_email($_POST['email']);
        $message = sanitize_text_field($_POST['message']);

        // Email parameters
        $to = 'youremail@example.com'; // Change this to your email
        $subject = 'New Contact Form Submission';
        $body = "Email: $email\n\nMessage: $message";
        $headers = array('Content-Type: text/html; charset=UTF-8');

        // Send email
        wp_mail($to, $subject, $body, $headers);
    }
}

// Hook into init for form submission handling
add_action('init', 'custom_contact_form_handle_submission');

// Function to display the contact form
function custom_contact_form() {
    ob_start();
    ?>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="message">Bericht:</label>
        <textarea name="message" id="message" required></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    return ob_get_clean();
}

// Shortcode to display the contact form
function custom_contact_form_shortcode() {
    return custom_contact_form();
}
add_shortcode('custom_contact_form', 'custom_contact_form_shortcode');
?>
