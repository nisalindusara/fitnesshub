<?php

require_once __DIR__ . '/../core/Model.php';

class User extends Model 
{
    public function register(array $userData): bool 
    {
        $query = "INSERT INTO users (first_name, last_name, email, phone_number, password_hash) 
                  VALUES (:first_name, :last_name, :email, :phone_number, :password_hash)";
        
        $stmt = $this->db->prepare($query);
        
        // Execute the prepared statement with the passed array of data
        return $stmt->execute([
            ':first_name'    => $userData['first_name'],
            ':last_name'     => $userData['last_name'],
            ':email'         => $userData['email'],
            ':phone_number'  => $userData['phone_number'],
            ':password_hash' => $userData['password_hash']
        ]);
    }
}