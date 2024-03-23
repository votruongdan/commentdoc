<?php
require_once(__DIR__ . "/../config/db.class.php");

class Product{
    // ID sản phẩm, tên sản phẩm, ID danh mục, giá, số lượng, mô tả, và hình ảnh.
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;
//Initializes the Product class, setting product information from the parameters.
    public function __construct($pro_name, $cate_id, $price, $quantity,
    $desc, $picture){
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    public function save(){
        $db = new Db();
        // Create $sql variable to insert products, run this variable below
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity,

        Description, Picture) VALUES
        ('$this->productName',
        '$this->cateID',
        '$this->price',
        '$this->quantity',
        '$this->description',
        '$this->picture')";
        // query_execute is a function from class Db
        $result = $db->query_execute($sql);
        return $result;
    }
    // Returns a list of all products as array from the database.
    public static function list_product(){
        $db = new DB();
        $sql = "SELECT * FROM product";
        // select_to_array is a function of class Db, used to output an array
        $rs = $db->select_to_array($sql);
return $rs;
    }
}?>