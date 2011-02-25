<?php
  if($user->isAdmin())
  {
    echo '<h1>'.$titre.'</h1>';
    include_partial('formAdmin', array('form' => $form));
  }
  else
  {
    echo '<h1>Ma fiche</h1>';
    include_partial('formMember', array('form' => $form));
  }
?>
