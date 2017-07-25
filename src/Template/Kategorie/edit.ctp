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
                ['action' => 'delete', $kategorie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kategorie->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kategorie'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Information Zu Kategorie'), ['controller' => 'InformationZuKategorie', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Information Zu Kategorie'), ['controller' => 'InformationZuKategorie', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kategorie form large-9 medium-8 columns content">
    <?= $this->Form->create($kategorie) ?>
    <fieldset>
        <legend><?= __('Edit Kategorie') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
