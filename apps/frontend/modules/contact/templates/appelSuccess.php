<h1>Liste des appels</h1>
<a href="<?php echo url_for('@contact?action=new') ?>">Ajouter un contact</a>

<?php include_partial('contact/list', array('contacts' => $contacts)) ?>

<a href="<?php echo url_for('@contact?action=new') ?>">Ajouter un contact</a>
