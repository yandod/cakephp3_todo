<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="tasks form large-10 medium-9 columns">
<?= $this->Form->create($task) ?>
	<fieldset>
		<legend><?= __('Add Task'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('done');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
		echo $this->Form->input('list_id');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
