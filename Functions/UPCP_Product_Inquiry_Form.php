<?php
function UPCP_Product_Inquiry_Form() {
	$plugin = "contact-form-7/wp-contact-form-7.php";
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$CF_7_Installed = is_plugin_active($plugin);

	if ($CF_7_Installed) {
		$Admin_Email = get_option('admin_email');
		$Blogname = get_option('blogname');
		$Site_URL = get_bloginfo('siteurl');

		$UPCP_Contact_Form = get_page_by_path('upcp-product-inquiry-form', OBJECT, 'wpcf7_contact_form');

		if ($UPCP_Contact_Form) {
			$user_update = array("Message_Type" => "Upcate", "Message" => "Inquiry form already exists.");
			return $user_update;
		}

		$post = array(
			'post_name' => 'upcp-product-inquiry-form',
			'post_title' => 'UPCP Inquiry Form',
			'post_type' => 'wpcf7_contact_form',
			'post_content' => 
'<p>Your Name (required)<br />
    [text* your-name] </p>
				
<p>Your Email (required)<br />
    [email* your-email] </p>

<p>Inquiry Product Name<br />
    [text product-name] </p>

<p>Your Message<br />
    [textarea your-message] </p>

<p>[submit "Send"]</p>
Product Inquiry E-mail
[your-name] <' . $Admin_Email . '>
From: [your-name] <[your-email]>
Interested Product: [product-name]

Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')
' . $Admin_Email . '
Reply-To: [your-email]

0
0

[your-subject]
' . $Blogname . ' <' . $Admin_Email . '>
Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')
[your-email]
Reply-To: ' . $Admin_Email . '

0
0
Your message was sent successfully. Thanks.
Failed to send your message. Please try later or contact the administrator by another method.
Validation errors occurred. Please confirm the fields and submit it again.
Failed to send your message. Please try later or contact the administrator by another method.
Please accept the terms to proceed.
Please fill in the required field.
This input is too long.
This input is too short.
			');
		
		$insert_result = wp_insert_post( $post);

		if ($insert_result != 0) {
			$Sender_Character_Count = strlen($Blogname . ' <' . $Admin_Email . '>');
			$Reply_To_Admin_Character_Count = strlen('Reply-To: ' . $Admin_Email);
			$Admin_Email_Character_Count = strlen($Admin_Email);
			$Message_Character_Count = strlen(
"From: [your-name] <[your-email]>
Interested Product: [product-name]

Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')
				");

			add_post_meta($insert_result, "_mail", 
'a:8:{s:7:"subject";s:22:"Product Inquiry E-mail";s:6:"sender";s:' . $Sender_Character_Count . ':"' . $Blogname . ' <' . $Admin_Email . '>";s:4:"body";s:' . $Message_Character_Count . ':"From: [your-name] <[your-email]>
Interested Product: [product-name]

Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')";s:9:"recipient";s:' . $Admin_Email_Character_Count . ':"' . $Admin_Email .'";s:18:"additional_headers";s:22:"Reply-To: [your-email]";s:11:"attachments";s:0:"";s:8:"use_html";i:0;s:13:"exclude_blank";i:0;}
			');
			add_post_meta($insert_result, "_form", 
'<p>Your Name (required)<br />
    [text* your-name] </p>
				
<p>Your Email (required)<br />
    [email* your-email] </p>

<p>Inquiry Product Name<br />
    [text product-name] </p>

<p>Your Message<br />
    [textarea your-message] </p>

<p>[submit "Send"]</p>
			');
			add_post_meta($insert_result, "_mail_2", 
'a:9:{s:6:"active";b:0;s:7:"subject";s:22:"Product Inquiry E-mail";s:6:"sender";s:' . $Sender_Character_Count . ':"' . $Blogname . ' <' . $Admin_Email . '>";s:4:"body";s:' . $Message_Character_Count . ':"From: [your-name] <[your-email]>
Interested Product: [product-name]

Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')";s:9:"recipient";s:12:"[your-email]";s:18:"additional_headers";s:' . $Reply_To_Admin_Character_Count . ':"Reply-To: ' . $Admin_Email . '";s:11:"attachments";s:0:"";s:8:"use_html";i:0;s:13:"exclude_blank";i:0;}
			');
			add_post_meta($insert_result, "_messages", 
'a:8:{s:12:"mail_sent_ok";s:43:"Your message was sent successfully. Thanks.";s:12:"mail_sent_ng";s:93:"Failed to send your message. Please try later or contact the administrator by another method.";s:16:"validation_error";s:74:"Validation errors occurred. Please confirm the fields and submit it again.";s:4:"spam";s:93:"Failed to send your message. Please try later or contact the administrator by another method.";s:12:"accept_terms";s:35:"Please accept the terms to proceed.";s:16:"invalid_required";s:34:"Please fill in the required field.";s:16:"invalid_too_long";s:23:"This input is too long.";s:17:"invalid_too_short";s:24:"This input is too short.";}
			');
			add_post_meta($insert_result, "_additional_settings", '');
			add_post_meta($insert_result, "_locale", 'en_US');
		}

		if ($insert_result != 0) {$user_update = array("Message_Type" => "Update", "Message" => "Product inquiry form successfully created.");}
		else {$user_update = array("Message_Type" => "Error", "Message" => "Inquiry form could not be created.");}
	}
	else {
		$user_update = array("Message_Type" => "Error", "Message" => "Contact Form 7 must be activated.");
	}	

	return $user_update;
}

?>