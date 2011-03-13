<h1><?php switch($filter)
          {
            case 'index': echo 'Liste des contacts'; break;
            case 'email': echo 'Liste des emails'; break;
            case 'appel': echo 'Liste des appels'; break;
          }
?></h1>

<ul>
  <li><?php echo link_to('Afficher les mails', '@contact?action=index&filter=email') ?></li>
  <li><?php echo link_to('Afficher les appels', '@contact?action=index&filter=appel') ?></li>
  <li><?php echo link_to('Ne pas filtrer', '@contact?action=index') ?></li>
</ul>


<?php include_partial('commun/pager', array('pager' => $pager, 'route' => '@contact?action=index&filter='.$filter)) ?>
<?php include_partial('contact/list', array('contacts' => $pager->getResults())) ?>
<?php include_partial('commun/pager', array('pager' => $pager, 'route' => '@contact?action=index&filter='.$filter)) ?>
<?php echoAddLinks($filter) ?>

<?php
function echoAddLinks($filter)
{
  switch($filter)
  {
    case 'index': echo link_to('Ajouter un contact', '@contact?action=new', array('class'=>'actionnew')); break;
    case 'email': echo link_to('Ajouter un email', '@contact?action=new&type=email', array('class'=>'actionnew')); break;
    case 'appel': echo link_to('Ajouter un appel', '@contact?action=new&type=appel', array('class'=>'actionnew')); break;
  }
}

?>
