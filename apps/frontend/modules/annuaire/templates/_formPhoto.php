<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@annuaire?action=updatePhoto&id=' . ($form->getObject()->getId()) ); ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table id="form">
    <tbody>
      <?php echo $form ?>
      <tr>
    <th>Aperçu :</th>
    <td>
     <?php echo $form->getObject()->getPhoto() ? image_tag('/uploads/annuaire/' . $form->getObject()->getPhoto(), array('style' => 'border: 2px solid black;')) : image_tag('avatar-empty', array('class' => 'empty')); ?></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Valider" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
