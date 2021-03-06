<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2019
 *
 * Generated from xml/schema/CRM/Core/Setting.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:9fa60718e4fb92cc6b3e7f9563671b00)
 */

/**
 * Database access object for the Setting entity.
 */
class CRM_Core_DAO_Setting extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_setting';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * @var int
   */
  public $id;

  /**
   * Unique name for setting
   *
   * @var string
   */
  public $name;

  /**
   * data associated with this group / name combo
   *
   * @var text
   */
  public $value;

  /**
   * Which Domain is this menu item for
   *
   * @var int
   */
  public $domain_id;

  /**
   * FK to Contact ID if the setting is localized to a contact
   *
   * @var int
   */
  public $contact_id;

  /**
   * Is this setting a contact specific or site wide setting?
   *
   * @var bool
   */
  public $is_domain;

  /**
   * Component that this menu item belongs to
   *
   * @var int
   */
  public $component_id;

  /**
   * When was the setting created
   *
   * @var datetime
   */
  public $created_date;

  /**
   * FK to civicrm_contact, who created this setting
   *
   * @var int
   */
  public $created_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_setting';
    parent::__construct();
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'domain_id', 'civicrm_domain', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contact_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'component_id', 'civicrm_component', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'created_id', 'civicrm_contact', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Setting ID'),
          'required' => TRUE,
          'where' => 'civicrm_setting.id',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Setting Name'),
          'description' => ts('Unique name for setting'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_setting.name',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
        ],
        'value' => [
          'name' => 'value',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Value'),
          'description' => ts('data associated with this group / name combo'),
          'where' => 'civicrm_setting.value',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_PHP,
        ],
        'domain_id' => [
          'name' => 'domain_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Setting Domain'),
          'description' => ts('Which Domain is this menu item for'),
          'required' => TRUE,
          'where' => 'civicrm_setting.domain_id',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Domain',
          'pseudoconstant' => [
            'table' => 'civicrm_domain',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Setting Contact'),
          'description' => ts('FK to Contact ID if the setting is localized to a contact'),
          'where' => 'civicrm_setting.contact_id',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'is_domain' => [
          'name' => 'is_domain',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Domain Setting?'),
          'description' => ts('Is this setting a contact specific or site wide setting?'),
          'where' => 'civicrm_setting.is_domain',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
        ],
        'component_id' => [
          'name' => 'component_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Setting Component'),
          'description' => ts('Component that this menu item belongs to'),
          'where' => 'civicrm_setting.component_id',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Component',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_component',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
        ],
        'created_date' => [
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Setting Created Date'),
          'description' => ts('When was the setting created'),
          'where' => 'civicrm_setting.created_date',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
        ],
        'created_id' => [
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Setting Created By'),
          'description' => ts('FK to civicrm_contact, who created this setting'),
          'where' => 'civicrm_setting.created_id',
          'table_name' => 'civicrm_setting',
          'entity' => 'Setting',
          'bao' => 'CRM_Core_BAO_Setting',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'setting', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'setting', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [
      'index_domain_contact_name' => [
        'name' => 'index_domain_contact_name',
        'field' => [
          0 => 'domain_id',
          1 => 'contact_id',
          2 => 'name',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_setting::1::domain_id::contact_id::name',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
