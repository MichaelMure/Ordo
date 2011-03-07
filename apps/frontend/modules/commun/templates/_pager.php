<?php if($pager->haveToPaginate()) : ?>
<?php $route = htmlspecialchars_decode($route); ?>
<ul class="pager">
  <?php if($pager->getPage() > $pager->getFirstPage()): ?>
    <li class="pagerlink"><?php echo link_to('Precedent', $route.'&page='.$pager->getPreviousPage() ) ?></li>
  <?php endif ?>

  <?php if($pager->getPage() - $pager->getFirstPage() < 7) : ?>

    <?php for($x = $pager->getFirstPage(); $x < $pager->getPage(); $x++): ?>
    <li class="pagerlink"><?php echo link_to($x, $route.'&page='.$x ) ?></li>
    <?php endfor ?>
    
  <?php else: ?>

    <?php for($x = $pager->getFirstPage(); $x < $pager->getFirstPage() + 3; $x++): ?>
    <li class="pagerlink"><?php echo link_to($x, $route.'&page='.$x ) ?></li>
    <?php endfor ?>
    <li>...</li>
    <?php for($x = $pager->getPage() - 3; $x < $pager->getPage(); $x++): ?>
    <li class="pagerlink"><?php echo link_to($x, $route.'&page='.$x ) ?></li>
    <?php endfor ?>

  <?php endif ?>

  <li class="page"><?php echo $pager->getPage() ?></li>

  <?php if($pager->getLastPage() - $pager->getPage() < 7) : ?>

    <?php for($x = $pager->getPage()+1; $x <= $pager->getLastPage(); $x++): ?>
    <li class="pagerlink"><?php echo link_to($x, $route.'&page='.$x ) ?></li>
    <?php endfor ?>
    
  <?php else: ?>

    <?php for($x = $pager->getPage()+1; $x < $pager->getPage() + 4; $x++): ?>
    <li class="pagerlink"><?php echo link_to($x, $route.'&page='.$x ) ?></li>
    <?php endfor ?>
    <li>...</li>
    <?php for($x = $pager->getLastPage() - 3; $x <= $pager->getLastPage(); $x++): ?>
    <li class="pagerlink"><?php echo link_to($x, $route.'&page='.$x ) ?></li>
    <?php endfor ?>

  <?php endif ?>

  <?php if($pager->getPage() < $pager->getLastPage()): ?>
  <li class="pagerlink"><?php echo link_to('Suivant', $route.'&page='.$pager->getNextPage() ) ?></li>
  <?php endif ?>
</ul>
<?php endif ?>
