<?php use_helper('Date') ?>
<h1>Liste des projets</h1>

<table>
  <thead>
    <tr>
      <th>Projet</th>
      <th>État</th>
      <th>Qualité</th>
      <th>Prospect</th>
      <th>Chef de projet</th>
      <th>Date debut</th>
      <th>Date cloture</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($projets as $projet): ?>
    <tr>
      <td><a href="<?php echo url_for('@projet?action=show&id='.$projet->getId()) ?>"><?php echo $projet ?></a></td>
      <td><?php echo $projet->getEtat() ?></td>
      <td><?php echo $projet->getQualite() ?></td>
      <td><a href="<?php echo url_for('@prospect?action=show&id='.$projet->getProspectId()) ?>"><?php echo $projet->getProspect() ?></td>

      <?php if($respo = $projet->getRespo()) : ?>
      <td><a href="<?php echo url_for('@annuaire?action=show&id='.$respo->getId()) ?>"><?php echo $respo ?></td>
      <?php else : ?>
      <td>Pas de chef de projet assigné !</td>
      <?php endif ?>

      <td><?php echo format_date($projet->getDateDebut()) ?></td>
      <td><?php echo format_date($projet->getDateCloture()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to('Ajouter un projet', '@projet?action=new', array('class'  => 'actionnew')) ?>
