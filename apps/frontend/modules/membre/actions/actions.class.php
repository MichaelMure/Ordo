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
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->select('m.status, m.id')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    $this->admin = ($user->getStatus() == 'Administrateur');
    $this->id = $user->getId();
    
    $this->membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->select('a.id, a.nom, a.prenom, a.poste, a.tel_mobile, a.email_interne, a.promo, a.filiere, a.status')
      ->orderBy('a.nom')
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

    $this->admin = ($user->getStatus() == 'Administrateur');

    $this->forward404Unless($this->admin || ($user == $this->membre));

    if($request->getParameter('valider'))
      $this->valider($request, $this->membre);
    if($request->getParameter('devalider'))
      $this->devalider($request, $this->membre);
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
      $this->admin = true;
      $this->titre = $membre->getPrenom().' '.$membre->getNom();
    }
    else
    {
      if($user->getId()==$request->getParameter('id'))
      {
        $this->form = new EditMembreForm($membre);
        $this->admin = false;
      }
      else
      {
        $this->forward404();
      }
    }
  }

  public function executeDocument(sfWebRequest $request)
  {
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->select('m.status')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if($user->getStatus() == 'Administrateur')
    {
      if($request->getParameter('valider'))
        $this->valider($request, $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id'))));
      if($request->getParameter('devalider'))
        $this->devalider($request, $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id'))));
    }

    $this->membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->where('a.status != ?', 'Ancien')
      ->select('a.id, a.nom, a.prenom, a.tel_mobile, a.carte_ID, a.just_domicile, a.quittance, a.cotisation')
      ->orderBy('a.nom')
      ->execute();
  }
  
  public function executeChangeMDP(sfWebRequest $request)
  {
    $this->form = new PasswordMembreForm();
  }
  
  public function executeUpdateMDP(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->select('m.passwd, m.id')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());
    
    if(sha1($request->getParameter('ancien_mdp')) == $user->getPasswd())
    {
      $user->setPasswd($request->getParameter('nouveau_mdp'));
      $user->save();
      $this->redirect('@annuaire?action=show&id='.$user->getId());
    }

    $this->error = 'L\'ancien mot de passe rentré ne correspond pas.';
    $this->form = new PasswordMembreForm();
    $this->setTemplate('changeMDP');
  }
  
  public function executeStatus(sfWebRequest $request)
  {
    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());
    $this->forward404Unless($user->getStatus()=='Administrateur');
    $this->forward404Unless($status = $request->getParameter('status'));
    
    $membre->setStatus($status);
    $membre->save();
    $this->redirect('membre/show?id='.$membre->getId());
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($user = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where('m.username = ?', array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if($user->getStatus()=='Administrateur')
    {
      $this->form = new AdminMembreForm($this->membre);
      $this->admin = true;
      $this->titre = $this->membre->getPrenom().' '.$this->membre->getNom();
    }
    else
    {
      if($user->getId()==$request->getParameter('id'))
      {
        $this->form = new EditMembreForm($this->membre);
        $this->admin = false;
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

      $this->redirect('@annuaire.index');
    }
  }

  protected function valider(sfWebRequest $request, Membre $membre)
  {
    $element = $request->getParameter('valider');
    switch($element)
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
      case 'RI':
        $membre->setReglementInterieur(true);
        break;
      case 'CE':
        $membre->setConventionEtudiant(true);
        break;
    }
    $membre->save();
  }

  protected function devalider(sfWebRequest $request, Membre $membre)
  {
    $element = $request->getParameter('devalider');
    switch($element)
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
      case 'RI':
        $membre->setReglementInterieur(false);
        break;
      case 'CE':
        $membre->setConventionEtudiant(false);
        break;
    }
    $membre->save();
  }
}
