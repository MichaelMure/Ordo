<?php use_helper('Date') ?>
<h1>Liste des prospects à rappeler</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Contact</th>
      <th>Ville</th>
      <th>Tel fixe</th>
      <th>Site web</th>
      <th>A recontacter</th>
      <th>Date de recontact</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($prospects as $prospect): ?>
    <tr>
      <td><a href="<?php echo url_for('@prospect?action=show?id='.$prospect->getId()) ?>"><?php echo $prospect->getNom() ?></a></td>
      <td><?php echo $prospect->getContact() ?></td>
      <td><?php echo $prospect->getVille() ?></td>
      <td><?php echo $prospect->getTelFixe() ?></td>
      <td><?php echo $prospect->getSiteWeb() ?></td>
      <td class="<?php echo ($prospect->getARappeler()) ? "oui" : "non" ?>"><?php echo ($prospect->getARappeler()) ? "oui" : "non" ?></td>
      <td><?php echo format_date($prospect->getDateRecontact()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('@prospect?action=new') ?>">Ajouter un prospects</a>
