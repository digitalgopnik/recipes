<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bilder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bilder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bilder'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bilder Zu Information'), ['controller' => 'BilderZuInformation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bilder Zu Information'), ['controller' => 'BilderZuInformation', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bilder form large-9 medium-8 columns content">
    <?= $this->Form->create($bilder) ?>
    <fieldset>
        <legend><?= __('Edit Bilder') ?></legend>
        <?php
            echo $this->Form->control('pfad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
