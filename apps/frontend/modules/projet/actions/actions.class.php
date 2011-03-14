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
      ->select('a.id, a.nom, a.numero, a.date_debut, a.date_cloture, p.nom, p.id, m.id, m.nom, m.prenom, m.username')
      ->leftJoin('a.Prospect p')
      ->leftJoin('a.Membre m')
      ->where('a.deleted_at IS NULL')
      ->orderBy('a.numero')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->projet = Doctrine_Core::getTable('Projet')
      ->createQuery('a')
      ->select('a.id, a.nom, a.numero, a.budget, a.commentaire, a.date_debut, a.date_cloture, p.nom, p.id, m.id, m.nom, m.prenom, m.username')
      ->leftJoin('a.Prospect p')
      ->leftJoin('a.Membre m')
      ->where('a.id = ?', array($request->getParameter('id')))
      ->execute()->getFirst();
    
    $this->participants = Projet::getAllParticipants($request->getParameter('id'));
    
    $this->forward404Unless($this->projet);
    $this->events = Doctrine_Core::getTable('ProjetEvent')
      ->createQuery('e')
      ->select('e.commentaire, e.updated_at, t.abreviation, t.description, m.id, m.nom, m.prenom, m.username')
      ->leftJoin('e.ProjetEventType t')
      ->leftJoin('e.Membre m')
      ->where('e.projet_id = ?', array($request->getParameter('id')))
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NewProjetForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewProjetForm();

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

    $this->redirect('@projet.index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $projet = $form->save();

      $this->redirect('@projet?action=show&id='.$projet->getId());
    }
  }
}
