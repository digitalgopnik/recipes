<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Zubereitung $zubereitung
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zubereitung'), ['action' => 'edit', $zubereitung->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zubereitung'), ['action' => 'delete', $zubereitung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zubereitung->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zubereitung'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zubereitung'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zubereitung Zu Information'), ['controller' => 'ZubereitungZuInformation', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zubereitung Zu Information'), ['controller' => 'ZubereitungZuInformation', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zubereitung view large-9 medium-8 columns content">
    <h3><?= h($zubereitung->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($zubereitung->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Beschreibung') ?></h4>
        <?= $this->Text->autoParagraph(h($zubereitung->beschreibung)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Zubereitung Zu Information') ?></h4>
        <?php if (!empty($zubereitung->zubereitung_zu_information)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Zubereitung Id') ?></th>
                <th scope="col"><?= __('Information Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zubereitung->zubereitung_zu_information as $zubereitungZuInformation): ?>
            <tr>
                <td><?= h($zubereitungZuInformation->zubereitung_id) ?></td>
                <td><?= h($zubereitungZuInformation->information_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ZubereitungZuInformation', 'action' => 'view', $zubereitungZuInformation->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ZubereitungZuInformation', 'action' => 'edit', $zubereitungZuInformation->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ZubereitungZuInformation', 'action' => 'delete', $zubereitungZuInformation->], ['confirm' => __('Are you sure you want to delete # {0}?', $zubereitungZuInformation->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
