<?php use_helper('Date', 'Number') ?>

<h1>Projet <?php echo $projet ?></h1>
<table>
  <thead>
    <tr>
      <th>État</th>
      <th>Qualité</th>
      <th>Prospect</th>
      <th>Chef de projet</th>
      <th>Budget</th>
      <th>Date debut</th>
      <th>Date cloture</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $projet->getEtat() ?></td>
      <td><?php echo $projet->getQualite() ?></td>
      <td><a href="<?php echo url_for('@prospect?action=show&id='.$projet->getProspectId()) ?>"><?php echo $projet->getProspect() ?></td>
      <td><a href="<?php echo url_for('@annuaire?action=show&id='.$projet->getRespoId()) ?>"><?php echo $projet->getRespo() ?></td>
      <td><?php echo $projet->getBudget() ? format_number($projet->getBudget()).' €' : '' ?></td>
      <td><?php echo format_date($projet->getDateDebut()) ?></td>
      <td><?php echo $projet->getDateCloture() ? format_date($projet->getDateCloture()) : 'non cloturé' ?></td>
    </tr>
  </tbody>
</table>

<h2>Commentaire</h2>
<?php echo $projet->getRawValue()->getCommentaire() ?>

<h2>Participants</h2>
<table>
  <thead>
    <tr>
      <th>Membre</th>
      <th>Rôle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $projet->getRespo() ?></td>
      <td>Chef de projet</td>
    </tr>
    <?php foreach ($participants as $participant): ?>
    <tr>
      <td><?php echo $participant->getMembre() ?></td>
      <td><?php echo $participant->getRole() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<h2>Évenements</h2>
<div id='projetEvent'>
  <?php foreach ($events as $event): ?>
  <div class='<?php echo $event->getProjetEventType() ?>'><?php
    echo format_date($event->getUpdatedAt()).' | ';
    echo $event->getMembre().' a ajouté ';
    echo $event->getProjetEventType()->getDescription();
    if($event->getCommentaire())
      echo '<div class=\'commentaire\'>'.$event->getCommentaire().'</div>';
  ?></div>
  <?php endforeach; ?>
</div>

<ul>
  <li><?php echo link_to('Ajouter un evenement', '@projetevent?action=new&membre='.$user->getId().'&projet='.$projet->getId(), array('class'  => 'actionnew')) ?></li>
  <li><?php echo link_to('Editer le projet', '@projet?action=edit&id='.$projet->getId(), array('class'  => 'actionedit')) ?></li>
  <li><?php echo link_to('Retour à la liste', '@projet.index', array('class'  => 'actionlist')) ?></li>
</ul>
