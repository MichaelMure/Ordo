<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('membre/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('membre/index') ?>">Retour à la liste des membres</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Supprimer le membre', 'membre/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Êtes vous sûr ?')) ?>
          <?php endif; ?>
          <input type="submit" value="Enregistrer" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['username']->renderLabel() ?></th>
        <td>
          <?php echo $form['username']->renderError() ?>
          <?php echo $form['username'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['passwd']->renderLabel() ?></th>
        <td>
          <?php echo $form['passwd']->renderError() ?>
          <?php echo $form['passwd'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero_etudiant']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_etudiant']->renderError() ?>
          <?php echo $form['numero_etudiant'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['prenom']->renderLabel() ?></th>
        <td>
          <?php echo $form['prenom']->renderError() ?>
          <?php echo $form['prenom'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nom']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom']->renderError() ?>
          <?php echo $form['nom'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sexe']->renderLabel() ?></th>
        <td>
          <?php echo $form['sexe']->renderError() ?>
          <?php echo $form['sexe'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_naissance']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_naissance']->renderError() ?>
          <?php echo $form['date_naissance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville_naissance']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville_naissance']->renderError() ?>
          <?php echo $form['ville_naissance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero_secu']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_secu']->renderError() ?>
          <?php echo $form['numero_secu'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['promo']->renderLabel() ?></th>
        <td>
          <?php echo $form['promo']->renderError() ?>
          <?php echo $form['promo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['filiere']->renderLabel() ?></th>
        <td>
          <?php echo $form['filiere']->renderError() ?>
          <?php echo $form['filiere'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['poste']->renderLabel() ?></th>
        <td>
          <?php echo $form['poste']->renderError() ?>
          <?php echo $form['poste'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['adresse_mulhouse']->renderLabel() ?></th>
        <td>
          <?php echo $form['adresse_mulhouse']->renderError() ?>
          <?php echo $form['adresse_mulhouse'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_mulhouse']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_mulhouse']->renderError() ?>
          <?php echo $form['cp_mulhouse'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville_mulhouse']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville_mulhouse']->renderError() ?>
          <?php echo $form['ville_mulhouse'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['adresse_parents']->renderLabel() ?></th>
        <td>
          <?php echo $form['adresse_parents']->renderError() ?>
          <?php echo $form['adresse_parents'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_parents']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_parents']->renderError() ?>
          <?php echo $form['cp_parents'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville_parents']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville_parents']->renderError() ?>
          <?php echo $form['ville_parents'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tel_mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['tel_mobile']->renderError() ?>
          <?php echo $form['tel_mobile'] ?>
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
        <th><?php echo $form['email_interne']->renderLabel() ?></th>
        <td>
          <?php echo $form['email_interne']->renderError() ?>
          <?php echo $form['email_interne'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email_externe']->renderLabel() ?></th>
        <td>
          <?php echo $form['email_externe']->renderError() ?>
          <?php echo $form['email_externe'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['carte_ID']->renderLabel() ?></th>
        <td>
          <?php echo $form['carte_ID']->renderError() ?>
          <?php echo $form['carte_ID'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['just_domicile']->renderLabel() ?></th>
        <td>
          <?php echo $form['just_domicile']->renderError() ?>
          <?php echo $form['just_domicile'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['quittance']->renderLabel() ?></th>
        <td>
          <?php echo $form['quittance']->renderError() ?>
          <?php echo $form['quittance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cotisation']->renderLabel() ?></th>
        <td>
          <?php echo $form['cotisation']->renderError() ?>
          <?php echo $form['cotisation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['status']->renderLabel() ?></th>
        <td>
          <?php echo $form['status']->renderError() ?>
          <?php echo $form['status'] ?>
        </td>
      </tr>
      
      <?php echo $form ?>
    </tbody>
  </table>
</form>
