<h1>Liste des documents</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Numero de téléphone</th>
      <th>Carte d'identité</th>
      <th>Quittance</th>
      <th>Justificatif de domicile</th>
      <th>Cotisation</th>
      <th>Reglement intérieur</th>
      <th>Convention étudiant</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($membres as $membre): ?>
    <tr>
      <td><?php echo link_to($membre->getPrenom().' '.$membre->getNom(), 'membre/show?id='.$membre->getId()) ?></td>
      <td><?php echo $membre->getTelMobile() ?></td>
      <td class='<?php echo $membre->getcarteId() ? 'vert' : 'rouge' ?>'><?php echo $membre->getcarteId() ? 'oui' : 'non' ?></td>
      <td class='<?php echo $membre->getQuittance() ? 'vert' : 'rouge' ?>'><?php echo $membre->getQuittance() ? 'oui' : 'non' ?></td>
      <td class='<?php echo $membre->getJustDomicile() ? 'vert' : 'rouge' ?>'><?php echo $membre->getJustDomicile() ? 'oui' : 'non' ?></td>
      <td class='<?php echo $membre->getCotisation() ? 'vert' : 'rouge' ?>'><?php echo $membre->getCotisation() ? 'oui' : 'non' ?></td>
      <td class='<?php echo $membre->getReglementInterieur() ? 'vert' : 'rouge' ?>'><?php echo $membre->getReglementInterieur() ? 'oui' : 'non' ?></td>
      <td class='<?php echo $membre->getConventionEtudiant() ? 'vert' : 'rouge' ?>'><?php echo $membre->getConventionEtudiant() ? 'oui' : 'non' ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
