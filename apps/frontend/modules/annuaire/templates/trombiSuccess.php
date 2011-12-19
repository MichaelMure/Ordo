<article class="page-annuaire page-annuaire-trombi">
  <header>
    <h1>Trombinoscope</h1>
  </header>

  <div id="annuaire-trombi">
    <aside>
      <ul class="liens1">
        <li><?php echo link_to('IARISS', array_merge($sf_params->getRawValue()->getAll(), array('pole' => '0'))); ?></li>
        <?php foreach( $poles as $pole ): ?>
        <li><?php echo link_to(ucfirst($pole), array_merge($sf_params->getRawValue()->getAll(), array('pole' => $pole)), $sf_request->getParameter('pole') == $pole ? 'class=active' : null); ?></li>
        <?php endforeach; ?>
      </ul>
      <ul class="liens2">
        <li><?php echo link_to('Tous', array_merge($sf_params->getRawValue()->getAll(), array('promo' => '0'))); ?></li>
        <?php foreach( $promos as $promo ): ?>
        <li><?php echo link_to($promo, array_merge($sf_params->getRawValue()->getAll(), array('promo' => $promo)), $sf_request->getParameter('promo') == $promo ? 'class=active' : null); ?></li>
        <?php endforeach; ?>
      </ul>
    </aside>

    <p style="text-align: center; font-size: .75em; margin: 5px; ">
      <?php echo count($membres); ?> membres
    </p>

    <ul class="liste">
      <?php foreach( $membres as $membre ): ?>
      <li data-filter="<?php echo strtolower($membre->getPoste()); ?>" class="<?php echo strpos($membre->getPoste(), '*') !== false ? 'responsable' : null; ?>">
        <figure title="Tél: <?php echo $membre->getTelMobile(); ?> - Email: <?php echo $membre->getEmailInterne(); ?>">
          <?php echo $membre->getPhoto() ? image_tag('/uploads/annuaire/' . $membre->getPhoto()) : image_tag('avatar-empty', array('class' => 'empty')); ?>
          <figcaption>
            <a href="<?php echo url_for('@annuaire?action=show&id=' . $membre->getId()); ?>">
              <?php if( $membre->getNom() . $membre->getPrenom() ): ?>
              <span class="nom"><?php echo $membre->getNom(); ?></span> <span class="prenom"><?php echo $membre->getPrenom(); ?></span>
              <?php else: ?>
              <span class="prenom"><?php echo $membre; ?></span>
              <?php endif; ?>
            </a>
            <span class="fonction"><?php echo str_replace('*', '', $membre->getPoste()); ?></span>
          </figcaption>
        </figure>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</article>
