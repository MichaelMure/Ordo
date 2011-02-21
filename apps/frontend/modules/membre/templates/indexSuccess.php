<h1>Membres List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Passwd</th>
      <th>Numero etudiant</th>
      <th>Prenom</th>
      <th>Nom</th>
      <th>Sexe</th>
      <th>Date naissance</th>
      <th>Ville naissance</th>
      <th>Numero secu</th>
      <th>Promo</th>
      <th>Filiere</th>
      <th>Poste</th>
      <th>Adresse mulhouse</th>
      <th>Cp mulhouse</th>
      <th>Ville mulhouse</th>
      <th>Adresse parents</th>
      <th>Cp parents</th>
      <th>Ville parents</th>
      <th>Tel mobile</th>
      <th>Tel fixe</th>
      <th>Email interne</th>
      <th>Email externe</th>
      <th>Carte</th>
      <th>Just domicile</th>
      <th>Quittance</th>
      <th>Cotisation</th>
      <th>Status</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($membres as $membre): ?>
    <tr>
      <td><a href="<?php echo url_for('membre/show?id='.$membre->getId()) ?>"><?php echo $membre->getId() ?></a></td>
      <td><?php echo $membre->getUsername() ?></td>
      <td><?php echo $membre->getPasswd() ?></td>
      <td><?php echo $membre->getNumeroEtudiant() ?></td>
      <td><?php echo $membre->getPrenom() ?></td>
      <td><?php echo $membre->getNom() ?></td>
      <td><?php echo $membre->getSexe() ?></td>
      <td><?php echo $membre->getDateNaissance() ?></td>
      <td><?php echo $membre->getVilleNaissance() ?></td>
      <td><?php echo $membre->getNumeroSecu() ?></td>
      <td><?php echo $membre->getPromo() ?></td>
      <td><?php echo $membre->getFiliere() ?></td>
      <td><?php echo $membre->getPoste() ?></td>
      <td><?php echo $membre->getAdresseMulhouse() ?></td>
      <td><?php echo $membre->getCpMulhouse() ?></td>
      <td><?php echo $membre->getVilleMulhouse() ?></td>
      <td><?php echo $membre->getAdresseParents() ?></td>
      <td><?php echo $membre->getCpParents() ?></td>
      <td><?php echo $membre->getVilleParents() ?></td>
      <td><?php echo $membre->getTelMobile() ?></td>
      <td><?php echo $membre->getTelFixe() ?></td>
      <td><?php echo $membre->getEmailInterne() ?></td>
      <td><?php echo $membre->getEmailExterne() ?></td>
      <td><?php echo $membre->getCarteID() ?></td>
      <td><?php echo $membre->getJustDomicile() ?></td>
      <td><?php echo $membre->getQuittance() ?></td>
      <td><?php echo $membre->getCotisation() ?></td>
      <td><?php echo $membre->getStatus() ?></td>
      <td><?php echo $membre->getCreatedAt() ?></td>
      <td><?php echo $membre->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('membre/new') ?>">New</a>
