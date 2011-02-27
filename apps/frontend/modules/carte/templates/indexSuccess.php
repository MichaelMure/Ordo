<?php use_helper('Url'); ?>
<h1>Cartes de visites</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Poste</th>
      <th>Carte de visite recto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($membres as $membre): ?>
    <tr class='<?php echo $membre->getStatus() ?>'>
      <td><?php if($user->isAdmin() || $membre->getId() == $user->getId()) echo link_to($membre->getPrenom().' '.$membre->getNom(), '@annuaire?action=show&id='.$membre->getId());
                else echo $membre->getPrenom().' '.$membre->getNom(); ?></td>
      <td><?php echo $membre->getPoste() ?></td>
      <td><?php echo link_to('Recto', '@carte?action=recto&id='.$membre->getId()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<p>Les cartes de visites sont au format vectoriel SVG et s'ouvrent avec le logiciel libre Inkscape. <?php echo link_to('Télécharger Inkscape.', 'http://inkscape.org/download/?lang=fr') ?></p>
<p>Le verso des cartes est commun à tout les cartes. <?php echo link_to('Télécharger le verso', '@carte?action=verso').'.' ?></p>
