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
    $this->prospects = Doctrine::getTable('Prospect')
      ->createQuery('p')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->prospect = Doctrine::getTable('Prospect')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->prospect);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProspectForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProspectForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
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
