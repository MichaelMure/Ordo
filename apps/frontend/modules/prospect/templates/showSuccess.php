<?php use_helper('Date') ?>


<a style="float:right; font-size:150%; color:red; " href="<?php echo url_for('@contact?action=new&type_contact_id=1&prospect_id=''.$prospect->getId()) ?>">Ajouter un appel</a>
<br style="clear:both"/><a style="float:right; font-size:150%; color:red; " href="<?php echo url_for('@contact?action=new&type_contact_id=4&prospect_id=".$prospect->getId()) ?>">Ajouter un email</a>
<h1><?php echo $prospect->getNom() ?></h1>

<?php if($prospect->getAppels()->count()): ?>
  <?php include_partial('contact/list', array('appels' => $prospect->getAppels())) ?>
<?php else: ?>
  <div class="liste-appel"><b>Pas d'appels</b></div>
<?php endif ?>

<?php if($prospect->getEmails()->count()): ?>
  <?php include_partial('contact/list', array("emails" => $prospect->getEmails())) ?>
<?php else: ?>
  <div class="liste-email"><b>Pas d'emails</b></div>
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
