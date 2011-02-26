<?php

/**
 * carte actions.
 *
 * @package    Annuaire
 * @subpackage carte
 * @author     Michael Muré
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class carteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->getProfile($request);
    $this->forward404Unless(!$this->user->isAncien());

    $this->membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->select('a.id, a.nom, a.prenom, a.poste, a.status')
      ->where('a.nom != ?', '')
      ->orderBy('a.nom')
      ->execute();
  }

  public function executeRecto(sfWebRequest $request)
  {
    $this->getProfile($request);
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->forward404Unless($this->membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    
    $this->setLayout(false);
    $response = $this->getResponse();
    $response->setContentType('image/svg+xml');
    $response->setHttpHeader('Content-Disposition', 'attachment;filename='.$this->membre->getUsername().'.recto.svg');
  }
  
  public function executeVerso(sfWebRequest $request)
  {
    $this->getProfile($request);
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->setLayout(false);
    $response = $this->getResponse();
    $response->setContentType('image/svg+xml');
    $response->setHttpHeader('Content-Disposition', 'attachment;filename=verso.svg');
  }
  
  protected function getProfile(sfWebRequest $request)
  {
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($this->user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->select('m.id, m.status')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());
  }
}
