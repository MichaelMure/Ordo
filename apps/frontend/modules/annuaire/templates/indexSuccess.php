<?php use_helper('Url');
function getClass($filiere)
{
  switch($filiere)
  {
    case 'Informatique':
      return 'ir';
    case 'Automatique':
      return 'sys';
    case 'Mécanique':
      return 'meca';
    case 'Textile':
      return 'tex';
    case 'Système de prod':
      return 'prod';
  }
}
?>
<h1>Liste des membres</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Poste</th>
      <th>Téléphone</th>
      <th>Email</th>
      <th>Promo</th>
      <th>Filière</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($membres as $membre): ?>
    <tr class='<?php echo $membre->getStatus() ?>'>
      <td><?php if($user->isAdmin() || $membre->getId() == $user->getId()) echo link_to($membre, '@annuaire?action=show&id='.$membre->getId());
                else echo $membre->getPrenom().' '.$membre->getNom(); ?></td>
      <td><?php echo $membre->getPoste() ?></td>
      <td><?php echo $membre->getTelMobile() ?></td>
      <td><?php echo mail_to($membre->getEmailInterne()) ?></td>
      <td><?php echo $membre->getPromo() ?></td>
      <td class='<?php echo getClass($membre->getFiliere()) ?>'><?php echo $membre->getFiliere() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to('Ajouter un membre', '@annuaire?action=new', array('class'  => 'actionnew')) ?>
