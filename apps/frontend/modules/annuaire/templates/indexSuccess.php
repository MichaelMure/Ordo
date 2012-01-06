<?php
use_helper('Filter', 'Url');

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
<article>
  <header>
    <h1>Liste des membres (<?php echo count($membres); ?>)</h1>
    <aside>
      <ul>
        <li><?php echo filter_link_to('Membres',   '@annuaire', array($sf_request, 'membre')); ?></li>
        <li><?php echo filter_link_to('Anciens',   '@annuaire', array($sf_request, 'ancien')); ?></li>
        <li><?php echo link_to('Ajouter un membre', '@annuaire?action=new', array('class'  => 'actionnew')) ?></li>
      </ul>
    </aside>
  </header>

  <table class="sort">
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
      <tr class="<?php echo $membre->getStatus() ?>">
        <td><?php if($user->isAdmin() || $membre->getId() == $user->getId()) echo link_to($membre, '@annuaire?action=show&id='.$membre->getId());
            else echo $membre->getPrenom().' '.$membre->getNom(); ?></td>
        <td class="a-c"><?php echo $membre->getPoste() ?></td>
        <td class="a-c"><?php echo $membre->getTelMobile() ?></td>
        <td class="a-c"><?php echo mail_to($membre->getEmailInterne()) ?></td>
        <td class="a-c"><?php echo $membre->getPromo() ?></td>
        <td class="<?php echo getClass($membre->getFiliere()) ?>"><?php echo $membre->getFiliere() ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</article>
