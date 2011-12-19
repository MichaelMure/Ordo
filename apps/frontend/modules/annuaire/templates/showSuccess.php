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
<article class="page-annuaire page-annuaire-show">
  <header>
    <h1>
      <?php echo $membre; ?>
    </h1>
    <aside>
      <ul>
        <?php if( $editable ): ?>
        <li><?php echo link_to('Editer la fiche', '@annuaire?action=edit&id='.$membre->getId(), array('class' => 'actionedit')) ?></li>
        <li><?php echo link_to('Changer mon mot de passe', '@annuaire?action=changeMDP') ?></li>
        <li><?php echo link_to('Modifier la photo', '@annuaire?action=changePhoto&id=' . $membre->getId()) ?></li>
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
        <?php endif; ?>
        <li><?php echo link_to('Retour à la liste', '@annuaire', array('class' => 'actionlist')) ?></li>
      </ul>
    </aside>
  </header>

  <div id='annuaire.show.tableauID'>
    
    <figure>
      <?php echo $membre->getPhoto() ? image_tag('/uploads/annuaire/' . $membre->getPhoto()) : image_tag('avatar-empty'); ?>
      <figcaption>
        <span class="status"><span class="datas"><?php echo $membre->getStatus(); ?></span></span>
        <span class="filiere <?php echo getClass($membre->getFiliere()) ?>"><span class="datas"><?php echo $membre->getFiliere(); ?></span></span>
        <span class="poste"><span class="datas"><?php echo $membre->getPoste(); ?></span></span>
      </figcaption>
    </figure>
    
  
    <div class="other">
      <dl>
        <?php if( $editable ): ?>
        <dt class="isAdmin">Numéro étudiant</dt>
        <dd class="isAdmin"><span class="datas"><?php echo $membre->getNumeroEtudiant(); ?></span></dd>
        
        <dt class="isAdmin">Numéro de sécu</dt>
        <dd class="isAdmin"><span class="datas"><?php echo $membre->getNumeroSecu(); ?></span></dd>
        <?php endif; ?>
        
        <dt>Fiche crée le</dt>
        <dd><span class="datas"><?php echo format_date($membre->getCreatedAt()) ?></span></dd>
        
        <dt>Dernière mise à jour</dt>
        <dd><span class="datas"><?php echo format_date($membre->getUpdatedAt()) ?></span></dd>
        
        <dt>Cotisations</dt>
        <dd>
        <span class="datas"><?php
        $cotisation_annee = array();
        foreach($membre->getCotisations() as $cotisation)
        $cotisation_annee[] = $cotisation->__toString();
        echo implode('</span>, <span class="datas">', $cotisation_annee) ?></span>
        </dd>
        
        <dt>Quittances</dt>
        <dd>
        <span class="datas"><?php
        $quittance_annee = array();
        foreach($membre->getQuittances() as $quittance)
        $quittance_annee[] = $quittance->__toString();
        echo implode(',', $quittance_annee) ?></span>
        </dd>
      </dl>
    </div>
    
    <div class="vcard">
      <h2><span class="datas"><?php echo $membre->getNom(); ?></span> <span class="datas"><?php echo $membre->getPrenom(); ?></span> (<span class="datas"><?php echo $membre->getUsername(); ?></span>)</h2>
      <dl>
        <dt></dt>
        <dd>
          <span class="datas"><?php echo $membre->getSexe(); ?></span>
          - né le <span class="datas"><?php echo format_date($membre->getDateNaissance()); ?></span>
          - à <span class="datas"><?php echo $membre->getVilleNaissance(); ?></span>
        </dd>
        
        <dt>Adresse :</dt>
        <dd>
          <span class="datas"><?php if( $membre->getAdresseMulhouse() ): ?>
            <span class="datas"><?php echo nl2br($membre->getAdresseMulhouse()) ?></span><br/>
            <span class="datas"><?php echo $membre->getCpMulhouse(); ?></span><br/>
            <span class="datas"><?php echo $membre->getVilleMulhouse(); ?></span>
            <?php endif; ?></span>
        </dd>
        
        <?php if( $editable ): ?>
        <dt class="isAdmin">Adresse (parents) :</dt>
        <dd>
          <span class="datas"><?php if( $membre->getAdresseParents() . $membre->getVilleParents() ): ?>
            <span class="datas"><?php echo nl2br($membre->getAdresseParents()) ?></span><br/>
            <span class="datas"><?php echo $membre->getCpParents(); ?></span><br/>
            <span class="datas"><?php echo $membre->getVilleParents(); ?></span>
            <?php endif; ?></span>
        </dd>
        <?php endif; ?>
        
        <dt>Téléphone :</dt>
        <dd>
          <span class="list"><span class="datas"><?php echo $membre->getTelMobile(); ?></span>
          <span class="list"><span class="datas"><?php echo $membre->getTelFixe(); ?></span>
        </dd>
        </dd>
        
        <dt>Email :</dt>
        <dd>
          <?php if( $editable ): ?>
          <span class="list isAdmin"><span class="datas"><?php echo $membre->getEmailExterne(); ?></span>
          <?php endif; ?>
          <span class="list"><span class="datas"><?php echo $membre->getEmailInterne(); ?></span>
        </dd>
        
        <dt>Promotion :</dt>
        <dd><span class="datas"><?php echo $membre->getPromo(); ?></span></dd>
      </dl>
      <br class="clear" />
    </div>
    
    <br class="clear" />
    <hr />
    
  <?php
  $carteID = $membre->getCarteID();
  $justif= $membre->getJustDomicile();
  $quittance = $membre->getCurrentQuittance();
  $cotis = $membre->getCurrentCotisation();
  $RI = $membre->getReglementInterieur();
  $CE = $membre->getConventionEtudiant();
  ?>

  <?php if(!$user->isAncien()): ?>
  <br />

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
  <?php endif ?>
</article>


<article class="box box-2">
    <header>
      <h1>Mes projets</h1>
    </header>
    <table>
      <thead>
        <tr>
          <th>Projet</th>
          <th>Date</th>
          <th>Etat</th>
          <th>Rôle/JEH</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach( $mesProjets as $projet ): ?>
        <tr>
          <td><?php echo link_to($projet, '@projet?action+show&id=' . $projet->getId()); ?></td>
          <td>
            <?php echo format_date($projet->getDateDebut()); ?> - <?php echo format_date($projet->getDateCloture()); ?>
          </td>
          <td>
            <?php echo $projet->getQualite(); ?>/10 - <?php echo $projet->getAvancement(); ?>%
          </td>
          <td>
            <?php echo $projet->getRole(); ?>
            (<?php echo $projet->getJeh(); ?> JEH)
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
</article>
