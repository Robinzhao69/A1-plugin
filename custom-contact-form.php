<?php
/*
Plugin Name: Contact Form A1
Description: A Contact Form for Annemiek ter Steeg
Version: 1.1
Author: Sander Bakkum
*/

// styles and scripts
function custom_contact_form_scripts()
{
    // Enqueue CSS file
    wp_enqueue_style('custom-contact-form-style', plugin_dir_url(__FILE__) . 'style.css');
}
add_action('wp_enqueue_scripts', 'custom_contact_form_scripts');

// Function to handle form submission
function custom_contact_form_handle_submission()
{
    if (isset($_POST['submit'])) {
        
        $name = sanitize_text_field($_POST['naam']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_text_field($_POST['message']);

        // Email parameters
        $to = '31918@ma-web.nl'; 
        $subject = 'New Contact Form Submission';
        $body = "Naam:  $name <br><br> Email: $email <br><br> Message: $message";
        $headers = array('Content-Type: text/html; charset=UTF-8');

        // Send email
        wp_mail($to, $subject, $body, $headers);
    }
}

// Hook into init for form submission handling
add_action('init', 'custom_contact_form_handle_submission');

// Function to display the contact form
function custom_contact_form()
{
    ob_start();
?>
    <form method="post" class="custom-contact-form">
        <input type="text" name="naam" placeholder="Naam" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <textarea name="message" placeholder="Vraag of opmerking" required></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php
    return ob_get_clean();
}

// Shortcode to display the contact form
function custom_contact_form_shortcode()
{
    return custom_contact_form();
}
add_shortcode('custom_contact_form', 'custom_contact_form_shortcode');
?>