<?php
// Define your SMTP server and port
$smtpServer = "mail.sourcecodespoint.com";
$smtpPort = 587; 

ini_set("SMTP", $smtpServer);
ini_set("smtp_port", $smtpPort);
ini_set("sendmail_from", "test@sourcecodespoint.com");
ini_set("sendmail_path", "/usr/sbin/sendmail -t -i");

// Connect to the SMTP server
$smtpConnection = fsockopen($smtpServer, $smtpPort, $errno, $errstr, 30);

if (!$smtpConnection) {
    die("Could not connect to the SMTP server: $errstr ($errno)");
}

// Perform EHLO handshake
fputs($smtpConnection, "EHLO test@sourcecodespoint.com\r\n");

// Read and discard the server response
while ($data = fgets($smtpConnection, 4096)) {
    if (substr($data, 3, 1) === " ") {
        break;
    }
}

    