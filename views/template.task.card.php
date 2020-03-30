<?php if(count($tasks) > 0): ?>
    <?php $loop = 0; ?>
    <div class="uk-padding" uk-grid>
    <?php foreach ($tasks as $task): ?>
    <?php $loop += 1; ?>
        <div class="uk-width-1-3@m">
            <div class="uk-card <?php if($loop%2 == 1) { echo "uk-card-default"; } else { echo "uk-card-secondary" ;} ?> uk-card-hover uk-card-body uk-border-rounded">
                <div  uk-grid="masonry: true">
                    <div class="uk-width-5-6">
                        <h3 class="uk-card-title" <?php echo ($task['state']) ? 'style="text-decoration: line-through;"' : ''; ?>><?php echo $task['title']; ?></h3>
                    </div>
                    <?php if($task['state']): ?>
                    <div class="uk-width-1-6">
                        <span class="uk-float-right" uk-icon="check"></span>
                    </div>
                    <?php endif; ?>
                </div>

                <hr class="uk-divider-small">
                <p class="uk-text-meta">
                    <span uk-icon="clock"></span> Creat: <?php echo $task['created_at']?> <br>
                    <br>
                    <span uk-icon="info"></span> State: <?php echo ($task['state']) ? '<span class="uk-text-success">Done</span>' : '<span class="uk-text-warning">In progress</span>';?> <br>
                </p>
                <p><?php echo strip_tags($task['description']); ?></p>
                <hr>
                <div class="uk-float-right">
                    <a href="?action=delete&id=<?php echo $task['id']?>" class="uk-button-text uk-text-danger uk-button-small uk-margin-right uk-link-reset">Delete</a>
                    <?php if(!$task['state']): ?>
                    <a href="?action=check&id=<?php echo $task['id']?>" class="uk-button uk-button-small uk-button-primary">Check</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="uk-alert uk-alert-warning">
        No task. +add
    </div>
<?php endif; ?>