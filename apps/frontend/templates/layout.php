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
        Annuaire IARISS
        <div id="login">
          <?php echo (isset($_SERVER['PHP_AUTH_USER']) && $user = Doctrine::getTable('Membre')
          ->createQuery('m')
          ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
          ->execute()->getFirst()) ? $user : "Anonyme" ?>
        </div>
      </div>
      <div id="navigation">
        <ul>
          <li>Annuaire</li>
            <ul>
              <li><?php echo link_to('Liste des membres', '@annuaire?action=index') ?></li>
              <li><?php echo link_to('Liste des documents', '@annuaire?action=document') ?></li>
              <?php if(isset($user)): ?>
              <li><?php echo link_to('Ma fiche', '@annuaire?action=show&id='.$user->getId()) ?></li>
              <?php endif ?>
              <li><?php echo link_to('Ajouter un membre', '@annuaire?action=new') ?></li>
            </ul>
          <li>Contact commerciaux</li>
          <li>Projets</li>
        </ul>
      </div>
      <div id="contenu">
        <?php echo $sf_content ?>
      </div>
    </div>
  </body>
</html>
