<?php 
namespace app\models;

use app\core\Database; 

class Product_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getProductsByUserId($userId) {
        $query = 
        "
        SELECT 
            p.product_id,
            p.user_id,
            c.categories AS category_name,
            p.status,
            p.product_name,
            p.image,
            p.product_price,
            p.descriptions
        FROM 
            PRODUCTS p
        JOIN 
            CATEGORIES c 
        ON 
            p.categories_id = c.categories_id
        WHERE 
            p.user_id = :user_id";
        $this->db->query($query);
        $this->db->bind(':user_id', $userId);
        return $this->db->resultSet();
    }

    public function addProduct($productId, $userId, $categoryId, $status, $productName, $imagePath, $productPrice, $productDescription) {
        $query = "INSERT INTO products VALUES (:product_id, :user_id, :category_id, :status, :name, :image, :price, :description)";
    
        $this->db->query($query);

        $this->db->bind(':product_id', $productId);
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':category_id', $categoryId);
        $this->db->bind(':status', $status);
        $this->db->bind(':name', $productName);
        $this->db->bind(':image', $imagePath);
        $this->db->bind(':price', $productPrice);
        $this->db->bind(':description', $productDescription);
    
        return $this->db->execute();
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE product_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateProduct($id, $productName, $productCategory, $productPrice, $productDescription, $imagePath) {
        $query = "UPDATE products SET product_name = :name, category = :category, product_price = :price, descriptions = :description" . 
                 ($imagePath ? ", image = :image" : "") . 
                 " WHERE product_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $productName);
        $this->db->bind(':category', $productCategory);
        $this->db->bind(':price', $productPrice);
        $this->db->bind(':description', $productDescription);
        if ($imagePath) {
            $this->db->bind(':image', $imagePath);
        }
        return $this->db->execute();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE product_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}