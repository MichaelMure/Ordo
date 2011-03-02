<?php use_helper('Date') ?>
<table>
  <tbody>
    <tr>
      <th>Prospect</th>
      <td><?php echo link_to($contact->getProspect(), '@prospect?action=show&id='.$contact->getProspectId()) ?></td>
    </tr>
    <tr>
      <th>Date</th>
      <td><?php echo format_date($contact->getDate()) ?></td>
    </tr>
    <tr>
      <th>Commentaire</th>
      <td><?php echo nl2br(trim($contact->getCommentaire())) ?></td>
    </tr>
    <tr>
      <th>Membre</th>
      <td><?php echo $contact->getMembre() ?></td>
    </tr>
    <tr>
      <th>Type de contact</th>
      <td>
        <img src="/images/<?php echo $contact->getTypeContact()->getLogo() ?>.png" />
        <?php echo $contact->getTypeContact() ?>
      </td>
    </tr>
    <tr>
      <th>Ajouté le</th>
      <td><?php echo format_date($contact->getCreatedAt()) ?></td>
    </tr>
    <tr>
      <th>Maj le</th>
      <td><?php echo format_date($contact->getUpdatedAt()) ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('@contact?action=edit&id='.$contact->getId()) ?>">Modifier</a>
&nbsp;
<a href="<?php echo url_for('@prospect?action=show&id='.$contact->getProspectId()) ?>">Revenir au prospect</a>
&nbsp;
