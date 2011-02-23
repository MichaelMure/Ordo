<?php

/**
 * membre actions.
 *
 * @package    Annuaire
 * @subpackage membre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membreActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->select('a.id, a.nom, a.prenom, a.poste, a.tel_mobile, a.email_interne, a.promo, a.filiere, a.status')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->membre);
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if(isset($request->getParameter('valider')))
      this->valider($request, $this->membre);
    if(isset($request->getParameter('devalider')))
      this->devalider($request, $this->membre);
    
    $this->admin = ($user->getStatus() == 'Administrateur');
    $this->allow_edit = ($user == $this->membre);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NewMembreForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewMembreForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if($user->getStatus()=='Administrateur')
    {
      $this->form = new AdminMembreForm($membre);
    }
    else
    {
      if($user->getId()==$request->getParameter('id'))
      {
        $this->form = new UserMembreForm($membre);
      }
      else
      {
        $this->forward404();
      }
    }
  }

  public function executeDocument(sfWebRequest $request)
  {
    if(isset($request->getParameter('valider')))
      this->valider($request, $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id'))));
    if(isset($request->getParameter('devalider')))
      this->devalider($request, $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id'))));
      
    $this->membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->where('a.status != ?', 'Ancien')
      ->select('a.id, a.nom, a.prenom, a.tel_mobile, a.carte_ID, a.just_domicile, a.quittance, a.cotisation')
      ->execute();
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if($user->getStatus()=='Administrateur')
    {
      $this->form = new AdminMembreForm($membre);
    }
    else
    {
      if($user->getId()==$request->getParameter('id'))
      {
        $this->form = new UserMembreForm($membre);
      }
      else
      {
        $this->forward404();
      }
    }
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $membre->delete();

    $this->redirect('membre/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $membre = $form->save();

      $this->redirect('membre/edit?id='.$membre->getId());
    }
  }

  protected function valider(sfWebRequest $request, Membre $membre)
  {
    switch($request->getParameter('valider'))
    {
      case 'CarteID':
        $membre->setCarteID(true);
        break;
      case 'JustDomicile':
        $membre->setJustDomicile(true);
        break;
      case 'Quittance':
        $membre->setQuittance(true);
        break;
      case 'Cotisation':
        $membre->setCotisation(true);
        break;
    }
    $membre->save();
  }

  protected function devalider(sfWebRequest $request, Membre $membre)
  {
    switch($request->getParameter('devalider'))
    {
      case 'CarteID':
        $membre->setCarteID(false);
        break;
      case 'JustDomicile':
        $membre->setJustDomicile(false);
        break;
      case 'Quittance':
        $membre->setQuittance(false);
        break;
      case 'Cotisation':
        $membre->setCotisation(false);
        break;
    }
    $membre->save();
  }
}
