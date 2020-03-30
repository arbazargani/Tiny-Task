<?php if(count($tasks) > 0): ?>
    <?php $loop = 0; ?>
    <?php foreach ($tasks as $task): ?>
    <?php $loop ++; ?>
    <div class="uk-container uk-margin" style="border: 1px solid lightgrey; border-radius: 5px">
        <ul uk-accordion>
            <li class="uk-padding">
                <a class="uk-accordion-title <?php if($loop % 2 == 0) { echo "uk-text-primary"; } ?>" href="#"><?php echo $task['title']?></a>
                <div class="uk-accordion-content">
                    <p class="uk-text-meta">
                        State: <?php echo $task['state']?> |
                        Creat: <?php echo $task['created_at']?> |
                        Expire: <?php echo $task['expired_at']?> |
                    </p>
                    <p><?php echo $task['description']?></p>
                    <p class="uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Close</button>
                        <button class="uk-button uk-button-primary" type="button">Edit</button>
                    </p>
                </div>
            </li>
        </ul>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="uk-alert uk-alert-warning">
        No task. +add
    </div>
<?php endif; ?>