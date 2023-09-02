<?php

function get_uploaded_file() 
{
    $uploadDir = 'services/image_handling/uploads/';    
    if (!file_exists($uploadDir)) 
    {
        mkdir($uploadDir, 0777, true);
    }
    $uploadedFile = $_FILES['image'];
    $fileName = $uploadDir . uniqid() . '_' . $uploadedFile['name'];

    return move_uploaded_file($uploadedFile['tmp_name'], $fileName) ? $fileName : '';
}