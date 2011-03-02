<div id="pager">
<?php
  echo link_to($pager->getFirstPage(), $route.'&page='.$pager->getFirstPage() ).' | ';
  echo link_to('Précédent', $route.'&page='.$pager->getPreviousPage() ).' | ';
  echo $pager->getPage().' | ';
  echo link_to('Suivant', $route.'&page='.$pager->getNextPage() ).' | ';
  echo link_to($pager->getLastPage(), $route.'&page='.$pager->getLastPage() );
?>
</div>
