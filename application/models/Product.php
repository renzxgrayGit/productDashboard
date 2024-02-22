<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
 	function index()
	{   
		
	}

	function get_products()
    {
        $sql = "SELECT * FROM products";
        return $this->db->query($sql)->result_array();
    }

	function create_product($data)
    {
        $sql = "INSERT INTO products (name, description, price, inventory_count, created_at, updated_at) 
				VALUES (?, ?, ?, ?, ?, ?)";
        $data = array(
                $data['name'],
                $data['description'],
                $data['price'],
				$data['inventory_count'],
                $data['created_at'],
                $data['updated_at'] );

        return $this->db->query($sql, $data);
    }

	function get_product_by_id($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->db->query($sql, $id)->row_array();
    }

	function update_product($id, $data)
    {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, inventory_count = ?, updated_at = ? WHERE id = ?";
        return $this->db->query($sql, array($data['name'], $data['description'], $data['price'], $data['inventory_count'], $data['updated_at'], $id));
    }

	function delete_product($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->db->query($sql, array($id));
    }

    function create_review($data, $id)
    {
        $sql = "INSERT INTO reviews (user_id, review, created_at, updated_at)
                VALUES (?, ?, ?, ?)";

        $this->db->query($sql, array($id, $data['review'], $data['created_at'], $data['updated_at']));
    }
}
