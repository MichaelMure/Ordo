<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $projet->getId() ?></td>
    </tr>
    <tr>
      <th>Numero:</th>
      <td><?php echo $projet->getNumero() ?></td>
    </tr>
    <tr>
      <th>Nom:</th>
      <td><?php echo $projet->getNom() ?></td>
    </tr>
    <tr>
      <th>Date debut:</th>
      <td><?php echo $projet->getDateDebut() ?></td>
    </tr>
    <tr>
      <th>Date cloture:</th>
      <td><?php echo $projet->getDateCloture() ?></td>
    </tr>
    <tr>
      <th>Prospect:</th>
      <td><?php echo $projet->getProspectId() ?></td>
    </tr>
    <tr>
      <th>Respo:</th>
      <td><?php echo $projet->getRespoId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $projet->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $projet->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Deleted at:</th>
      <td><?php echo $projet->getDeletedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projet/edit?id='.$projet->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projet/index') ?>">List</a>
