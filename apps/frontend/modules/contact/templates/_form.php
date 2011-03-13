<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@contact?action='.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '&id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php echo link_to('Retour à la liste des contact', '@contact', array('class'  => 'actionlist')) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', '@contact?action=delete&id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['prospect_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['prospect_id']->renderError() ?>
          <?php echo $form['prospect_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date']->renderLabel() ?></th>
        <td>
          <?php echo $form['date']->renderError() ?>
          <?php echo $form['date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['type_contact_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['type_contact_id']->renderError() ?>
          <?php echo $form['type_contact_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['commentaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['commentaire']->renderError() ?>
          <?php echo $form['commentaire'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['membre_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['membre_id']->renderError() ?>
          <?php echo $form['membre_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['a_recontacter']->renderLabel() ?></th>
        <td>
          <?php echo $form['a_recontacter']->renderError() ?>
          <?php echo $form['a_recontacter'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_recontact']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_recontact']->renderError() ?>
          <?php echo $form['date_recontact'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
