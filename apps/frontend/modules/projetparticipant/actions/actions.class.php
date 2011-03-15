<?php

/**
 * projetparticipant actions.
 *
 * @package    Annuaire
 * @subpackage projetparticipant
 * @author     Michael Muré
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projetparticipantActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->lien_membre_projets = Doctrine_Core::getTable('LienMembreProjet')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($request->getParameter('projet'));
    $this->form = new LienMembreProjetForm();
    $this->form->setDefault('projet_id', $request->getParameter('projet'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LienMembreProjetForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($lien_membre_projet = Doctrine_Core::getTable('LienMembreProjet')->find(array($request->getParameter('id'))), sprintf('Object lien_membre_projet does not exist (%s).', $request->getParameter('id')));
    $this->form = new LienMembreProjetForm($lien_membre_projet);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($lien_membre_projet = Doctrine_Core::getTable('LienMembreProjet')->find(array($request->getParameter('id'))), sprintf('Object lien_membre_projet does not exist (%s).', $request->getParameter('id')));
    $this->form = new LienMembreProjetForm($lien_membre_projet);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($lien_membre_projet = Doctrine_Core::getTable('LienMembreProjet')->find(array($request->getParameter('id'))), sprintf('Object lien_membre_projet does not exist (%s).', $request->getParameter('id')));
    $lien_membre_projet->delete();

    $this->redirect('projetparticipant/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $lien_membre_projet = $form->save();

      $this->redirect('@projet?action=show&id='.$lien_membre_projet->getProjetId());
    }
  }
}
