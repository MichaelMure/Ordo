<?php use_helper('Date') ?>

<div id='annuaire.show.tableauID'>
  <table>
    <tbody>
      <tr>
        <th>Login</th>
        <td><?php echo $membre->getUsername() ?></td>
        <th>Adresse locale</th>
        <td><?php echo $membre->getAdresseMulhouse() ?><br/>
            <?php echo $membre->getCpMulhouse() ?><br/>
            <?php echo $membre->getVilleMulhouse() ?>
        </td>
      </tr>
      <tr>
        <th>Numéro étudiant</th>
        <td><?php echo $membre->getNumeroEtudiant() ?></td>
        <th>Adresse des parents</th>
        <td><?php echo $membre->getAdresseParents() ?><br/>
            <?php echo $membre->getCpParents() ?><br/>
            <?php echo $membre->getVilleParents() ?>
        </td>
      </tr>
      <tr>
        <th>Nom</th>
        <td><?php echo $membre->getNom() ?></td>
        <th>Téléphone portable</th>
        <td><?php echo $membre->getTelMobile() ?></td>
      </tr>
      <tr>
        <th>Prenom</th>
        <td><?php echo $membre->getPrenom() ?></td>
        <th>Téléphone fixe</th>
        <td><?php echo $membre->getTelFixe() ?></td>
      </tr>
      <tr>
        <th>Sexe</th>
        <td><?php echo $membre->getSexe() ?></td>
        <th>Email IARISS</th>
        <td><?php echo $membre->getEmailInterne() ?></td>
      </tr>
      <tr>
        <th>Date de naissance</th>
        <td><?php echo format_date($membre->getDateNaissance()) ?></td>
        <th>Email externe</th>
        <td><?php echo $membre->getEmailExterne() ?></td>
      </tr>
      <tr>
        <th>Ville de naissance</th>
        <td><?php echo $membre->getVilleNaissance() ?></td>
        <th>Status pour l'annuaire</th>
        <td><?php echo $membre->getStatus() ?></td>
      </tr>
      <tr>
        <th>Numero de sécu</th>
        <td><?php echo $membre->getNumeroSecu() ?></td>
        <th>Fiche crée le</th>
        <td><?php echo format_date($membre->getCreatedAt()) ?></td>
      </tr>
      <tr>
        <th>Promotion</th>
        <td><?php echo $membre->getPromo() ?></td>
        <th>Dernière mise à jour le</th>
        <td><?php echo format_date($membre->getUpdatedAt()) ?></td>
      </tr>
      <tr>
        <th>Filière</th>
        <td><?php echo $membre->getFiliere() ?></td>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>Poste</th>
        <td><?php echo $membre->getPoste() ?></td>
        <th></th>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

<?php
if($admin) :
$carteID = $membre->getCarteID();
$justif= $membre->getJustDomicile();
$quittance = $membre->getQuittance();
$cotis = $membre->getCotisation();
?>

<div id='annuaire.show.tableauDocument'>
  <table>
    <thead>
      <tr>
        <th>Carte ID</th>
        <th>Justificatif de domicile</th>
        <th>Quittance</th>
        <th>Cotisation</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class='<?php echo $carteID? 'vert' : 'rouge' ?>'><?php echo $carteID? 'oui' : 'non' ?></td>
        <td class='<?php echo $justif? 'vert' : 'rouge' ?>'><?php echo $justif? 'oui' : 'non' ?></td>
        <td class='<?php echo $quittance? 'vert' : 'rouge' ?>'><?php echo $quittance? 'oui' : 'non' ?></td>
        <td class='<?php echo $cotis? 'vert' : 'rouge' ?>'><?php echo $cotis? 'oui' : 'non' ?></td>
      </tr>
      <tr>
        <td><?php if($carteID) echo link_to('dévalider', '@annuaire?id='.$membre->getId().'&devalider=CarteID');
              else echo link_to('valider', '@annuaire?id='.$membre->getId().'&valider=CarteID'); ?></td>
        <td><?php if($justif) echo link_to('dévalider', '@annuaire?id='.$membre->getId().'&devalider=JustDomicile');
              else echo link_to('valider', '@annuaire?id='.$membre->getId().'&valider=JustDomicile'); ?></td>
        <td><?php if($quittance) echo link_to('dévalider', '@annuaire?id='.$membre->getId().'&devalider=Quittance');
              else echo link_to('valider', '@annuaire?id='.$membre->getId().'&valider=Quittance'); ?></td>
        <td><?php if($cotis) echo link_to('dévalider', '@annuaire?id='.$membre->getId().'&devalider=Cotisation');
              else echo link_to('valider', '@annuaire?id='.$membre->getId().'&valider=Cotisation'); ?></td>
      </tr>
    </tbody>
  </table>
</div>
<?php endif ?>

<div id='annuaire.show.button'>
  <ul>
    <?php if($allow_edit) : ?>
    <li><?php echo link_to('Editer la fiche', '@annuaire?action=edit&id='.$membre->getId()) ?>
    <?php endif ?>
    <li><?php echo link_to('Retour à la liste', '@annuaire') ?></li>

  <?php switch($admin && $membre->getStatus()) {
    case 'Administrateur':
      echo '<li>'.link_to('Désactiver les droits admin', '@annuaire.status?id='.$membre->getId().'&status=Membre').'</li>';
      echo '<li>'.link_to('Marquer comme ancien', '@annuaire.status?id='.$membre->getId().'&status=Ancien').'</li>';
      break;
    case 'Membre':
      echo '<li>'.link_to('Passer administateur', '@annuaire.status?id='.$membre->getId().'&status=Administrateur').'</li>';
      echo '<li>'.link_to('Marquer comme ancien', '@annuaire.status?id='.$membre->getId().'&status=Ancien').'</li>';
      break;
    case 'Ancien':
      echo '<li>'.link_to('Marquer comme membre actuel', '@annuaire.status?id='.$membre->getId().'&status=Membre').'</li>';
      break;
    } ?>
  </ul>
</div>

