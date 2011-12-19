<!doctype html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="global">
      <div id="entete">
        ERP IARISS
        <div id="login">
          <?php echo (isset($_SERVER['PHP_AUTH_USER']) && $user = Doctrine::getTable('Membre')
          ->createQuery('m')
          ->select('m.nom, m.prenom, m.username, m.status')
          ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
          ->execute()->getFirst()) ? $user->getFullString() : "Anonyme" ?>
        </div>
      </div>
      <div id="navigation">
        <ul>
          <li>Annuaire
            <ul>
              <li><?php echo link_to('Liste des membres', '@annuaire?action=index') ?></li>
              <li><?php echo link_to('Trombinoscope', '@annuaire?action=trombi') ?></li>
              <?php if(isset($user) && !$user->isAncien()): ?>
              <li><?php echo link_to('Liste des documents', '@annuaire?action=document') ?></li>
              <?php endif ?>
              <?php if(isset($user)): ?>
              <li><?php echo link_to('Ma fiche', '@annuaire?action=show&id='.$user->getId()) ?></li>
              <?php endif ?>
              <?php if(isset($user) && !$user->isAncien()): ?>
              <li><?php echo link_to('Ajouter un membre', '@annuaire?action=new') ?></li>
              <li><?php echo link_to('Indicateurs', '@annuaire?action=indicateurs') ?></li>
              <?php endif ?>
            </ul>
          </li>
          <?php if(isset($user) && !$user->isAncien()): ?>
          <li>Cartes de visites
            <ul>
              <li><?php echo link_to('Liste des cartes', '@carte?action=index') ?></li>
              <li><?php echo link_to('Ma carte', '@carte?action=recto&id='.$user->getId()) ?></li>
            </ul>
          </li>
          <li>Contacts commerciaux
            <ul>
              <li><?php echo link_to('Liste des prospects', '@prospect.index') ?></li>
              <li><?php echo link_to('Ajouter un prospect', '@prospect?action=new') ?></li>
              <li><?php echo link_to('Liste des contacts', '@contact.index') ?></li>
              <li><?php echo link_to('Ajouter un contact', '@contact?action=new') ?></li>
              <li><?php echo link_to('Indicateurs', '@contact?action=stats') ?></li>
            </ul>
          </li>
          <li>Projets
            <ul>
              <li><?php echo link_to('Liste des projets', '@projet.index') ?></li>
              <li><?php echo link_to('Ajouter un projet', '@projet?action=new') ?></li>
              <li><?php echo link_to('Vue des documents', '@projet?action=document') ?></li>
            </ul>
          </li>
          <?php endif ?>
        </ul>
      </div>
      <div id="contenu">
        <?php echo $sf_content ?>
      </div>
    </div>
  </body>
</html>
