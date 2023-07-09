<?php

/**
 * View of Task management
 * PHP version 8.2.4
 * 
 * @category TaskView
 * @package  TaskView
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */

/**
 * View of Task management
 * PHP version 8.2.4
 * 
 * @category TaskView
 * @package  TaskView
 * @author   Md Delwar Hossain <delwarsumon0@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     http://localhost/task-management
 */
class TaskView
{
    /**
     * Render header
     *
     * @return void
     */
    public function renderHeader()
    {
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, "
            . "initial-scale=1.0'>";
        echo "<title>Task Manager</title>";
        echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css'>";
        echo "</head>";
        echo "<body>";
        echo "<header>";
        echo "<h1>Task Manager</h1>";
        echo "<nav>";
        echo "<a href='index.php'>Home</a>";
        echo "<a href='index.php?action=create'>Create Task</a>";
        echo "</nav>";
        echo "</header>";
        echo "<div class='container'>";
    }

    /**
     * Render footer
     *
     * @return void
     */
    public function renderFooter()
    {
        echo "</div>";
        echo "<footer>";
        echo "<p>&copy; " . date('Y') . " Task Manager. All rights reserved.</p>";
        echo "</footer>";
        echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js'></script>";
        echo "</body>";
        echo "</html>";
    }

    /**
     * Render index
     *
     * @param [array] $tasks 
     * 
     * @return void
     */
    public function renderIndex($tasks)
    {
        $this->renderHeader();

        echo "<h1>Tasks</h1>";
        echo "<ul>";
        foreach ($tasks as $task) {
            echo "<li><a href='index.php?action=edit&id={$task['id']}'>"
                . "{$task['title']}</a></li>";
        }
        echo "</ul>";

        $this->renderFooter();
    }

    /**
     * Render create page
     *
     * @return void
     */
    public function renderCreate()
    {
        $this->renderHeader();

        echo "<h1>Create Task</h1>";
        echo "<form action='index.php?action=store' method='POST'>";
        echo "<input type='text' name='title' placeholder='Title' required><br>";
        echo "<textarea name='description' placeholder='Description' required>"
            . "</textarea><br>";
        echo "<button type='submit'>Create</button>";
        echo "</form>";

        $this->renderFooter();
    }

    /**
     * Render edit page
     *
     * @param [array] $task 
     * 
     * @return void
     */
    public function renderEdit($task)
    {
        $this->renderHeader();

        echo "<h1>Edit Task</h1>";
        echo "<form action='index.php?action=update' method='POST'>";
        echo "<input type='hidden' name='id' value='{$task['id']}'>";
        echo "<input type='text' name='title' value='{$task['title']}' "
            . "required><br>";
        echo "<textarea name='description' required>{$task['description']}"
            . "</textarea><br>";
        echo "<button type='submit'>Update</button>";
        echo "</form>";
        echo "<form action='index.php?action=delete&id={$task['id']}' "
            . "method='POST'>";
        echo "<button type='submit'>Delete</button>";
        echo "</form>";

        $this->renderFooter();
    }
}
