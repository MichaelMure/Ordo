<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@prospect?action='.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '&id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php echo link_to('Retour à la liste', '@prospect.index', array('class'  => 'actionlist')) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Supprimer', '@prospect?action=delete&id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Êtes vous sûr ?')) ?>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
          <input type="submit" name="andAdd" value="Sauvegarder et ajouter un contact" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nom']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom']->renderError() ?>
          <?php echo $form['nom'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact']->renderError() ?>
          <?php echo $form['contact'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fonction']->renderLabel() ?></th>
        <td>
          <?php echo $form['fonction']->renderError() ?>
          <?php echo $form['fonction'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['a_rappeler']->renderLabel() ?></th>
        <td>
          <?php echo $form['a_rappeler']->renderError() ?>
          <?php echo $form['a_rappeler'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['adresse']->renderLabel() ?></th>
        <td>
          <?php echo $form['adresse']->renderError() ?>
          <?php echo $form['adresse'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville']->renderError() ?>
          <?php echo $form['ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp']->renderError() ?>
          <?php echo $form['cp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tel_fixe']->renderLabel() ?></th>
        <td>
          <?php echo $form['tel_fixe']->renderError() ?>
          <?php echo $form['tel_fixe'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tel_portable']->renderLabel() ?></th>
        <td>
          <?php echo $form['tel_portable']->renderError() ?>
          <?php echo $form['tel_portable'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['site_web']->renderLabel() ?></th>
        <td>
          <?php echo $form['site_web']->renderError() ?>
          <?php echo $form['site_web'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['origine']->renderLabel() ?></th>
        <td>
          <?php echo $form['origine']->renderError() ?>
          <?php echo $form['origine'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['activite']->renderLabel() ?></th>
        <td>
          <?php echo $form['activite']->renderError() ?>
          <?php echo $form['activite'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['commentaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['commentaire']->renderError() ?>
          <?php echo $form['commentaire'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
