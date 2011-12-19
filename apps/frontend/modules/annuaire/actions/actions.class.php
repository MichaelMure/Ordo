<?php

/**
 * membre actions.
 *
 * @package    Annuaire
 * @subpackage membre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class annuaireActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));

    $membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->select('a.id, a.nom, a.prenom, a.username, a.poste, a.tel_mobile, a.email_interne, a.promo, a.filiere, a.status');
    
    $filter = new FilterHelper($request);
    $filter->add('ancien', function() use($membres) {  $membres->orWhere('a.status = ?', 'Ancien');  });
    $filter->add('membre', function() use($membres) {  $membres->orWhere('a.status = ? OR a.status = ?', array('Membre', 'Administrateur'));  });
  $filter->execute();
    
    $this->membres = $membres->orderBy('a.status, a.nom')->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->membre);
    // Fiche privée ou semi privée ?
    //$this->forward404Unless($this->user->isAdmin() || ($this->user == $this->membre));
    $this->mesProjets = Doctrine_Core::getTable('Projet')
      ->createQuery('a')
      ->select('a.id, a.nom, a.numero, a.date_debut, a.date_cloture, l.id, m.id, l.jeh as jeh, l.role as role')
      ->leftJoin('a.LienMembreProjet as l')
      ->leftJoin('l.Membre as m')
      ->where('l.membre_id = ?', $request->getParameter('id'))
      ->orderBy('a.numero DESC')
      ->execute();
    
    if($this->user->isAdmin())
    {
      if($request->getParameter('valider'))
        $this->valider($request, $this->membre);
      if($request->getParameter('devalider'))
        $this->devalider($request, $this->membre);
    }
  }

  public function executeAjax(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');
    $request = Doctrine::getTable('Membre')->createQuery('m')
                  ->select('m.id, m.nom, m.prenom')
                  ->where('CONCAT(m.prenom, m.username) LIKE ?', array('%'.$request->getParameter('q').'%'))
                  ->andWhere('m.status != "Ancien"')
                  ->limit('10')
                  ->execute()
                  ->getData();

    $membres = array();
    foreach ( $request as $membre )
      $membres[$membre->id] = (string) $membre;

    return $this->renderText(json_encode($membres));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());

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
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));

    if($this->user->isAdmin())
    {
      $this->form = new AdminMembreForm($membre);
      $this->titre = $membre->getPrenom().' '.$membre->getNom();
    }
    else
    {
      if($this->user->getId()==$request->getParameter('id'))
      {
        $this->form = new EditMembreForm($membre);
      }
      else
      {
        $this->forward404();
      }
    }
  }

  public function executeDocument(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless(!$this->user->isAncien());

    $this->membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->select('a.id, a.nom, a.prenom, a.username, a.tel_mobile, a.carte_ID, a.just_domicile, a.reglement_interieur, a.convention_etudiant, a.status, c.annee, q.annee')
      ->where('a.status != ?', 'Ancien')
      ->leftJoin('a.Cotisations c')
      ->leftJoin('a.Quittances q')
      /* Désactivation temporaire
       * ->where('a.nom != ?', '') */
      ->orderBy('a.nom')
      ->execute();
  }

  public function executeChangeMDP(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->form = new PasswordMembreForm($this->user);
  }

  public function executeUpdateMDP(sfWebRequest $request)
  {
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));

    $this->form = new PasswordMembreForm($this->user);

    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

    if ($this->form->isValid())
    {
      $membre = $this->form->save();

      $this->redirect('@annuaire?action=show&id='.$membre->getId());
    }

    $this->setTemplate('changeMDP');
  }
  
  
  public function executeChangePhoto(sfWebRequest $request)
  {
  $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    
    if( $this->user->isAdmin() )
    $id = $request->getParameter('id');
  else
    $id = $this->user->getId();
  
  $this->forward404Unless($this->user = Doctrine_Core::getTable('Membre')->find(array($id)));
    $this->form = new PhotoMembreForm($this->user, null, false);
    //$this->form->getCSRFToken();
    
  }
  
  public function executeUpdatePhoto(sfWebRequest $request)
  {  
  $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    
  if( $this->user->isAdmin() )
    $id = $request->getParameter('id');
  else
    $id = $this->user->getId();
  
  $this->membre = Doctrine_Core::getTable('Membre')->find(array($id));
  $this->forward404Unless($this->membre, sprintf('Object membre does not exist (%s).', $id));
  
  $this->form = new PhotoMembreForm($this->membre, null, false);
    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

    if ($this->form->isValid())
    {
      $membre = $this->form->save();
      $this->redirect('@annuaire?action=show&id='.$membre->getId());
    }
        
    $this->setTemplate('changePhoto');
  }

  public function executeStatus(sfWebRequest $request)
  {
    $this->forward404Unless($membre = Doctrine_Core::getTable('Membre')->find(array($request->getParameter('id'))), sprintf('Object membre does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));
    $this->forward404Unless($this->user->isAdmin());
    $this->forward404Unless($status = $request->getParameter('status'));

    $membre->setStatus($status);
    $membre->save();
    $this->redirect('@annuaire?action=show&id='.$membre->getId());
  }

  public function executeUpdate(sfWebRequest $request)
  {
  $this->id = $request->getParameter('id');
    
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->membre = Doctrine_Core::getTable('Membre')->find(array($this->id)), sprintf('Object membre does not exist (%s).', $this->id));
    $this->forward404Unless($this->user = Membre::getProfile($_SERVER['PHP_AUTH_USER']));

    if($this->user->isAdmin())
    {
      $this->form = new AdminMembreForm($this->membre);
      $this->titre = $this->membre->getPrenom().' '.$this->membre->getNom();
    }
    else
    {
      if($this->user->getId()==$request->getParameter('id'))
      {
        $this->form = new EditMembreForm($this->membre);
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

    $this->redirect('@annuaire.index');
  }
  
  public function executeIndicateurs(sfWebRequest $request)
  {
    $this->cotisations = Doctrine_Core::getTable('Cotisation')
      ->createQuery('c')
      ->groupBy('c.membre_id')
      ->leftJoin('c.Membre m')
      ->execute();

    $this->annees = Doctrine_Core::getTable('Cotisation')
      ->createQuery('c')
      ->groupBy('c.annee')
      ->select('*, COUNT(*) AS nombre_cotisations')
      ->orderBy('c.annee')
      ->execute();
  }

  public function executeTrombi(sfWebRequest $request)
  {
    $membres = Doctrine_Core::getTable('Membre')
      ->createQuery('a')
      ->select('a.id, a.nom, a.prenom, a.username, a.poste, a.tel_mobile, a.email_interne, a.promo, a.filiere, a.status')
      ->Where('a.status = ? OR a.status = ?', array('Membre', 'Administrateur'));
    
    if( $request->getParameter('pole') )
    $membres->andWhere('a.poste LIKE ?', array('%' . $request->getParameter('pole') . '%'));
    
    if( $request->getParameter('promo') )
    $membres->andWhere('a.promo = ?', $request->getParameter('promo'));
    
    $this->membres = $membres->orderBy('SUBSTRING(a.email_interne, 2), a.nom')->execute();
  
    $oPoles = Doctrine_Core::getTable('Membre')
    ->createQuery('a')
    ->select('DISTINCT a.poste, a.promo')
    ->execute();
  
    // Gestion des "groupes"
    $aReturnPromos = array();
    $aReturnPoles  = array();
    foreach( $oPoles as $aPole )
    {
    if( !empty($aPole->poste) )
    {
      $sPole = ucfirst(str_replace('*', '', strpos($aPole->poste, ' ') !== False ? substr(strrchr($aPole->poste, ' '), 1) : $aPole->poste));
      $aReturnPoles[$sPole] = strtolower($sPole);
    }
    
    if( !empty($aPole->promo) )
      $aReturnPromos[$aPole->promo] = $aPole->promo;
    }
    $this->poles  = $aReturnPoles;
    $this->promos = $aReturnPromos;
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
        $membre->setCurrentQuittance(true);
        break;
      case 'Cotisation':
        $membre->setCurrentCotisation(true);
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
        $membre->setCurrentQuittance(false);
        break;
      case 'Cotisation':
        $membre->setCurrentCotisation(false);
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
