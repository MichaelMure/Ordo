<?php use_helper('Date') ?>
<h1>Liste des prospects</h1>

<?php include_partial('commun/pager', array('pager' => $pager, 'route' => '@prospect?action=index')) ?>
<?php include_partial('list', array('prospects' => $pager->getResults())) ?>
<?php include_partial('commun/pager', array('pager' => $pager, 'route' => '@prospect?action=index')) ?>

<a href="<?php echo url_for('@prospect?action=new') ?>">Ajouter un prospects</a>
