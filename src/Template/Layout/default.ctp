<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = "Ratzinger's Rezeptverwaltung";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.min.css" />

</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.min.js"></script>
<?= $this->Flash->render() ?>
<div class="row">
    <nav>
        <div class="col s12">
            <div class="nav-wrapper">
                <a href="#" data-activates="slide-out" class="button-collapse" style="display:block;">Menü</a>
                <a href="/" class="brand-logo">Ratzinger's Rezeptverwaltung</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/login">Einloggen</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="row">
    <?= $this->element('navigation') ?>
    <div class="col s12">
        <?= $this->fetch('content') ?>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(".button-collapse").sideNav();
</script>
