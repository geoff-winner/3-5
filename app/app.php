<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";

    session_start();
    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }
//If you enter this text it will work
    $app = new Silex\Application();

    $app->get("/", function(){

        $output = "";

        foreach (Task::getAll() as $task) {
            $output = $output . "<p>" . $task->getDescription() . "</p>";

        }

        $output = $output . "</ul>
            <form action='/tasks' method='post'>
                <label for ='description'>Task Description</label>
                <input id='description' name='description' type='text'>

                <button type='submit'>Add Task</button>
            </form>


        ";
        
    return $output;

});

    return $app;


?>
