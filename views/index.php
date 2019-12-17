<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            Add_task($_POST['title'],$_POST['description'],0);
        } else {
            $have_error = 1;
            $error = 'title is required.';
        }
    }
    $tasks = Fetch_task();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alireza Personal Taskbook!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Alireza Bazargani">
        <meta name="description" content="AOT - Alireza's Own Taskbook">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/css/uikit.min.css" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/js/uikit-icons.min.js"></script>
    </head>
    <body>
        <div class="uk-container uk-remove-margin uk-background-secondary">
            <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li><a href="">Home</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="uk-container">
            <div class="uk-padding">
                <ul uk-accordion>
                    <li <?php if ($have_error) { echo 'class="uk-open"'; } ?>>
                        <a class="uk-accordion-title" href="#">Add new task</a>
                        <div class="uk-accordion-content">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <fieldset class="uk-fieldset">

                                    <legend class="uk-legend">Task Info</legend>

                                    <?php if($have_error): ?>
                                        <div class="uk-margin">
                                            <div class="uk-alert uk-alert-danger">
                                                <?php echo $error; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="uk-margin">
                                        <input class="uk-input" name="title" type="text" placeholder="title">
                                    </div>


                                    <div class="uk-margin">
                                        <textarea class="uk-textarea" name="description" rows="5" placeholder="description"><?php
                                            if ($have_error) {
                                                if (isset($_POST['description'])) {
                                                    echo $_POST['description']; 
                                                } 
                                            } 
                                           ?></textarea>
                                    </div>

                                    <div class="uk-margin">
                                        <button type="submit" class="uk-button uk-button-primary">Create</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    	<div class="uk-container uk-padding">
    		<div class="uk-overflow-auto">
                <h1>Tasks list</h1>
                <?php if(count($tasks) > 1): ?>
                <table class="uk-table uk-table-striped uk-table-hover">
                    <!-- <caption>Tasks</caption> -->
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>description</th>
                            <th>state</th>
                            <th>created_at</th>
                            <th>expires_at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>title</td>
                            <td>description</td>
                            <td>state</td>
                            <td>created_at</td>
                            <td>expires_at</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?php echo $task['title']?></td>
                            <td><?php echo $task['description']?></td>
                            <td><?php echo $task['state']?></td>
                            <td><?php echo $task['created_at']?></td>
                            <td><?php echo $task['expired_at']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <div class="uk-alert uk-alert-warning">
                        No task. +add
                    </div>
                <?php endif; ?> 
            </div>
    	</div>
    </body>
</html>