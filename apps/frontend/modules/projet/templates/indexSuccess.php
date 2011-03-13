<?php use_helper('Date') ?>
<h1>Liste des projets</h1>

<table>
  <thead>
    <tr>
      <th>Numéro</th>
      <th>Nom</th>
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
      <td><a href="<?php echo url_for('@projet?action=show&id='.$projet->getId()) ?>"><?php echo $projet->getNumero() ?></a></td>
      <td><?php echo $projet->getNom() ?></td>
      <td><?php echo $projet->getEtat() ?></td>
      <td><?php echo $projet->getQualite() ?></td>
      <td><a href="<?php echo url_for('@prospect?action=show&id='.$projet->getProspectId()) ?>"><?php echo $projet->getProspect() ?></td>
      <td><a href="<?php echo url_for('@annuaire?action=show&id='.$projet->getRespoId()) ?>"><?php echo $projet->getRespo() ?></td>
      <td><?php echo format_date($projet->getDateDebut()) ?></td>
      <td><?php echo format_date($projet->getDateCloture()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to('Ajouter un projet', '@projet?action=new', array('class'  => 'actionnew')) ?>
