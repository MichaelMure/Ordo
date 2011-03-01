<h1><?php switch($filter)
          {
            case 'index': echo 'Liste des contacts'; break;
            case 'email': echo 'Liste des emails'; break;
            case 'appel': echo 'Liste des appels'; break;
          }
?></h1>

<?php echo link_to('Afficher uniquement les mails', '@contact?action=index&filter=email') ?></br>
<?php echo link_to('Afficher uniquement les appels', '@contact?action=index&filter=appel') ?></br>
<?php echo link_to('Ne pas filtrer', '@contact?action=index') ?></br>

<?php switch($filter)
      {
        case 'index': echo link_to('Ajouter un contact', '@contact?action=new'); break;
        case 'email': echo link_to('Ajouter un email', '@contact?action=new&type=email'); break;
        case 'appel': echo link_to('Ajouter un appel', '@contact?action=new&type=appel'); break;
      }
?>

<?php include_partial('contact/list', array('contacts' => $contacts)) ?>

<?php switch($filter)
      {
        case 'index': echo link_to('Ajouter un contact', '@contact?action=new'); break;
        case 'email': echo link_to('Ajouter un email', '@contact?action=new&type=email'); break;
        case 'appel': echo link_to('Ajouter un appel', '@contact?action=new&type=appel'); break;
      }
?>
