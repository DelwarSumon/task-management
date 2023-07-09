<?php

/**
 * Index of Task management
 * PHP version 8.2.4
 * 
 * @category Index
 * @package  Index
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */
require_once 'controllers/TaskController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = new TaskController();

switch ($action) {
case 'index':
    $controller->index();
    break;
case 'create':
    $controller->create();
    break;
case 'store':
    $controller->store($_POST);
    break;
case 'edit':
    $controller->edit($_GET['id']);
    break;
case 'update':
    $controller->update($_POST);
    break;
case 'delete':
    $controller->delete($_GET['id']);
    break;
default:
    echo "404 Not Found";
    break;
}
