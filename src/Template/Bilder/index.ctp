<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Bilder[]|\Cake\Collection\CollectionInterface $bilder
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bilder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bilder Zu Information'), ['controller' => 'BilderZuInformation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bilder Zu Information'), ['controller' => 'BilderZuInformation', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bilder index large-9 medium-8 columns content">
    <h3><?= __('Bilder') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pfad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bilder as $bilder): ?>
            <tr>
                <td><?= $this->Number->format($bilder->id) ?></td>
                <td><?= h($bilder->pfad) ?></td>
                <td><?= h($bilder->created) ?></td>
                <td><?= h($bilder->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bilder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bilder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bilder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bilder->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
