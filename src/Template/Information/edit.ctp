<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Form->create($information) ?>
<fieldset>
    <legend><h4><?= __('Rezeptinformationen') ?></h4></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('dauer');
    echo $this->Form->control('anzahl');
    echo $this->Form->control('portionen_personen', ['label' => 'Portionen / Personen']);
    echo $this->Form->control('kueche', ['label' => 'Küche']);
    echo $this->Form->control('sonstiges', ['label' => 'Bemerkungen', 'type' => 'textarea', 'class' => 'materialize-textarea']);
    ?>
    <?php
    if ($information->has('zubereitungen') &&
        $information->zubereitungen &&
        sizeof($information->zubereitungen)>0) {
        ?>
        <hr>
        <legend><h4><?= __('Zubereitung') ?></h4></legend>
        <?php
        $zubereitung_counter = 1;
        foreach ($information->zubereitungen as $zubereitung) {
            echo '<fieldset><legend><h6>Zubereitungsschritt ' . $zubereitung_counter . '</h6></legend>';
            echo $this->Form->control('zubereitung_titel_' . $zubereitung_counter, ['placeholder' => 'Titel des Zubereitungsschritts angeben', 'label' => 'Titel', 'value' => isset($zubereitung->titel) && strlen($zubereitung->titel)>0 ? $zubereitung->titel : '1. Schritt']);
            echo $this->Form->control('zubereitung_beschreibung_' . $zubereitung_counter, ['type' => 'textarea', 'placeholder' => 'Beschreibung des Zubereitungsschritts angeben', 'label' => 'Beschreibung', 'class' => 'materialize-textarea', 'value' => isset($zubereitung->beschreibung) && strlen($zubereitung->beschreibung)>0 ? $zubereitung->beschreibung : '']);
            $zubereitung_counter += 1;
            echo '</fieldset>';
            echo '<br/>';
            echo '<br/>';
        }
        ?>
        <a class="btn waves-effect waves-light" onclick="">Zubereitungsschritt hinzufügen</a>
        <br/>
        <br/>
        <br/>
        <br/>
    <?php
    } else {
        ?>
        <hr><legend><h4><?= __('Zubereitung') ?></h4></legend>
        <a class="btn waves-effect waves-light" onclick="">Zubereitungsschritt hinzufügen</a>
        <br/>
        <br/>
        <br/>
        <br/>
    <?php
    }
    ?>
    <?php
    if ($information->has('zutaten') &&
        $information->zutaten &&
        sizeof($information->zutaten)>0) {
        ?>
        <hr>
        <legend><h4><?= __('Zutaten') ?></h4></legend>
        <?php
        $zutaten_counter = 1;
        foreach ($information->zutaten as $zutat) {
            echo '<fieldset><legend><h6>Zutat ' .  $zutaten_counter . '</h6></legend>';
            echo $this->Form->control('zutaten_menge_' . $zutaten_counter, ['placeholder' => 'Menge der Zutat angeben', 'label' => 'Menge', 'value' => isset($zutat->menge) && strlen($zutat->menge)>0 ? $zutat->menge : '']);
            echo $this->Form->control('zutaten_einheit_' . $zutaten_counter, ['placeholder' => 'Einheit der Zutat angeben', 'label' => 'Einheit', 'class' => 'materialize-textarea', 'value' => isset($zutat->einheit) && strlen($zutat->einheit)>0 ? $zutat->einheit : '']);
            echo $this->Form->control('zutaten_name_' . $zutaten_counter, ['placeholder' => 'Name der Zutat angeben', 'label' => 'Name', 'class' => 'materialize-textarea', 'value' => isset($zutat->name) && strlen($zutat->name)>0 ? $zutat->name : '']);
            $zutaten_counter += 1;
            echo '</fieldset>';
            echo '<br/>';
            echo '<br/>';
        }
        ?>
        <a class="btn waves-effect waves-light" onclick="">Zutat hinzufügen</a>
        <br/>
        <br/>
        <br/>
        <br/>
    <?php
    } else {
        ?>
        <hr><legend><h4><?= __('Zutaten') ?></h4></legend>
        <a class="btn waves-effect waves-light" onclick="">Zutat hinzufügen</a>
        <br/>
        <br/>
        <br/>
        <br/>
    <?php
    }
    ?>
    <button class="btn waves-effect waves-light" type="submit" name="action">Speichern</button>
</fieldset>
<?= $this->Form->end() ?>
