<?php
    function encrypt_data($data)
    {
        $encryptionKey = 'elite-encryption-key';
        $iv = 'elite-encryption-iv';
        $iv = substr(hash('sha256', $iv), 0, 16);

        $jsonString = json_encode($data);
        $encryptedData = openssl_encrypt($jsonString, 'AES-256-CBC', $encryptionKey, 0, $iv);
        return base64_encode($encryptedData);
    }
    function initialize_url()
    {
        $data = array(
            'page' => 'home',
            'action' => 'view',
            'id' => 0
        );
        return encrypt_data($data);
    }
    function serialize_url($page, $action='view', $id=0, $result=null)
    {
        $data = array(
            'page' => $page,
            'action' => $action,
            'id' => $id,
            'result' => $result ?? false
        );
        return encrypt_data($data);
    }
    function deserialize_url($encryptedData)
    {
        $encryptionKey = 'elite-encryption-key';
        $iv = 'elite-encryption-iv';
        $iv = substr(hash('sha256', $iv), 0, 16);

        $decodedData = base64_decode($encryptedData);
        return json_decode(openssl_decrypt($decodedData, 'AES-256-CBC', $encryptionKey, 0, $iv), true);
    }