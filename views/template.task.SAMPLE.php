                    <?php if(count($tasks) > 0): ?>
                    <?php foreach ($tasks as $task): ?>

                        <!-- task title -->
                        <?php echo $task['title']?>

                        <!-- task meta -->
                        State: <?php echo $task['state']?> | 
                        Creat: <?php echo $task['created_at']?> | 
                        Expire: <?php echo $task['expired_at']?> | 

                        <!-- task description -->
                        <?php echo $task['description']?>

                    <?php endforeach; ?>
                <?php else: ?>

                    <!-- no task alert -->
                    No task. +add
                    
                <?php endif; ?> 