<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Kategorie[]|\Cake\Collection\CollectionInterface $kategorie
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Aktionen') ?></li>
        <li><?= $this->Html->link(__('Neue Kategorie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Rezepte auflisten'), ['controller' => 'Information', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kategorie index large-9 medium-8 columns content">
    <h3><?= __('Kategorie') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Erstellt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Geändert') ?></th>
                <th scope="col" class="actions"><?= __('Aktionen') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategorie as $kategorie): ?>
            <tr>
                <td><?= $this->Number->format($kategorie->id) ?></td>
                <td><?= h($kategorie->name) ?></td>
                <td><?= h($kategorie->created->i18nFormat('dd.MM.yyyy HH:mm')) ?></td>
                <td><?= h($kategorie->modified->i18nFormat('dd.MM.yyyy HH:mm')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Details'), ['action' => 'view', $kategorie->id]) ?>
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $kategorie->id]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $kategorie->id], ['confirm' => __('Kategorie "{0}" wirklich löschen?', $kategorie->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Erste')) ?>
            <?= $this->Paginator->prev('< ' . __('Vorherige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Nächste') . ' >') ?>
            <?= $this->Paginator->last(__('Letzte') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Seite {{page}} von {{pages}}, zeige {{current}} Einträge von insgesamt {{count}} Einträgen')]) ?></p>
    </div>
</div>
