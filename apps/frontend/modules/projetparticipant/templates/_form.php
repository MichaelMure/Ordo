<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('projetparticipant/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo link_to('Retour au projet', '@projet?action=show&id='.$form->getDefault('projet_id'), array('class'  => 'actionlist')) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Supprimer', '@projetparticipant?action=delete&id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Êtes vous sûr ?', 'class'  => 'actiondelete')) ?>
          <?php endif; ?>
          <input type="submit" value="Ajouter" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
