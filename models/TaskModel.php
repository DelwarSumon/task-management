<?php

/**
 * Model of Task management
 * PHP version 8.2.4
 * 
 * @category TaskModel
 * @package  TaskModel
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */

/**
 * Model of Task management
 * PHP version 8.2.4
 * 
 * @category TaskModel
 * @package  TaskModel
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */
class TaskModel
{
    private $_db;

    /**
     * Configure DB connection
     */
    public function __construct()
    {
        // Update the database credentials based on your configuration
        $host = 'localhost';
        $dbname = 'task_manager';
        $username = 'root';
        $password = '';

        try {
            $this->_db = new PDO(
                "mysql:host=$host;
                dbname=$dbname",
                $username,
                $password
            );
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    /**
     * Get all tasks
     *
     * @return array
     */
    public function getAllTasks()
    {
        $query = "SELECT * FROM tasks";
        $stmt = $this->_db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get task by id
     *
     * @param [int] $id 
     * 
     * @return array
     */
    public function getTaskById($id)
    {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Store data in DB
     *
     * @param [array] $data 
     * 
     * @return void
     */
    public function createTask($data)
    {
        $query = "INSERT INTO tasks (title, description) "
            . "VALUES (:title, :description)";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->execute();
    }

    /**
     * Update data in DB
     *
     * @param [array] $data 
     * 
     * @return void
     */
    public function updateTask($data)
    {
        $query = "UPDATE tasks SET title = :title, description = :description "
            . "WHERE id = :id";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    }

    /**
     * Delete data from DB
     *
     * @param [int] $id 
     * 
     * @return void
     */
    public function deleteTask($id)
    {
        $query = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
