<?php use_helper('Date') ?>

<h1>Projet <?php echo $projet->getNumero().' / '.$projet->getNom() ?></h1>
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
      <th>Crée le</th>
      <th>Mis à jour le</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $projet->getEtat() ?></td>
      <td><?php echo $projet->getQualite() ?></td>
      <td><a href="<?php echo url_for('@prospect?action=show&id='.$projet->getProspectId()) ?>"><?php echo $projet->getProspect() ?></td>
      <td><a href="<?php echo url_for('@annuaire?action=show&id='.$projet->getRespoId()) ?>"><?php echo $projet->getRespo() ?></td>
      <td><?php echo $projet->getBudget() ?> €</td>
      <td><?php echo format_date($projet->getDateDebut()) ?></td>
      <td><?php echo format_date($projet->getDateCloture()) ?></td>
      <td><?php echo format_date($projet->getCreatedAt()) ?></td>
      <td><?php echo format_date($projet->getUpdatedAt()) ?></td>
    </tr>
  </tbody>
</table>

<h2>Commentaire</h2>
<?php echo $projet->getRawValue()->getCommentaire() ?>

<h2>Évenements</h2>
<ul id='projetEvent'>
  <?php foreach ($events as $event): ?>
  <li><?php echo $event->getMembre().' '.$event->getProjetEventType().' '.$event->getCommentaire() ?></li>
  <?php endforeach; ?>
</ul>

<ul>
  <li><?php echo link_to('Editer le projet', '@projet?action=edit&id='.$projet->getId()) ?></li>
  <li><?php echo link_to('Retour à la liste', '@projet.index') ?></li>
</ul>