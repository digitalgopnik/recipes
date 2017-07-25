<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Bilder $bilder
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bilder'), ['action' => 'edit', $bilder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bilder'), ['action' => 'delete', $bilder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bilder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bilder'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bilder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bilder Zu Information'), ['controller' => 'BilderZuInformation', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bilder Zu Information'), ['controller' => 'BilderZuInformation', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bilder view large-9 medium-8 columns content">
    <h3><?= h($bilder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pfad') ?></th>
            <td><?= h($bilder->pfad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bilder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bilder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bilder->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bilder Zu Information') ?></h4>
        <?php if (!empty($bilder->bilder_zu_information)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Bilder Id') ?></th>
                <th scope="col"><?= __('Information Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bilder->bilder_zu_information as $bilderZuInformation): ?>
            <tr>
                <td><?= h($bilderZuInformation->bilder_id) ?></td>
                <td><?= h($bilderZuInformation->information_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BilderZuInformation', 'action' => 'view', $bilderZuInformation->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BilderZuInformation', 'action' => 'edit', $bilderZuInformation->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BilderZuInformation', 'action' => 'delete', $bilderZuInformation->], ['confirm' => __('Are you sure you want to delete # {0}?', $bilderZuInformation->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
