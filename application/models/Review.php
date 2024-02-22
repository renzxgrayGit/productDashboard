<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Model
{
    function create_review($data, $id)
    {
        $sql = "INSERT INTO reviews (user_id, product_id, review, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?)";

        $this->db->query($sql, array($id, $data['product_id'], $data['review'], $data['created_at'], $data['updated_at']));
    }

    function create_reply($data, $id)
    {
        $sql = "INSERT INTO replies (user_id, product_id, review_id, reply, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->db->query($sql, array($id, $data['product_id'], $data['review_id'], $data['reply'], $data['created_at'], $data['updated_at']));
    }

    function get_reviews($id)
    {
        $sql = "SELECT reviews.*, users.first_name, users.last_name
                FROM reviews
                LEFT JOIN users ON users.id = reviews.user_id
                WHERE product_id = ?
                ORDER BY id DESC";

        return $this->db->query($sql, $id)->result_array();
    }

    function get_replies($id, $review_id)
    {
        $sql = "SELECT replies.*, users.first_name, users.last_name
                FROM replies
                LEFT JOIN users ON users.id = replies.user_id
                WHERE replies.product_id = ? AND replies.review_id = ?
                ORDER BY replies.id DESC";

        return $this->db->query($sql, array($id, $review_id))->result_array();
    }
}