<?php

/**
 * contact actions.
 *
 * @package    Annuaire
 * @subpackage contact
 * @author     Michael Muré
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $query = Doctrine_Query::create()
      ->select('m.nom, m.prenom, m.id, m.username, t.nom, t.logo, c.date, c.commentaire, p.nom, p.a_rappeler')
      ->from('Contact c')
      ->leftJoin('c.TypeContact t')
      ->leftJoin('c.Membre m')
      ->leftJoin('c.Prospect p')
      ->orderBy('c.date DESC');

    $this->filter = 'index';

    switch($request->getParameter('filter'))
    {
      case 'email':
        $query->where('c.type_contact_id = ?', TypeContact::getEmailTypeId());
        $this->filter = 'email';
        break;

      case 'appel':
        $query->where('c.type_contact_id != ?', TypeContact::getEmailTypeId());
        $this->titre = 'appel';
        break;
    }

    $this->pager = new sfDoctrinePager('Contact', 15);
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->contact = Doctrine::getTable('Contact')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->contact);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $form = new ContactForm();
    if($prospect_id   = $request->getParameter('prospect_id'))   $form->setDefault('prospect_id', $prospect_id);
    switch($request->getParameter('type'))
    {
      case 'email':
        $form->setDefault('type_contact_id', TypeContact::getEmailTypeId());
        break;
      case 'appel':
        $form->setDefault('type_contact_id', TypeContact::getAppelTypeId());
        break;
    }

    $form->setDefault('membre_id', $this->user->getId());

    $this->form = $form;
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ContactForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->forward404Unless($contact = Doctrine::getTable('Contact')->find(array($request->getParameter('id'))), sprintf('Object appel does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContactForm($contact);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($contact = Doctrine::getTable('Contact')->find(array($request->getParameter('id'))), sprintf('Object contact does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContactForm($contact);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());
    
    $request->checkCSRFProtection();

    $this->forward404Unless($contact = Doctrine::getTable('Contact')->find(array($request->getParameter('id'))), sprintf('Object contact does not exist (%s).', $request->getParameter('id')));
    $contact->delete();

    $this->redirect('@contact');
  }
  public function executeAjax(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');
    $request = Doctrine::getTable('Prospect')->createQuery()
                  ->where('nom LIKE ?','%'.$request->getParameter('q').'%')
                  ->limit('10')
                  ->execute()
                  ->getData();
  
    $entreprises = array();
    foreach ( $request as $entreprise )
      $entreprises[$entreprise->id] = (string) $entreprise;
    
    return $this->renderText(json_encode($entreprises));
  }

  public function executeStats(sfWebRequest $request)
  {
    $query = Doctrine::getTable('Contact')
      ->createQuery('a')
      ->select('COUNT(a.id) AS count')
      ->addselect('MONTH(a.date) AS month, YEAR(a.date) AS year, DAY(a.date) AS day')
      ->addselect('WEEK(a.date) AS week')
      ->addselect('UNIX_TIMESTAMP(a.date) as unixtimestamp')
      ->groupby('year')
      ->orderBy('a.date DESC');

    $by = $request->getParameter('by');
    switch($by)
    {
      case 'month':
        $query->addgroupby('month');        
        break;
      case 'week':
        $query->addgroupby('week');
        break;
      case 'day':
        $query->addgroupby('month');
        $query->addgroupby('day');
        break;
      case 'year':
        break;
      default:
        $query->addgroupby('month');
        $query->addgroupby('day');
        break;
    }

    $limit = $request->getParameter('limit');
    if($limit > 0)
    {
      $query->limit($limit);
    }
    else
    {
      $query->limit(30);
    }
    
    $this->contacts = $query->execute();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $contact = $form->save();
      $prospect = $contact->getProspect();
      switch($form->getValue('a_recontacter'))
      {
        case 'Oui':
          $prospect->setARappeler(true);
          break;
        case 'Non':
          $prospect->setARappeler(false);
          break;
      }
      
      $prospect->setDateRecontact($form->getValue('date_recontact'));
      
      $prospect->save();

      $this->redirect('@prospect?action=show&id='.$contact->getProspectId());
    }
  }

  public function executeSummary(sfWebRequest $request)
  {
    $this->processSummaryQueries();
  }

  public function executeSummaryEmail(sfWebRequest $request)
  {
    $this->processSummaryQueries();

      $message = Swift_Message::newInstance()
        //Give the message a subject
        ->setSubject('Résumé des appels passés cette semaine')
        //Set the From address with an associative array
        ->setFrom(array('presidence@iariss.fr' => 'Présidence IARISS'))
        //Set the To addresses with an associative array
        ->setTo(array('presidence@iariss.fr' => 'Présidence IARISS'))
        ->setBody('
        Sur http://appel.iariss.fr/ , depuis 7 jours, soit entre
 le '.strftime('%e/%m/%Y', time() - 7*24*3600).' et le '.strftime('%e/%m/%Y').' :
- '.$this->appels_created.' appels ont été enregistrés,
- '.($this->appels_updated - $this->appels_created).' appels ont été mis à jour,
- '.$this->prospects_created.' prospects ont été enregistrés,
- '.($this->prospects_updated - $this->prospects_created).' prospects ont été mis à jour
'
      );
      $this->getMailer()->send($message);

    $this->setTemplate('index');
  }

  protected function processSummaryQueries()
  {
    $this->contact_updated = Doctrine::getTable('Contact')
      ->createQuery('c')
      ->where('TO_DAYS(NOW()) - TO_DAYS(c.updated_at) <= 7')
      ->execute()->count();

    $this->contact_created = Doctrine::getTable('Contact')
      ->createQuery('c')
      ->where('TO_DAYS(NOW()) - TO_DAYS(c.created_at) <= 7')
      ->execute()->count();

    $this->prospects_updated = Doctrine::getTable('Prospect')
      ->createQuery('p')
      ->where('TO_DAYS(NOW()) - TO_DAYS(p.updated_at) <= 7')
      ->execute()->count();

    $this->prospects_created = Doctrine::getTable('Prospect')
      ->createQuery('p')
      ->where('TO_DAYS(NOW()) - TO_DAYS(p.created_at) <= 7')
      ->execute()->count();
  }
}
