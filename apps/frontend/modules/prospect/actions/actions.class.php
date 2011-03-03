<?php

/**
 * prospect actions.
 *
 * @package    appel
 * @subpackage prospect
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class prospectActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
  
    $query = Doctrine_Query::create()
      ->select('p.nom, p.contact, p.ville, p.tel_fixe, p.site_web, p.a_rappeler, p.date_recontact')
      ->from('Prospect p')
      ->orderBy('p.updated_at DESC');

    $this->filter = 'index';

    switch($request->getParameter('filter'))
    {
      case 'my':
        $filter = 'my';
        $query->leftJoin('Contact c')
              ->leftJoin('Membre m')
              ->where('m.id = ?', array($this->user->getId()))
              ->groupBy('p.nom');
        break;

      case 'recontact':
        $filter = 'recontact';
        $query->where('p.a_rappeler = 1');
        break;
    }
    
    $this->pager = new sfDoctrinePager('Prospect', 25);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->setQuery($query);
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->prospect = Doctrine::getTable('Prospect')->find(array($request->getParameter('id')));
    $this->contacts = Doctrine_Query::create()
                      ->select('p.id, p.nom, p.a_rappeler, c.date, c.commentaire, m.nom, m.prenom, m.username, t.logo')
                      ->from('Contact c')
                      ->leftJoin('c.Prospect p')
                      ->leftJoin('c.Membre m')
                      ->leftJoin('c.TypeContact t')
                      ->where('p.id = ?', array($this->prospect->getId()))
                      ->execute();

    $this->forward404Unless($this->prospect);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->form = new ProspectForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProspectForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->forward404Unless($prospect = Doctrine::getTable('Prospect')->find(array($request->getParameter('id'))), sprintf('Object prospect does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProspectForm($prospect);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($prospect = Doctrine::getTable('Prospect')->find(array($request->getParameter('id'))), sprintf('Object prospect does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProspectForm($prospect);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $request->checkCSRFProtection();

    $this->forward404Unless($prospect = Doctrine::getTable('Prospect')->find(array($request->getParameter('id'))), sprintf('Object prospect does not exist (%s).', $request->getParameter('id')));
    $prospect->delete();

    $this->redirect('prospect/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $prospect = $form->save();

      $this->redirect('@prospect?action=show&id='.$prospect->getId());
    }
  }
}
