<?= $this->Form->create('Lists', ['controller' => 'lists', 'action' => 'add']); ?>
  <div class="split-fields">
      <div class="field">
          <?= $this->Form->input('list.name', ['placeholder' => "Name", 'label' => false]); ?>
      </div>
      <div class="button">
          <?= $this->Form->submit('Add List'); ?>
      </div>
  </div>
<?= $this->Form->end(); ?>