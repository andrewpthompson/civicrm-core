<?php
/*
  +--------------------------------------------------------------------+
  | CiviCRM version 5                                                  |
  +--------------------------------------------------------------------+
  | Copyright CiviCRM LLC (c) 2004-2019                                |
  +--------------------------------------------------------------------+
  | This file is a part of CiviCRM.                                    |
  |                                                                    |
  | CiviCRM is free software; you can copy, modify, and distribute it  |
  | under the terms of the GNU Affero General Public License           |
  | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
  |                                                                    |
  | CiviCRM is distributed in the hope that it will be useful, but     |
  | WITHOUT ANY WARRANTY; without even the implied warranty of         |
  | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
  | See the GNU Affero General Public License for more details.        |
  |                                                                    |
  | You should have received a copy of the GNU Affero General Public   |
  | License and the CiviCRM Licensing Exception along                  |
  | with this program; if not, contact CiviCRM LLC                     |
  | at info[AT]civicrm[DOT]org. If you have questions about the        |
  | GNU Affero General Public License or the licensing of CiviCRM,     |
  | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
  +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2019
 */
trait CRM_Core_Page_EntityPageTrait {

  /**
   * Pages MUST declare the following functions:
   * public function getDefaultEntity() {
   */

  /**
   * Page MAY want to override the following functions:
   * public function getDefaultContext()
   */

  /**
   * The id of the contact.
   *
   * @var int
   */
  protected $_id;

  /**
   * The mode of operation for this page
   *
   * @var int
   */
  protected $_action;

  /**
   * The context that we are working on.
   *
   * @var string
   */
  protected $_context;

  /**
   * Contact ID of the contact on the page.
   *
   * @var int
   */
  public $_contactID = NULL;

  /**
   * Contact ID of the contact on the page.
   *
   * @var int
   * @deprecated Historically pages alternate between $_contactID and $_contactId. We'll standardise on one
   */
  public $_contactId = NULL;

  /**
   * @var int
   */
  public $_permission = NULL;

  /**
   * The action links that we need to display for the browse screen.
   *
   * @var array
   */
  public static $_links = NULL;

  /**
   * Get the entity id being edited.
   *
   * @return int|null
   */
  public function getEntityId() {
    return $this->_id;
  }

  /**
   * Get the context we are working in
   *
   * @return string
   */
  public function getContext() {
    return $this->_context;
  }

  /**
   * Get the contact ID
   *
   * @return int
   */
  public function getContactId() {
    return $this->_contactID;
  }

  /**
   * Set the contact ID
   *
   * @param $contactId
   */
  public function setContactId($contactId) {
    $this->_contactID = $contactId;
    $this->_contactId = $contactId;
  }

  public function getAction() {
    return $this->_action;
  }

  /**
   * Explicitly declare the form context.
   *
   * @return string|null
   */
  public function getDefaultContext() {
    return NULL;
  }

  public function preProcessQuickEntityPage() {
    $this->_action = CRM_Utils_Request::retrieve('action', 'String', $this, FALSE, 'browse');
    $this->assign('action', $this->getAction());

    $this->_id = CRM_Utils_Request::retrieve('id', 'Positive', $this);
    $this->setContactId(CRM_Utils_Request::retrieve('cid', 'Positive', $this, FALSE, CRM_Core_Session::getLoggedInContactID()));

    $this->assign('contactId', $this->getContactId());

    $this->_context = CRM_Utils_Request::retrieve('context', 'Alphanumeric', $this, FALSE, $this->getDefaultContext());
    $this->assign('context', $this->_context);

    // check logged in url permission
    CRM_Contact_Page_View::checkUserPermission($this);

    $this->assign('entityInClassFormat', strtolower(str_replace('_', '-', $this->getDefaultEntity())));
  }

  /**
   * Is the form being used in the context of a deletion.
   *
   * (For some reason rather than having separate forms Civi overloads one form).
   *
   * @return bool
   */
  protected function isDeleteContext() {
    return ($this->getAction() & CRM_Core_Action::DELETE);
  }

  /**
   * Is the form being used in the context of a view.
   *
   * @return bool
   */
  protected function isViewContext() {
    return ($this->getAction() & CRM_Core_Action::VIEW);
  }

  /**
   * Is the form being used in the context of a edit.
   *
   * @return bool
   */
  protected function isEditContext() {
    return ($this->getAction() & (CRM_Core_Action::UPDATE | CRM_Core_Action::ADD));
  }

}
