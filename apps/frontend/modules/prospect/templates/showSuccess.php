<?php use_helper('Date') ?>

<ul>
  <li><?php echo link_to('Ajouter un appel','@contact?action=new&type=appel&prospect_id='.$prospect->getId()) ?></li>
  <li><?php echo link_to('Ajouter un email','@contact?action=new&type=email&prospect_id='.$prospect->getId()) ?></li>
</ul>

<h1><?php echo $prospect->getNom() ?></h1>

<?php if($contacts->count()): ?>
  <?php include_partial('contact/list', array('contacts' => $contacts)) ?>
<?php else: ?>
  <div class="liste-contact"><b>Pas de contacts</b></div>
<?php endif ?>


<table>
  <tbody>
    <tr>
      <th>Contact</th>
      <td><?php echo $prospect->getContact() ?></td>
    </tr>
    <tr>
      <th>Fonction</th>
      <td><?php echo $prospect->getFonction() ?></td>
    </tr>
    <tr>
      <th>Adresse</th>
      <td><?php echo $prospect->getAdresse() ?></td>
    </tr>
    <tr>
      <th>Ville</th>
      <td><?php echo $prospect->getVille() ?></td>
    </tr>
    <tr>
      <th>Code postal</th>
      <td><?php echo $prospect->getCp() ?></td>
    </tr>
    <tr>
      <th>Tel fixe</th>
      <td><?php echo $prospect->getTelFixe() ?></td>
    </tr>
    <tr>
      <th>Tel portable</th>
      <td><?php echo $prospect->getTelPortable() ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $prospect->getEmail() ?></td>
    </tr>
    <tr>
      <th>Site web</th>
      <td><?php echo $prospect->getSiteWeb() ?></td>
    </tr>
    <tr>
      <th>Origine</th>
      <td><?php echo $prospect->getOrigine() ?></td>
    </tr>
    <tr>
      <th>Activité</th>
      <td><?php echo $prospect->getActivite() ?></td>
    </tr>
    <tr>
      <th>À rappeler</th>
      <td class=<?php if($prospect->getARappeler()) echo "oui>oui"; else echo "non>non"; ?></td>
    </tr>
    <tr>
      <th>Date de recontact</th>
      <td><?php echo format_date($prospect->getDateRecontact()) ?></td>
    </tr>
    <tr>
      <th>Commentaire</th>
      <td><?php echo nl2br(trim($prospect->getCommentaire())) ?></td>
    </tr>
    <tr>
      <th>Ajouté le</th>
      <td><?php echo format_date($prospect->getCreatedAt()) ?></td>
    </tr>
    <tr>
      <th>Maj le</th>
      <td><?php echo format_date($prospect->getUpdatedAt()) ?></td>
    </tr>
  </tbody>
</table>

<a href="<?php echo url_for('@prospect?action=edit&id='.$prospect->getId()) ?>">Modifier</a>
&nbsp;
<a href="<?php echo url_for('@prospect.index') ?>">Retour à la liste</a>

<hr/>
