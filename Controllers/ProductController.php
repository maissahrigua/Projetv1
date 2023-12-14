<?php 
require_once '../../Models/product.php';
require_once '../../Controllers/connexion.php';
class ProductController
{
    protected $db;
    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function getCategories()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from category";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function addProduct(Product $product)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="insert into product values ('','$product->name','$product->description','$product->price','$product->quantity','$product->image',$product->categoryid)";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getAllProducts()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select product.id,product.name,price,quantity,category.name as 'category' from product,category where product.categoryid=category.id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function searchProduct($name)
    {
      $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select from product where name = $name";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
   
    public function deleteProduct( $id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="delete from product where id = $id";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getAllProductsWithImages()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select product.id,product.name,price,quantity,category.name as 'category',image from product,category where product.categoryid=category.id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    
    
    public function getCategoryProducts($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select product.id,product.name,price,quantity,category.name as 'category',image from product,category where product.categoryid=category.id and category.id=$id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    
    
}

?>