<?php

/**
 * projet actions.
 *
 * @package    Annuaire
 * @subpackage projet
 * @author     Michael Muré
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projetActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->projets = Doctrine_Core::getTable('Projet')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->projet = Doctrine_Core::getTable('Projet')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->projet);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProjetForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProjetForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($projet = Doctrine_Core::getTable('Projet')->find(array($request->getParameter('id'))), sprintf('Object projet does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjetForm($projet);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($projet = Doctrine_Core::getTable('Projet')->find(array($request->getParameter('id'))), sprintf('Object projet does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjetForm($projet);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($projet = Doctrine_Core::getTable('Projet')->find(array($request->getParameter('id'))), sprintf('Object projet does not exist (%s).', $request->getParameter('id')));
    $projet->delete();

    $this->redirect('projet/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $projet = $form->save();

      $this->redirect('projet/edit?id='.$projet->getId());
    }
  }
}
