<?php
/**
* @version      3.3.0 12.12.2011
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');

class JshoppingControllerFreeAttributes extends JControllerLegacy{
    
    function __construct( $config = array() ){
        parent::__construct( $config );

        $this->registerTask( 'add',   'edit' );
        $this->registerTask( 'apply', 'save' );
        checkAccessController("freeattributes");
        addSubmenu("other");
    }

    function display($cachable = false, $urlparams = false){
        $mainframe = JFactory::getApplication();
        $context = "jshoping.list.admin.freeattributes";
        $filter_order = $mainframe->getUserStateFromRequest($context.'filter_order', 'filter_order', "ordering", 'cmd');
        $filter_order_Dir = $mainframe->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', "asc", 'cmd');
        
    	$freeattributes = $this->getModel("freeattribut");    	
        $rows = $freeattributes->getAll($filter_order, $filter_order_Dir);
        $view=$this->getView("freeattributes", 'html');
        $view->setLayout("list");
        $view->assign('rows', $rows);
        $view->assign('filter_order', $filter_order);
        $view->assign('filter_order_Dir', $filter_order_Dir);
		JPluginHelper::importPlugin('jshoppingadmin');
        $dispatcher = JDispatcher::getInstance();
        $dispatcher->trigger('onBeforeDisplayFreeAttributes', array(&$view));
        $view->displayList();
    }
	
    function edit() {
        $jshopConfig = JSFactory::getConfig();
        $db = JFactory::getDBO();
        $id = JRequest::getInt("id");
	
        $attribut = JTable::getInstance('freeattribut', 'jshop');
        $attribut->load($id);
    
        $_lang = $this->getModel("languages");
        $languages = $_lang->getAllLanguages(1);
        $multilang = count($languages)>1;
        
        JFilterOutput::objectHTMLSafe($attribut, ENT_QUOTES);		

        $view = $this->getView("freeattributes", 'html');
        $view->setLayout("edit");
        $view->assign('attribut', $attribut);
        $view->assign('languages', $languages);
        $view->assign('multilang', $multilang);
        $view->assign('etemplatevar', '');
        JPluginHelper::importPlugin('jshoppingadmin');
        $dispatcher = JDispatcher::getInstance();
        $dispatcher->trigger( 'onBeforeEditFreeAtribut', array(&$view, &$attribut) );
        $view->displayEdit();
		
	}
	
	function save() {
        $db = JFactory::getDBO(); 
		$id = JRequest::getInt('id');
        
        $attribut = JTable::getInstance('freeattribut', 'jshop');    
        $post = JRequest::get("post");
        if (!isset($post['required']) || !$post['required']) $post['required'] = 0;
        
        JPluginHelper::importPlugin('jshoppingadmin');
        $dispatcher = JDispatcher::getInstance();
        $dispatcher->trigger( 'onBeforeSaveFreeAtribut', array(&$post) );
        
        if (!$id){
            $attribut->ordering = null;
            $attribut->ordering = $attribut->getNextOrder();            
        }
        
        if (!$attribut->bind($post)) {
            JError::raiseWarning("",_JSHOP_ERROR_BIND);
            $this->setRedirect("index.php?option=com_jshopping&controller=freeattributes");
            return 0;
        }

        if (!$attribut->store()) {
            JError::raiseWarning("",_JSHOP_ERROR_SAVE_DATABASE);
            $this->setRedirect("index.php?option=com_jshopping&controller=freeattributes");
            return 0;
        }
        
        $dispatcher->trigger( 'onAfterSaveFreeAtribut', array(&$attribut) );
        
		if ($this->getTask()=='apply'){
            $this->setRedirect("index.php?option=com_jshopping&controller=freeattributes&task=edit&id=".$attribut->id);
        }else{
            $this->setRedirect("index.php?option=com_jshopping&controller=freeattributes");
        }        
	}
	
	function remove(){
		$cid = JRequest::getVar("cid");
        $jshopConfig = JSFactory::getConfig();
		$db = JFactory::getDBO();
		$text = '';
        JPluginHelper::importPlugin('jshoppingadmin');
        $dispatcher = JDispatcher::getInstance();
        $dispatcher->trigger( 'onBeforeRemoveFreeAtribut', array(&$cid) );
		foreach ($cid as $key => $value) {
            $value = intval($value);
			$query = "DELETE FROM `#__jshopping_free_attr` WHERE `id` = '".$db->escape($value)."'";
			$db->setQuery($query);
			$db->query();
            
            $query = "delete from `#__jshopping_products_free_attr` where `attr_id` = '".$db->escape($value)."'";
            $db->setQuery($query);
            $db->query();
		}
        $dispatcher->trigger( 'onAfterRemoveFreeAtribut', array(&$cid) );
        
		$this->setRedirect("index.php?option=com_jshopping&controller=freeattributes", _JSHOP_ATTRIBUT_DELETED);
	}
	
	function order(){
		$id = JRequest::getInt("id");
        $move = JRequest::getInt("move");        
        $obj = JTable::getInstance('freeattribut', 'jshop');
        $obj->load($id);
        $obj->move($move);
        $this->setRedirect("index.php?option=com_jshopping&controller=freeattributes");
	}
    
    function saveorder(){
        $cid = JRequest::getVar('cid', array(), 'post', 'array');
        $order = JRequest::getVar('order', array(), 'post', 'array');

        foreach($cid as $k=>$id){
            $table = JTable::getInstance('freeattribut', 'jshop');
            $table->load($id);
            if ($table->ordering!=$order[$k]){
                $table->ordering = $order[$k];
                $table->store();
            }
        }
        
        $table = JTable::getInstance('freeattribut', 'jshop');
        $table->ordering = null;
        $table->reorder();
                
        $this->setRedirect("index.php?option=com_jshopping&controller=freeattributes");
    }
      
}
?>