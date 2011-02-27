<?php echo '<pre>Sur http://erp.iariss.fr/ , depuis 7 jours, soit entre
 le '.strftime('%e/%m/%Y', time() - 7*24*3600).' et le '.strftime('%e/%m/%Y').' :
- '.$contact_created.' appels ont été enregistrés,
- '.($contact_updated - $contact_created).' appels ont été mis à jour,
- '.$prospects_created.' prospects ont été enregistrés,
- '.($prospects_updated - $prospects_created).' prospects ont été mis à jour
</pre>';
?>
