<?php
    require '../core/processor.php';

    $tasks = Fetch_task();
    $view = require '../core/views.php';
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
        <script src="https://cdn.tiny.cloud/1/b3zbxrwztsjum71vs51caf64xuyitiqpxu3irnfb1i7qgusn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!--        <script>-->
<!--            tinymce.init({-->
<!--                selector:'#description',-->
<!--                plugins : 'visualblocks wordcount ltr rtl directionality advlist autolink link image lists charmap print preview table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol code',-->
<!--                toolbar: 'visualblocks wordcount ltr rtl directionality advlist autolink link image lists charmap print preview table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol code',-->
<!--                directionality : "rtl",-->
<!--                height: 500-->
<!--            });-->
<!--        </script>-->
    </head>
    <body>
        <div class="uk-container uk-remove-margin uk-background-secondary">
            <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li><a href="">Home</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a href="https://github.com/arbazargani/Tiny-Task.git" class="uk-text-danger" target="_blank">
                                <span uk-icon="icon: github"></span>
                            </a>
                        </li>
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
                                        <textarea class="uk-textarea" id="description" name="description" rows="5" placeholder="description"><?php
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
    	<div class="uk-container uk-padding uk-background-muted">
    		<div class="uk-overflow-auto">
                <h1 class="uk-text-left">Tasks list</h1>
                <p class="uk-text-right">
                    <a class="<?php echo (View_matches('table')) ? 'uk-label' :''; ?>" href="?view=table" uk-icon="icon: menu"></a>
                    <a class="<?php echo (View_matches('accordion')) ? 'uk-label' :''; ?>" href="?view=accordion" uk-icon="icon: list"></a>
                    <a class="<?php echo (View_matches('card')) ? 'uk-label' :''; ?>" href="?view=card" uk-icon="icon: thumbnails"></a>
                <p>
                <?php
                    if ($view) {
                        include ("template.task.".$_GET['view'].".php");
                    } else {
                        include("template.task.card.php");
                    }
                ?>
            </div>
    	</div>
    </body>
</html>