<h1>Projet events List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Commentaire</th>
      <th>Type</th>
      <th>Membre</th>
      <th>Projet</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($projet_events as $projet_event): ?>
    <tr>
      <td><a href="<?php echo url_for('projetevent/edit?id='.$projet_event->getId()) ?>"><?php echo $projet_event->getId() ?></a></td>
      <td><?php echo $projet_event->getCommentaire() ?></td>
      <td><?php echo $projet_event->getTypeId() ?></td>
      <td><?php echo $projet_event->getMembreId() ?></td>
      <td><?php echo $projet_event->getProjetId() ?></td>
      <td><?php echo $projet_event->getCreatedAt() ?></td>
      <td><?php echo $projet_event->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projetevent/new') ?>">New</a>
