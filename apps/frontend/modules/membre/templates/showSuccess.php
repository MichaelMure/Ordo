<?php use_helper('Date');
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

<div id='annuaire.show.tableauID'>
  <table>
    <tbody>
      <tr>
        <th>Login</th>
        <td><?php echo $membre->getUsername() ?></td>
        <th>Numéro étudiant</th>
        <td><?php echo $membre->getNumeroEtudiant() ?></td>
      </tr>
      <tr>
        <th>Nom</th>
        <td><?php echo $membre->getNom() ?></td>
        <th>Poste</th>
        <td><?php echo $membre->getPoste() ?></td>
      </tr>
      <tr>
        <th>Prenom</th>
        <td><?php echo $membre->getPrenom() ?></td>
        <th>Filière</th>
        <td class='<?php echo getClass($membre->getFiliere()) ?>'><?php echo $membre->getFiliere() ?></td>
      </tr>
      <tr>
        <th>Adresse locale</th>
        <td><?php echo nl2br($membre->getAdresseMulhouse()) ?><br/>
            <?php echo $membre->getCpMulhouse() ?><br/>
            <?php echo $membre->getVilleMulhouse() ?>
        </td>
        <th>Adresse des parents</th>
        <td><?php echo nl2br($membre->getAdresseParents()) ?><br/>
            <?php echo $membre->getCpParents() ?><br/>
            <?php echo $membre->getVilleParents() ?>
        </td>
      </tr>
      <tr>
        <th>Sexe</th>
        <td><?php echo $membre->getSexe() ?></td>
        <th>Téléphone portable</th>
        <td><?php echo $membre->getTelMobile() ?></td>
      </tr>
      <tr>
        <th>Date de naissance</th>
        <td><?php echo format_date($membre->getDateNaissance()) ?></td>
        <th>Téléphone fixe</th>
        <td><?php echo $membre->getTelFixe() ?></td>
      </tr>
      <tr>
        <th>Ville de naissance</th>
        <td><?php echo $membre->getVilleNaissance() ?></td>
        <th>Email IARISS</th>
        <td><?php echo $membre->getEmailInterne() ?></td>
      </tr>
      <tr>
        <th>Numero de sécu</th>
        <td><?php echo $membre->getNumeroSecu() ?></td>
        <th>Email externe</th>
        <td><?php echo $membre->getEmailExterne() ?></td>
      </tr>
      <tr>
        <th>Status pour l'annuaire</th>
        <td><?php echo $membre->getStatus() ?></td>
        <th>Promotion</th>
        <td><?php echo $membre->getPromo() ?></td>
      </tr>
      <tr>
        <th>Fiche crée le</th>
        <td><?php echo format_date($membre->getCreatedAt()) ?></td>
        <th>Dernière mise à jour le</th>
        <td><?php echo format_date($membre->getUpdatedAt()) ?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php
$carteID = $membre->getCarteID();
$justif= $membre->getJustDomicile();
$quittance = $membre->getQuittance();
$cotis = $membre->getCotisation();
$RI = $membre->getReglementInterieur();
$CE = $membre->getConventionEtudiant();
?>

<div id='annuaire.show.tableauDocument'>
  <table>
    <thead>
      <tr>
        <th>Pièce d'identité</th>
        <th>Justificatif de domicile</th>
        <th>Quittance</th>
        <th>Cotisation</th>
        <th>Règlement intérieur &amp; statuts</th>
        <th>Convention étudiant</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class='<?php echo $carteID? 'vert' : 'rouge' ?>'><?php echo $carteID? 'oui' : 'non' ?></td>
        <td class='<?php echo $justif? 'vert' : 'rouge' ?>'><?php echo $justif? 'oui' : 'non' ?></td>
        <td class='<?php echo $quittance? 'vert' : 'rouge' ?>'><?php echo $quittance? 'oui' : 'non' ?></td>
        <td class='<?php echo $cotis? 'vert' : 'rouge' ?>'><?php echo $cotis? 'oui' : 'non' ?></td>
        <td class='<?php echo $RI? 'vert' : 'rouge' ?>'><?php echo $RI? 'oui' : 'non' ?></td>
        <td class='<?php echo $CE? 'vert' : 'rouge' ?>'><?php echo $CE? 'oui' : 'non' ?></td>
      </tr>
      <?php if($user->isAdmin()): ?>
      <tr>
        <td><?php if($carteID) echo link_to('dévalider', '@annuaire?action=show&id='.$membre->getId().'&devalider=CarteID');
              else echo link_to('valider', '@annuaire?action=show&id='.$membre->getId().'&valider=CarteID'); ?></td>
        <td><?php if($justif) echo link_to('dévalider', '@annuaire?action=show&id='.$membre->getId().'&devalider=JustDomicile');
              else echo link_to('valider', '@annuaire?action=show&id='.$membre->getId().'&valider=JustDomicile'); ?></td>
        <td><?php if($quittance) echo link_to('dévalider', '@annuaire?action=show&id='.$membre->getId().'&devalider=Quittance');
              else echo link_to('valider', '@annuaire?action=show&id='.$membre->getId().'&valider=Quittance'); ?></td>
        <td><?php if($cotis) echo link_to('dévalider', '@annuaire?action=show&id='.$membre->getId().'&devalider=Cotisation');
              else echo link_to('valider', '@annuaire?action=show&id='.$membre->getId().'&valider=Cotisation'); ?></td>
        <td><?php if($RI) echo link_to('dévalider', '@annuaire?action=show&id='.$membre->getId().'&devalider=RI');
              else echo link_to('valider', '@annuaire?action=show&id='.$membre->getId().'&valider=RI'); ?></td>
        <td><?php if($CE) echo link_to('dévalider', '@annuaire?action=show&id='.$membre->getId().'&devalider=CE');
              else echo link_to('valider', '@annuaire?action=show&id='.$membre->getId().'&valider=CE'); ?></td>
      </tr>
      <?php endif ?>
    </tbody>
  </table>
</div>

<div id='annuaire.show.button'>
  <ul>
    <li><?php echo link_to('Editer la fiche', '@annuaire?action=edit&id='.$membre->getId()) ?></li>
    <li><?php echo link_to('Changer mon mot de passe', '@annuaire?action=changeMDP') ?></li>

  <?php 
  if($user->isAdmin())
  {
    switch($membre->getStatus()) 
    {
      case 'Administrateur':
        echo '<li>'.link_to('Désactiver les droits admin', '@annuaire?action=status&id='.$membre->getId().'&status=Membre').'</li>';
        echo '<li>'.link_to('Marquer comme ancien', '@annuaire?action=status&id='.$membre->getId().'&status=Ancien').'</li>';
        break;
      case 'Membre':
        echo '<li>'.link_to('Passer administateur', '@annuaire?action=status&id='.$membre->getId().'&status=Administrateur').'</li>';
        echo '<li>'.link_to('Marquer comme ancien', '@annuaire?action=status&id='.$membre->getId().'&status=Ancien').'</li>';
        break;
      case 'Ancien':
        echo '<li>'.link_to('Marquer comme membre actuel', '@annuaire?action=status&id='.$membre->getId().'&status=Membre').'</li>';
        break;
    }
  }
  ?>

    <li><?php echo link_to('Retour à la liste', '@annuaire') ?></li>
  </ul>
</div>

