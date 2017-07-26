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
            echo '<fieldset id="zubereitung_fieldset_' . $zubereitung_counter . '"><legend><h6>Zubereitungsschritt ' . $zubereitung_counter . '</h6></legend>';
            echo $this->Form->control('zubereitung_titel_' . $zubereitung_counter, ['placeholder' => 'Titel des Zubereitungsschritts angeben', 'label' => 'Titel', 'value' => isset($zubereitung->titel) && strlen($zubereitung->titel)>0 ? $zubereitung->titel : '1. Schritt']);
            echo $this->Form->control('zubereitung_beschreibung_' . $zubereitung_counter, ['type' => 'textarea', 'placeholder' => 'Beschreibung des Zubereitungsschritts angeben', 'label' => 'Beschreibung', 'class' => 'materialize-textarea', 'value' => isset($zubereitung->beschreibung) && strlen($zubereitung->beschreibung)>0 ? $zubereitung->beschreibung : '']);
            $zubereitung_counter += 1;
            echo '</fieldset>';
            echo '<br/>';
            echo '<br/>';
        }
        ?>
        <a class="btn waves-effect waves-light" onclick="addZubereitung()">Zubereitungsschritt hinzufügen</a>
        <br/>
        <br/>
        <br/>
        <br/>
        <?php
    } else {
        ?>
        <hr><legend id="zubereitung_legend_0"><h4><?= __('Zubereitung') ?></h4></legend>
        <a class="btn waves-effect waves-light" onclick="addZubereitung()">Zubereitungsschritt hinzufügen</a>
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
            echo '<fieldset id="zutaten_fieldset_' . $zutaten_counter . '"><legend><h6>Zutat ' .  $zutaten_counter . '</h6></legend>';
            echo $this->Form->control('zutaten_menge_' . $zutaten_counter, ['placeholder' => 'Menge der Zutat angeben', 'label' => 'Menge', 'value' => isset($zutat->menge) && strlen($zutat->menge)>0 ? $zutat->menge : '']);
            echo $this->Form->control('zutaten_einheit_' . $zutaten_counter, ['placeholder' => 'Einheit der Zutat angeben', 'label' => 'Einheit', 'class' => 'materialize-textarea', 'value' => isset($zutat->einheit) && strlen($zutat->einheit)>0 ? $zutat->einheit : '']);
            echo $this->Form->control('zutaten_name_' . $zutaten_counter, ['placeholder' => 'Name der Zutat angeben', 'label' => 'Name', 'class' => 'materialize-textarea', 'value' => isset($zutat->name) && strlen($zutat->name)>0 ? $zutat->name : '']);
            $zutaten_counter += 1;
            echo '</fieldset>';
            echo '<br/>';
            echo '<br/>';
        }
        ?>
        <a class="btn waves-effect waves-light" onclick="addZutat()">Zutat hinzufügen</a>
        <br/>
        <br/>
        <br/>
        <br/>
        <?php
    } else {
        ?>
        <hr><legend id="zutaten_legend_0"><h4><?= __('Zutaten') ?></h4></legend>
        <a class="btn waves-effect waves-light" onclick="addZutat()">Zutat hinzufügen</a>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });

    function getZubereitungHtml(number) {
        var str = '<fieldset id="zubereitung_fieldset_' + number + '"><legend><h6>Zubereitungsschritt ' + number + '</h6></legend>' +
            '<label>Titel</label><input  type="text" name="zubereitung_titel_' + number + '" placeholder="Titel des Zubereitungsschritts" />' +
            '<label>Beschreibung</label><textarea name="zubereitung_beschreibung_' + number + '" placeholder="Beschreibung des Zubereitungsschritts angeben" class="materialize-textarea"></textarea>' +
            '</fieldset>' +
            '<br/>' +
            '<br/>' +
            '<br/>';
        return str;
    }

    function addZubereitung(number) {
        if ($('fieldset#zubereitung_fieldset_1').length>0) {
            addZubereitungExists(number);
        } else {
            addZubereitungNone();
        }
    }

    function addZubereitungExists(number) {
        var html = getZubereitungHtml(number);
        var number_before = number-1;
        $('fieldset#zubereitung_fieldset_' + number_before).after(html);
    }

    function addZubereitungNone() {
        var number = 1;
        var html = getZubereitungHtml(number);
        $('legend#zubereitung_legend_0').after(html);
    }

    function getZutatenHtml(number) {
        var str = '<fieldset id="zutaten_fieldset_' + number + '"><legend><h6>Zutat ' + number + '</h6></legend>' +
            '<label>Menge</label><input type="text" name="zutaten_menge_' + number + '" placeholder="Menge der Zutat angeben" />' +
            '<label>Einheit</label><input type="text" name="zutaten_einheit_' + number + '" placeholder="Einheit der Zutat angeben" />' +
            '<label>Name</label><input type="text" name="zutaten_name_' + number + '" placeholder="Name der Zutat angeben" />' +
            '</fieldset>' +
            '<br/>' +
            '<br/>' +
            '<br/>';
        return str;
    }

    function addZutat(number) {
        if ($('fieldset#zutaten_fieldset_1').length>0) {
            addZutatExists(number);
        } else {
            addZutatNone();
        }
    }

    function addZutatExists(number) {
        var html = getZutatenHtml(number);
        var number_before = number-1;
        $('fieldset#zutaten_fieldset_' + number_before).after(html);
    }

    function addZutatNone() {
        var number = 1;
        var html = getZutatenHtml(number);
        $('legend#zutaten_legend_0').after(html);
    }
</script>
