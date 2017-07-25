<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Kategorie $kategorie
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kategorie'), ['action' => 'edit', $kategorie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kategorie'), ['action' => 'delete', $kategorie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kategorie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Kategorie'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kategorie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Information Zu Kategorie'), ['controller' => 'InformationZuKategorie', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information Zu Kategorie'), ['controller' => 'InformationZuKategorie', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kategorie view large-9 medium-8 columns content">
    <h3><?= h($kategorie->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($kategorie->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($kategorie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($kategorie->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($kategorie->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Information Zu Kategorie') ?></h4>
        <?php if (!empty($kategorie->information_zu_kategorie)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Information Id') ?></th>
                <th scope="col"><?= __('Kategorie Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($kategorie->information_zu_kategorie as $informationZuKategorie): ?>
            <tr>
                <td><?= h($informationZuKategorie->information_id) ?></td>
                <td><?= h($informationZuKategorie->kategorie_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InformationZuKategorie', 'action' => 'view', $informationZuKategorie->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InformationZuKategorie', 'action' => 'edit', $informationZuKategorie->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InformationZuKategorie', 'action' => 'delete', $informationZuKategorie->], ['confirm' => __('Are you sure you want to delete # {0}?', $informationZuKategorie->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
