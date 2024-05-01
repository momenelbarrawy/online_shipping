<?php
require_once("DBController.php");
$dbController = new DBController();
$dbController->openConnection();
class ProductEditor
{
    private $db;

    public function __construct(DBController $db)
    {
        $this->db = $db;
    }

    public function editProductName($productId, $newProductName)
    {
        $sql = "UPDATE product SET pname = ? WHERE pid = ?";

        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("si", $newProductName, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {

            echo "Product name updated successfully.";
        } else {
            echo "Error updating product name: " . $this->db->connection->error;
        }

        $stmt->close();
    }

    public function editProductPrice($productId, $newPrice)
    {
        $sql = "UPDATE product SET price = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("di", $newPrice, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product price updated successfully.";
        } else {
            echo "Error updating product price: " . $this->db->connection->error;
        }

        $stmt->close();
    }

    public function editProductCategory($productId, $newCategory)
    {
        $sql = "UPDATE product SET category = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("si", $newCategory, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product category updated successfully.";
        } else {
            echo "Error updating product category: " . $this->db->connection->error;
        }

        $stmt->close();
    }
    public function editProductBrand($productId, $newBrand)
    {
        $sql = "UPDATE product SET brand = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("si", $newBrand, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product brand updated successfully.";
        } else {
            echo "Error updating product brand: " . $this->db->connection->error;
        }

        $stmt->close();
    }
    public function editProductImage($productId, $newImage)
    {
        $sql = "UPDATE product SET image = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("si", $newImage, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product image updated successfully.";
        } else {
            echo "Error updating product image: " . $this->db->connection->error;
        }

        $stmt->close();
    }
    public function editProductDescription($productId, $newDescription)
    {
        $sql = "UPDATE product SET description = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("si", $newDescription, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product description updated successfully.";
        } else {
            echo "Error updating product description: " . $this->db->connection->error;
        }

        $stmt->close();
    }

    public function editProductRate($productId, $newRate)
    {
        $sql = "UPDATE product SET rate = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("di", $newRate, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product rate updated successfully.";
        } else {
            echo "Error updating product rate: " . $this->db->connection->error;
        }

        $stmt->close();
    }
    public function editProductRoll($productId, $newRoll)
    {
        $sql = "UPDATE product SET roll = ? WHERE pid = ?";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->bind_param("si", $newRoll, $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product roll updated successfully.";
        } else {
            echo "Error updating product roll: " . $this->db->connection->error;
        }

        $stmt->close();
    }
}
