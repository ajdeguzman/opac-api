<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 */
class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/db_connect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }


    /**
     * Fetching books by title
     * 
     */
    public function getBooksByTitle($title) {
        $param = "%{$title}%";
        $stmt = $this->conn->prepare("SELECT * from tbl_books WHERE book_list_title LIKE ?");
        $stmt->bind_param('s', $param);
        if ($stmt->execute()) {
            $books = $stmt->get_result();
            $stmt->close();
            return $books;
        } else {
            return NULL;
        }
    }


    /**
     * Fetching all books by author
     * 
     */
    public function getBooksByAuthor($author) {
        $param = "%{$author}%";
        $stmt = $this->conn->prepare("SELECT * from tbl_books WHERE book_list_author LIKE ?");
        $stmt->bind_param('s', $param);
        if ($stmt->execute()) {
            $books = $stmt->get_result();
            $stmt->close();
            return $books;
        } else {
            return NULL;
        }
    }

}

?>
