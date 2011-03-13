<?php

/**
 * projetevent actions.
 *
 * @package    Annuaire
 * @subpackage projetevent
 * @author     Michael Muré
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projeteventActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($request->getParameter('membre'));
    $this->forward404Unless($request->getParameter('projet'));
    $this->form = new ProjetEventForm();
    $this->form->setDefault('membre_id', $request->getParameter('membre'));
    $this->form->setDefault('projet_id', $request->getParameter('projet'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProjetEventForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($projet_event = Doctrine_Core::getTable('ProjetEvent')->find(array($request->getParameter('id'))), sprintf('Object projet_event does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjetEventForm($projet_event);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($projet_event = Doctrine_Core::getTable('ProjetEvent')->find(array($request->getParameter('id'))), sprintf('Object projet_event does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjetEventForm($projet_event);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($projet_event = Doctrine_Core::getTable('ProjetEvent')->find(array($request->getParameter('id'))), sprintf('Object projet_event does not exist (%s).', $request->getParameter('id')));
    $projet_event->delete();

    $this->redirect('projetevent/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $projet_event = $form->save();

      $this->redirect('@projet?action=show&id='.$projet_event->getProjetId());
    }
  }
}
