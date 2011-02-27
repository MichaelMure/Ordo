<?php use_helper('Date') ?>

<table class="liste-contact">
  <thead>
    <tr>
      <th></th>
      <th>Date</th>
      <th>Membre</th>
      <th>Commentaire</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $contact): ?>
    <tr>
      <td><img src="/images/<?php echo $contact->getTypeAppel()->getLogo() ?>-mini.png" width="16" height="16"/></td>
      <td><a href="<?php echo url_for('@contact?action=show&id='.$contact->getId()) ?>"><?php echo format_date($contact->getDate()) ?></a></td>
      <td><?php echo ($contact->getMembreId()) ? $contact->getMembre() : "" ?></td>
      <td><?php echo $contact->getCommentaire() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
