<article>
    <header>
        <h1>Liste des documents</h1>
    </header>

    <table class="sort">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Numero de téléphone</th>
          <th>Pièce d'identité</th>
          <th>Quittance</th>
          <th>Cotisation</th>
          <th>Justificatif de domicile</th>
          <th>Règlement intérieur &amp; statuts</th>
          <th>Convention étudiant</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($membres as $membre): ?>
        <tr>
          <td><?php if($user->isAdmin() || $membre->getId() == $user->getId()) echo link_to($membre, '@annuaire?action=show&id='.$membre->getId());
                    else echo $membre; ?></td>
          <td><?php echo $membre->getTelMobile() ?></td>
          <td class='a-c <?php echo $membre->getcarteId() ? 'vert' : 'rouge' ?>'><?php echo $membre->getcarteId() ? 'oui' : 'non' ?></td>
          <td class='a-c <?php echo $membre->getCurrentQuittance() ? 'vert' : 'rouge' ?>'><?php echo $membre->getCurrentQuittance() ? 'oui' : 'non' ?></td>
          <td class='a-c <?php echo $membre->getCurrentCotisation() ? 'vert' : 'rouge' ?>'><?php echo $membre->getCurrentCotisation() ? 'oui' : 'non' ?></td>
          <td class='a-c <?php echo $membre->getJustDomicile() ? 'vert' : 'rouge' ?>'><?php echo $membre->getJustDomicile() ? 'oui' : 'non' ?></td>
          <td class='a-c <?php echo $membre->getReglementInterieur() ? 'vert' : 'rouge' ?>'><?php echo $membre->getReglementInterieur() ? 'oui' : 'non' ?></td>
          <td class='a-c <?php echo $membre->getConventionEtudiant() ? 'vert' : 'rouge' ?>'><?php echo $membre->getConventionEtudiant() ? 'oui' : 'non' ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</article>
