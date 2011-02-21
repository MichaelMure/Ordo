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
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->membre);
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
    $this->forward404Unless($membre = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where("m.login = ?", array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if($membre->getStatus()=='Administrateur')
    {
      $this->form = new AdminMembreForm($membre);
    }
    else
    {
      if($membre->getId()==$request->getParameter('id'))
      {
        $this->form = new UserMembreForm($membre);
      }
      else
      {
        $this->forward404();
      }
    }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless(isset($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($membre = Doctrine::getTable('Membre')
      ->createQuery('m')
      ->where("m.login = ?", array($_SERVER['PHP_AUTH_USER']))
      ->execute()->getFirst());

    if($membre->getStatus()=='Administrateur')
    {
      $this->form = new AdminMembreForm($membre);
    }
    else
    {
      if($membre->getId()==$request->getParameter('id'))
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
}
