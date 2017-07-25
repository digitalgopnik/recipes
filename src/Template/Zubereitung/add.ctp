<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Zubereitung'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Zubereitung Zu Information'), ['controller' => 'ZubereitungZuInformation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zubereitung Zu Information'), ['controller' => 'ZubereitungZuInformation', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zubereitung form large-9 medium-8 columns content">
    <?= $this->Form->create($zubereitung) ?>
    <fieldset>
        <legend><?= __('Add Zubereitung') ?></legend>
        <?php
            echo $this->Form->control('beschreibung');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
