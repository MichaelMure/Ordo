<div id="pager">
<?php
  $route = htmlspecialchars_decode($route);
  echo link_to('<<', $route.'&page='.$pager->getFirstPage() ).' | ';
  echo link_to('<', $route.'&page='.$pager->getPreviousPage() ).' | ';
  echo $pager->getPage().' | ';
  echo link_to('>', $route.'&page='.$pager->getNextPage() ).' | ';
  echo link_to('>>', $route.'&page='.$pager->getLastPage() );
?>
</div>
