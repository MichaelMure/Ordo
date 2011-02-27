<?php use_helper('Date') ?>
<h1>Liste des prospects a rappeler</h1>

<?php include_partial("list", array("prospects" => $prospects)) ?>

<a href="<?php echo url_for('@prospect?action=new') ?>">Ajouter un prospects</a>
