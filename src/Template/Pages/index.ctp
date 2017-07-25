<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information[]|\Cake\Collection\CollectionInterface $information
 */
?>
<h4><?= __('Rezepte') ?></h4><a class="waves-effect waves-light btn" href="/neues_rezept">Neues Rezept</a>
<table class="responsive-table bordered highlight" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col">Name des Rezepts</th>
        <th scope="col">Kategorie</th>
        <th scope="col">Dauer</th>
        <th scope="col">Portionen / Personen</th>
        <th scope="col">Küche</th>
        <th scope="col">Erstellt</th>
        <th scope="col">Geändert</th>
        <th scope="col" class="actions">Aktionen</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($informationen as $information): ?>
        <tr>
            <td><a title="Details ansehen" href="/details/<?= $information->id ?>"><?= h($information->name) ?></a></td>
            <td><?= isset($information->information_zu_kategorie[0]) && isset($kategorien[$information->information_zu_kategorie[0]->kategorie_id]) ? $kategorien[$information->information_zu_kategorie[0]->kategorie_id] : '' ?></td>
            <td><?= h($information->dauer) ?></td>
            <td><?= $this->Number->format($information->anzahl) . " " . h($information->portionen_personen) ?></td>
            <td><?= h($information->kueche) ?></td>
            <td><?= h($information->created->i18nFormat('dd.MM.yyyy HH:mm')) ?></td>
            <td><?= h($information->modified->i18nFormat('dd.MM.yyyy HH:mm')) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Bearbeiten'), ['controller' => 'Information', 'action' => 'edit', $information->id], ['class' => 'waves-effect waves-light btn']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
