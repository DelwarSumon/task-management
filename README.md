<p align="center"><a href="https://delwar-ecommerce.netlify.app/" target="_blank" ><img src="https://github.com/DelwarSumon/fs13-CSS-SASS/blob/main/logo.png?raw=true" style="width:150px; height:auto;"></a></p>

# Task Management (PHP MVC CRUD Application)
![PHP](https://img.shields.io/badge/PHP-v.8.2.4-green)

This Task Management Application demonstrates a basic implementation of a Create, Read, Update, and Delete (CRUD) functionality using the Model-View-Controller (MVC) architectural pattern.

## Features
* View a list of tasks
* Create a new task
* Edit an existing task
* Delete a task

## Installation
- Clone the repository: ```git clone https://github.com/DelwarSumon/task-management.git```
- Configure your web server to point to the project's directory.
- Create database, named **`task_manager`** and run the query to create table named **`tasks`**
  
  ```
      CREATE TABLE tasks (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL
      );
  ```
- Update the database connection credentials in the **`TaskModel`** class **(`models/TaskModel.php`)**.


*Thank you!*
