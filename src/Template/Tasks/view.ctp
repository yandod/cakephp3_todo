<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # %s?', $task->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?> </li>
	</ul>
</div>
<div class="tasks view large-10 medium-9 columns">
	<h2><?= h($task->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($task->name) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($task->id) ?></p>
			<h6 class="subheader"><?= __('List Id') ?></h6>
			<p><?= $this->Number->format($task->list_id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created At') ?></h6>
			<p><?= h($task->created_at) ?></p>
			<h6 class="subheader"><?= __('Updated At') ?></h6>
			<p><?= h($task->updated_at) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Done') ?></h6>
			<p><?= $task->done ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
