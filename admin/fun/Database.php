<?php
class Database {
    private PDO $pdo;
    private string $table;

    public function __construct(string $table) {
        $this->table = $table;

        $configPath = __DIR__ . '/../../config/database.php';

        if (!file_exists($configPath)) {
            throw new RuntimeException(
                'Missing database config. Please copy config/database.example.php to config/database.php and configure it with your credentials'
            );
        }

        $config = require $configPath;

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            $config['host'],
            $config['dbname']
        );

        $this->pdo = new PDO(
            $dsn,
            $config['user'],
            $config['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }

    // returns an indexed array of all rows in a given table
    public function selectAll() {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Select rows with only 1 condition
    // example: $categories->select("parent", 0); returns all matching rows
    public function select($col, $val) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $col = :val");
        $stmt->execute(['val' => $val]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // example: $newId = $users->insert(
    //                          ["username"=>$username,
    //                           "password"=>$password, 
    //                           "email"=>$email, 
    //                           "gender"=>$genderId,
    //                           "pr"=>$prId]
    //                        );
    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    // example: $carts->update(["quantity"=>$quantity],"id", $id);
    public function update($data, $whereCol, $whereVal) {
        $set = implode(", ", array_map(fn($col) => "$col = :$col", array_keys($data)));
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET $set WHERE $whereCol = :whereVal");
        $data['whereVal'] = $whereVal; // we have to do this to avoid SQL injection and type mismatch errors
        return $stmt->execute($data);
    }

    // example: $products->delete("id", 4);
    public function delete($col, $val) {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE $col = :val");
        return $stmt->execute(['val' => $val]);
    }

    // returns only the number of all the rows in the table and not the whole rows
    public function countAll() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // returns only the number of rows and not the whole rows
    // example: $cart->countWhere("user_id", $user_id); counts how many items there are in a given customer's cart
    public function countWhere($col, $val) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->table} WHERE $col = :val");
        $stmt->execute(['val' => $val]);
        return $stmt->fetchColumn();
    }

    // allow for custom SQL operations that return data such as SELECT with custom conditions
    // example: $products->query("SELECT * FROM products ORDER BY RAND() LIMIT 8");
    // notice that the params were not needed in the above case
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}