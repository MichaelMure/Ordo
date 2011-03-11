<h1>Projets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Numero</th>
      <th>Nom</th>
      <th>Date debut</th>
      <th>Date cloture</th>
      <th>Prospect</th>
      <th>Respo</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Deleted at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($projets as $projet): ?>
    <tr>
      <td><a href="<?php echo url_for('projet/show?id='.$projet->getId()) ?>"><?php echo $projet->getId() ?></a></td>
      <td><?php echo $projet->getNumero() ?></td>
      <td><?php echo $projet->getNom() ?></td>
      <td><?php echo $projet->getDateDebut() ?></td>
      <td><?php echo $projet->getDateCloture() ?></td>
      <td><?php echo $projet->getProspectId() ?></td>
      <td><?php echo $projet->getRespoId() ?></td>
      <td><?php echo $projet->getCreatedAt() ?></td>
      <td><?php echo $projet->getUpdatedAt() ?></td>
      <td><?php echo $projet->getDeletedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projet/new') ?>">New</a>
