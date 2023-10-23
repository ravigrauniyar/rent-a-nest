<?php
    $mail_result = '';
    if (isset($_POST['send_email'])) 
    {
        $recipients = $_POST['recipients'];
        $subject = $_POST['subject'];
        $message_body = $_POST['message'];

        $headers = 'From: ravi.rauniyar@truenary.com';

        $attachment = '';

        // Check if an attachment was uploaded
        if (isset($_FILES['attachments']) && $_FILES['attachments']['error'] == 0) {
            $file_name = $_FILES['attachments']['name'];
            $file_tmp = $_FILES['attachments']['tmp_name'];
            $file_type = $_FILES['attachments']['type'];

            // Read the file content
            $file_content = file_get_contents($file_tmp);

            // Create a boundary for the email parts
            $boundary = md5(time());

            // Add the message part
            $message = "This is a multi-part message in MIME format.\r\n\r\n";
            $message .= "--$boundary\r\n";
            $message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
            $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $message .= $message_body . "\r\n\r\n";

            // Add the attachment part
            $message .= "--$boundary\r\n";
            $message .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n";
            $message .= base64_encode($file_content) . "\r\n\r\n";
            $message .= "--$boundary--\r\n";

            // Set additional headers for multipart MIME
            $headers .= "\r\nMIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
        } else 
        {
            $message = $message_body;
        }
        // Send the email
        if (mail($recipients, $subject, $message, $headers)) 
        {
            $mail_result = "Email sent successfully.";
            // Close the SMTP connection
            fclose($smtpConnection);
        } else {
            $mail_result = "Email couldn't be sent.";
        }
    }
    include 'components/dashboard/email.php';
?>
