<h1>Lien membre projets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Role</th>
      <th>Projet</th>
      <th>Membre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lien_membre_projets as $lien_membre_projet): ?>
    <tr>
      <td><a href="<?php echo url_for('projetparticipant/edit?id='.$lien_membre_projet->getId()) ?>"><?php echo $lien_membre_projet->getId() ?></a></td>
      <td><?php echo $lien_membre_projet->getRole() ?></td>
      <td><?php echo $lien_membre_projet->getProjetId() ?></td>
      <td><?php echo $lien_membre_projet->getMembreId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projetparticipant/new') ?>">New</a>
