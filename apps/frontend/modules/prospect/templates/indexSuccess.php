<?php use_helper('Date') ?>
<h1>Liste des prospects</h1>

<ul>
  <li><?php echo link_to('Afficher mes propects', '@prospect?action=index&filter=my') ?></li>
  <li><?php echo link_to('Afficher les propects à recontacter', '@prospect?action=index&filter=recontact') ?></li>
  <li><?php echo link_to('Ne pas filtrer', '@prospect?action=index') ?></li>
</ul>

<?php include_partial('commun/pager', array('pager' => $pager, 'route' => '@prospect?action=index&filter='.$filter)) ?>
<?php include_partial('list', array('prospects' => $pager->getResults())) ?>
<?php include_partial('commun/pager', array('pager' => $pager, 'route' => '@prospect?action=index&filter='.$filter)) ?>

<a href="<?php echo url_for('@prospect?action=new') ?>">Ajouter un prospects</a>
