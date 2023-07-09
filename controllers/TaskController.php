<?php

/**
 * Controller of Task management
 * PHP version 8.2.4
 * 
 * @category TaskController
 * @package  TaskController
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */
require_once 'models/TaskModel.php';
require_once 'views/TaskView.php';

/**
 * Controller of Task management
 * PHP version 8.2.4
 * 
 * @category TaskController
 * @package  TaskController
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */
class TaskController
{
    private $_model;
    private $_view;

    /**
     * Define model and view
     */
    public function __construct()
    {
        $this->_model = new TaskModel();
        $this->_view = new TaskView();
    }

    /**
     * Render home page
     *
     * @return void
     */
    public function index()
    {
        $tasks = $this->_model->getAllTasks();
        $this->_view->renderIndex($tasks);
    }

    /**
     * Render create page
     *
     * @return void
     */
    public function create()
    {
        $this->_view->renderCreate();
    }

    /**
     * Store date 
     *
     * @param [array] $data array of form fields
     * 
     * @return void
     */
    public function store($data)
    {
        $this->_model->createTask($data);
        header('Location: index.php');
    }

    /**
     * Render edit page
     *
     * @param [int] $id 
     * 
     * @return void
     */
    public function edit($id)
    {
        $task = $this->_model->getTaskById($id);
        $this->_view->renderEdit($task);
    }

    /**
     * Update data
     *
     * @param [array] $data 
     * 
     * @return void
     */
    public function update($data)
    {
        $this->_model->updateTask($data);
        header('Location: index.php');
    }

    /**
     * Delete data
     *
     * @param [int] $id 
     * 
     * @return void
     */
    public function delete($id)
    {
        $this->_model->deleteTask($id);
        header('Location: index.php');
    }
}
