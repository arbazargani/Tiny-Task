                <?php if(count($tasks) > 1): ?>
                <table class="uk-table uk-table-striped uk-table-responsive uk-table-hover">
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
                            <td><strong><?php echo $task['title']?></strong></td>
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