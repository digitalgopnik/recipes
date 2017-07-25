<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Form->create($kategorie) ?>
<fieldset>
    <legend><?= __('Kategorie anlegen') ?></legend>
    <?php
    echo $this->Form->control('name', ['placeholder' => 'Name der Kategorie']);
    ?>
    <button class="btn waves-effect waves-light" type="submit" name="action">Anlegen</button>
</fieldset>
<?= $this->Form->end() ?>
