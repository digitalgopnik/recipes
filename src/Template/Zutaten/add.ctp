<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Zutaten'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Zutaten Zu Information'), ['controller' => 'ZutatenZuInformation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zutaten Zu Information'), ['controller' => 'ZutatenZuInformation', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zutaten form large-9 medium-8 columns content">
    <?= $this->Form->create($zutaten) ?>
    <fieldset>
        <legend><?= __('Add Zutaten') ?></legend>
        <?php
            echo $this->Form->control('menge');
            echo $this->Form->control('einheit');
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
