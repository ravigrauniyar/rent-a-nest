<?php
    // Function to encrypt data using AES-256-CBC encryption
    function encrypt_data($data)
    {
        // Encryption key (should be kept secret)
        $encryptionKey = 'elite-encryption-key';
        
        // Initialization vector (IV) for AES encryption
        $iv = 'elite-encryption-iv';
        
        // Hash the IV using SHA-256 and take the first 16 characters as the IV
        $iv = substr(hash('sha256', $iv), 0, 16);

        // Convert data to JSON format
        $jsonString = json_encode($data);
        
        // Encrypt the JSON data using AES-256-CBC encryption with the key and IV
        $encryptedData = openssl_encrypt($jsonString, 'AES-256-CBC', $encryptionKey, 0, $iv);
        
        // Encode the encrypted data in base64 format for safe storage/transmission
        return base64_encode($encryptedData);
    }
    // Function to decrypt data that was previously encrypted using AES-256-CBC
    function decrypt_data($encryptedData)
    {
        // Encryption key (should match the key used for encryption)
        $encryptionKey = 'elite-encryption-key';
        
        // Initialization vector (IV) for AES encryption (should match the IV used for encryption)
        $iv = 'elite-encryption-iv';
        
        // Hash the IV using SHA-256 and take the first 16 characters as the IV
        $iv = substr(hash('sha256', $iv), 0, 16);

        // Decode the base64 encoded encrypted data
        $decodedData = base64_decode($encryptedData);
        
        // Decrypt the data using AES-256-CBC decryption with the key and IV
        $decryptedData = openssl_decrypt($decodedData, 'AES-256-CBC', $encryptionKey, 0, $iv);
        
        // Convert the decrypted JSON data back to its original format (array)
        return json_decode($decryptedData, true);
    }
?>
