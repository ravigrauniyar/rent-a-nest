<?php 
    // Include the encryption and decryption functions from "json_encryption.php"
    include "json_encryption.php";

    // Function to serialize data into an encrypted URL parameter
    function serialize_url($page, $action='view', $id=0, $result=null)
    {
        // Create an array containing the data to be serialized
        $data = array(
            'page' => $page,
            'action' => $action,
            'id' => $id,
            'result' => $result ?? false
        );

        // Encrypt the data and return it as a URL parameter
        return encrypt_data($data);
    }
    // Function to deserialize an encrypted URL parameter into data
    function deserialize_url($encryptedData)
    {
        // Decrypt the encrypted URL parameter
        $data = decrypt_data($encryptedData);
        
        // Process and validate the decrypted data, setting default values as needed
        $data['page'] = isset($data['page']) ? $data['page'] : 'home';
        $data['action'] = isset($data['action']) && !empty($data['action']) ? $data['action'] : 'view';
        $data['id'] = isset($data['id']) && $data['id'] !== 0 ? $data['id'] : 0;
        $data['result'] = isset($data['result']) &&!empty($data['result'])? $data['result'] : false;

        // Return the processed data as an array
        return $data;
    }
?>
