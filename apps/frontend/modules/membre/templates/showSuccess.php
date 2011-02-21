<table>
  <tbody>
    <tr>
      <th>Username:</th>
      <td><?php echo $membre->getUsername() ?></td>
    </tr>
    <tr>
      <th>Passwd:</th>
      <td><?php echo $membre->getPasswd() ?></td>
    </tr>
    <tr>
      <th>Numero etudiant:</th>
      <td><?php echo $membre->getNumeroEtudiant() ?></td>
    </tr>
    <tr>
      <th>Prenom:</th>
      <td><?php echo $membre->getPrenom() ?></td>
    </tr>
    <tr>
      <th>Nom:</th>
      <td><?php echo $membre->getNom() ?></td>
    </tr>
    <tr>
      <th>Sexe:</th>
      <td><?php echo $membre->getSexe() ?></td>
    </tr>
    <tr>
      <th>Date naissance:</th>
      <td><?php echo $membre->getDateNaissance() ?></td>
    </tr>
    <tr>
      <th>Ville naissance:</th>
      <td><?php echo $membre->getVilleNaissance() ?></td>
    </tr>
    <tr>
      <th>Numero secu:</th>
      <td><?php echo $membre->getNumeroSecu() ?></td>
    </tr>
    <tr>
      <th>Promo:</th>
      <td><?php echo $membre->getPromo() ?></td>
    </tr>
    <tr>
      <th>Filiere:</th>
      <td><?php echo $membre->getFiliere() ?></td>
    </tr>
    <tr>
      <th>Poste:</th>
      <td><?php echo $membre->getPoste() ?></td>
    </tr>
    <tr>
      <th>Adresse mulhouse:</th>
      <td><?php echo $membre->getAdresseMulhouse() ?></td>
    </tr>
    <tr>
      <th>Cp mulhouse:</th>
      <td><?php echo $membre->getCpMulhouse() ?></td>
    </tr>
    <tr>
      <th>Ville mulhouse:</th>
      <td><?php echo $membre->getVilleMulhouse() ?></td>
    </tr>
    <tr>
      <th>Adresse parents:</th>
      <td><?php echo $membre->getAdresseParents() ?></td>
    </tr>
    <tr>
      <th>Cp parents:</th>
      <td><?php echo $membre->getCpParents() ?></td>
    </tr>
    <tr>
      <th>Ville parents:</th>
      <td><?php echo $membre->getVilleParents() ?></td>
    </tr>
    <tr>
      <th>Tel mobile:</th>
      <td><?php echo $membre->getTelMobile() ?></td>
    </tr>
    <tr>
      <th>Tel fixe:</th>
      <td><?php echo $membre->getTelFixe() ?></td>
    </tr>
    <tr>
      <th>Email interne:</th>
      <td><?php echo $membre->getEmailInterne() ?></td>
    </tr>
    <tr>
      <th>Email externe:</th>
      <td><?php echo $membre->getEmailExterne() ?></td>
    </tr>
    <tr>
      <th>Carte:</th>
      <td><?php echo $membre->getCarteID() ?></td>
    </tr>
    <tr>
      <th>Just domicile:</th>
      <td><?php echo $membre->getJustDomicile() ?></td>
    </tr>
    <tr>
      <th>Quittance:</th>
      <td><?php echo $membre->getQuittance() ?></td>
    </tr>
    <tr>
      <th>Cotisation:</th>
      <td><?php echo $membre->getCotisation() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $membre->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $membre->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $membre->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('membre/edit?id='.$membre->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('membre/index') ?>">List</a>
