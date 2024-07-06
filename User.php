<?php
class User {
    private $conn;
    private $table_name = "users";

    public $matric;
    public $name;
    public $password;
    public $role;

    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET matric=:matric, name=:name, password=:password, role=:role";
        $stmt = $this->conn->prepare($query);

        $this->matric=htmlspecialchars(strip_tags($this->matric));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->role=htmlspecialchars(strip_tags($this->role));

        $stmt->bindParam(":matric", $this->matric);
        $stmt->bindParam(":name", $this->name);
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":role", $this->role);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    function read(){
        $query = "SELECT matric, name, role FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readOne(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE matric = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->matric);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->role = $row['role'];
        $this->password = $row['password'];
    }

    function update(){
        $query = "UPDATE " . $this->table_name . " SET name = :name, role = :role WHERE matric = :matric";
        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->role=htmlspecialchars(strip_tags($this->role));
        $this->matric=htmlspecialchars(strip_tags($this->matric));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':matric', $this->matric);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE matric = ?";
        $stmt = $this->conn->prepare($query);

        $this->matric=htmlspecialchars(strip_tags($this->matric));

        $stmt->bindParam(1, $this->matric);

        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>
