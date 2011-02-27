<h1>Liste des emails</h1>
<a href="<?php echo url_for('@contact?action=new&type_appel_id=4') ?>">Ajouter un contact</a>

<?php include_partial('contact/list', array('contacts' => $contacts)) ?>

<a href="<?php echo url_for('@contact?action=new&type_appel_id=4') ?>">Ajouter un contact</a>
