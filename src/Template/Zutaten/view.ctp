<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Zutaten $zutaten
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zutaten'), ['action' => 'edit', $zutaten->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zutaten'), ['action' => 'delete', $zutaten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zutaten->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zutaten'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zutaten'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zutaten Zu Information'), ['controller' => 'ZutatenZuInformation', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zutaten Zu Information'), ['controller' => 'ZutatenZuInformation', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zutaten view large-9 medium-8 columns content">
    <h3><?= h($zutaten->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menge') ?></th>
            <td><?= h($zutaten->menge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Einheit') ?></th>
            <td><?= h($zutaten->einheit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($zutaten->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($zutaten->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($zutaten->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($zutaten->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Zutaten Zu Information') ?></h4>
        <?php if (!empty($zutaten->zutaten_zu_information)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Information Id') ?></th>
                <th scope="col"><?= __('Zutaten Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zutaten->zutaten_zu_information as $zutatenZuInformation): ?>
            <tr>
                <td><?= h($zutatenZuInformation->information_id) ?></td>
                <td><?= h($zutatenZuInformation->zutaten_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ZutatenZuInformation', 'action' => 'view', $zutatenZuInformation->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ZutatenZuInformation', 'action' => 'edit', $zutatenZuInformation->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ZutatenZuInformation', 'action' => 'delete', $zutatenZuInformation->], ['confirm' => __('Are you sure you want to delete # {0}?', $zutatenZuInformation->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
