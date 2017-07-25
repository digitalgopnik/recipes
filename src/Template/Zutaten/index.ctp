<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Zutaten[]|\Cake\Collection\CollectionInterface $zutaten
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Zutaten'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zutaten Zu Information'), ['controller' => 'ZutatenZuInformation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zutaten Zu Information'), ['controller' => 'ZutatenZuInformation', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zutaten index large-9 medium-8 columns content">
    <h3><?= __('Zutaten') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('einheit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zutaten as $zutaten): ?>
            <tr>
                <td><?= $this->Number->format($zutaten->id) ?></td>
                <td><?= h($zutaten->menge) ?></td>
                <td><?= h($zutaten->einheit) ?></td>
                <td><?= h($zutaten->name) ?></td>
                <td><?= h($zutaten->created) ?></td>
                <td><?= h($zutaten->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $zutaten->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zutaten->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zutaten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zutaten->id)]) ?>
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
