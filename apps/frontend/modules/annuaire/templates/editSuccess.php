<article>
<?php
  if($user->isAdmin())
  {
    echo '<header><h1>'.$titre.'</h1></header>';
    include_partial('formAdmin', array('form' => $form));
  }
  else
  {
    echo '<header><h1>Ma fiche</h1></header>';
    include_partial('formMember', array('form' => $form));
  }
?>
</article>
