<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Information $information
  */
?>

<h3><?= h($information->name) ?></h3>

<a href="/rezept_bearbeiten/<?= $information->id ?>" class="waves-light waves-effect btn">Rezept bearbeiten</a>
<br/>
<br/>
<ul class="tabs">
    <li class="tab col s4"><a class="active" href="#information">Rezeptinformationen</a></li>
    <li class="tab col s4"><a href="#zutaten_zubereitung">Zutaten / Zubereitung</a></li>
    <li class="tab col s4 disabled"><a href="#bilder">Bilder (DEVELOPMENT)</a></li>
</ul>
<div id="information" class="col s12">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($information->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dauer') ?></th>
            <td><?= h($information->dauer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Portionen / Personen') ?></th>
            <td><?= $this->Number->format($information->anzahl) . " " . h($information->portionen_personen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Küche') ?></th>
            <td><?= h($information->kueche) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bemerkungen') ?></th>
            <td><?= strlen($information->sonstiges)>0 ? $this->Text->autoParagraph(h($information->sonstiges)) : ' --- '; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Erstellt') ?></th>
            <td><?= h($information->created->i18nFormat('dd.MM.yyyy HH:mm')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Geändert') ?></th>
            <td><?= h($information->modified->i18nFormat('dd.MM.yyyy HH:mm')) ?></td>
        </tr>
    </table>
</div>
<div id="zutaten_zubereitung" class="col s12">

    <div class="col s12 m6 l4">
        <?php
        if ($information->has('zutaten') &&
            $information->zutaten &&
            sizeof($information->zutaten)>0) {
            $zutaten_counter = 1;
            foreach ($information->zutaten as $zutat) {
                ?>
                <p class="flow-text"><?= $zutat->menge . " " . $zutat->einheit . " " . $zutat->name ?></p>
                <?php
                $zutaten_counter += 1;
            }
        }
        ?>
    </div>
    <div class="col s12 m6 l8">
    <?php
    if ($information->has('zubereitungen') &&
        $information->zubereitungen &&
        sizeof($information->zubereitungen)>0) {
        $zubereitung_counter = 1;
        foreach ($information->zubereitungen as $zubereitung) {
            ?>
            <h4><?= strlen($zubereitung->titel)>0 ? $zubereitung->titel: 'Schritt ' . $zubereitung_counter ?></h4>
            <p class="flow-text"><?= $zubereitung->beschreibung ?></p>
            <?php
            $zubereitung_counter += 1;
        }
    }
    ?>
    </div>
</div>
<div id="bilder" class="col s12">

    <div class="carousel carousel-slider">
        <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/800/400/food/1"></a>
        <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/800/400/food/2"></a>
        <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/3"></a>
        <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('ul.tabs').tabs();
        $('.carousel.carousel-slider').carousel({fullWidth: true});
    });
</script>