<div id='tabs'>
    <ul>
        <?php $count = 1 ?>
        <?php foreach ($lists as $list): ?>
        <li>
            <a href="<?= '#' . 'tabs-' . $count ?>"><?= $list->name ?></a>
        </li>
        <?php $count++; ?>
		<?php endforeach; ?>
        <li>
            <a href="#tabs-new-list">Add List +</a>
        </li>
    </ul>


    <?php $count = 1 ?>
    <?php foreach ($lists as $list): ?>

    <div id='tabs-<?= $count ?>' class="tab">

        <div class="new-task">
            <?= $this->Form->create($task, ['action' => 'add']) ?>
            <?= $this->Form->hidden('done', ['value'=>false])?>
            <?= $this->Form->hidden('list_id', ['value'=>$list->id])?>

            <div class="split-fields">
                <div class="field">
                    <?=  $this->Form->input('name', ['label' => false, 'placeholder'=>'Input New Task']); ?>
                </div>
                <div class="button">
                    <?= $this->Form->button(__('Add Task'), ['class' => 'button']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>

        <?php if (!empty($list->tasks)): ?>
        <ul  class="tasks pending-tasks">
            <?php foreach ($list->tasks as $task): ?>

                <?php if (!$task->done): ?>
                    <?= $this->Form->create($task, ['action' => 'edit']) ?>

            <li>
                        <?= $this->Form->checkbox('done', ['class' => 'box', 'label' => false]); ?>
                        <?= $this->Form->button(__('Submit'), ['class'=>'hidden']) ?>
                        <?= $task->name; ?>
                <p class="delete-task">
                    <?= $this->Html->link('X', ['action' => 'delete', $task->id], ['confirm' => 'Are you sure?', 'method' => 'delete']); ?>
                </p>
            </li>

                    <?= $this->Form->end() ?>
				<?php endif; ?>
			<?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if (count($list->DoneTasks)): ?>
        <ul class="tasks finished-tasks">
            <?php foreach ($list->DoneTasks as $task): ?>
            <li class="finished">
                <?= h($task->name) ?>
                <p class="delete-task">
                    <?= $this->Html->link('X', ['action' => 'delete', $task->id], ['confirm' => 'Are you sure?', 'method' => 'delete']); ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <p class="delete-list">
            <?= $this->Html->link('Delete this list', ['confirm' => 'Are you sure?', 'method' => 'delete']); ?>
        </p>
    </div>
    <?php $count++ ?>
    <?php endforeach; ?>


    <div id="tabs-new-list">
        <h2>Add a New Task List</h2>
        <%= render :partial => '/lists/form' %>
    </div>


</div>

<?php if (false): ?>
<% if listid = params[:list_id] %>
    <% prevlist = List.find listid %>
    <% tabindex = @lists.index(prevlist) %>
<% end %>
<?php endif; ?>

<script>
    $('.box').click(function(event) {
        $(this).next().click();
    });

    $(function() {
        var opts = {};
        <?php if (false && $params['list_id']): ?>
        <% if params[:list_id] %>
        opts.selected = <%= tabindex %>
         <?php endif; ?>
            $( "#tabs" ).tabs(opts);
    });

</script>
