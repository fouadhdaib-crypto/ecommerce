<?php
declare(strict_types=1);



namespace App\Models;

use App\Core\Database;
use PDO;

  enum UserMode: string
    {
        case ADD_NEW = 'add_new';
        case UPDATE = 'update';
    }
   

 class User
{
    private Database $database;
    private PDO $connection;
   
    public function __construct(
        private ?int $id,
        private? string $name,
        private string $email,
        private string $password,
        private? string $role,
        private UserMode $mode = UserMode::ADD_NEW,
 
    ) {


         $this->database = new Database();
        $this->connection = $this->database->connect();
    }

    public function save(): void
    {
        match ($this->mode) {
            UserMode::ADD_NEW => $this->addNew(),
            UserMode::UPDATE => $this->update()
        };
    }


    public function login(string $email, string $password): ?bool
    {
                
                $query = "SELECT * FROM users WHERE email = :email";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                 $user = $stmt->fetch(PDO::FETCH_ASSOC);



                 return $user !== false
                   && password_verify($password, $user['password']);

                
    }


    private function addNew(): void
    {
        $query = "INSERT INTO users (name, email, password, role)
          VALUES (:name, :email, :password, :role)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->execute();
    }


    private function update(): void
    {
        
        $query = "UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

    }


    public function getAll(): array
    {
            
        $query = "SELECT * FROM users";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById(int $id): ?array
    {
        
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    public function getuserbyemail(string $email): ?array
    {
        
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    public function delete(int $id): void
    {
        
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }
}