 <?php defined('_JEXEC') or die('Restricted access'); ?>
##codestart##
/**
* @version		$Id: default_modelfrontend.php 136 2013-09-24 14:49:14Z michel $
* @package		##Component##
* @subpackage 	Models
* @copyright	Copyright (C) ##year##, . All rights reserved.
* @license 		##license##
*/
 defined('_JEXEC') or die('Restricted access');


jimport('joomla.application.component.modelitem');
jimport('joomla.application.component.helper');

JTable::addIncludePath(JPATH_ROOT.'/administrator/components/com_##component##/tables');
/**
 * ##Component##Model##Name##
 * @author $Author$
 */
 
 
class ##Component##Model##Name##  extends JModelItem { 

	
	
	protected $context = 'com_##component##.##name##';   
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	public function populateState()
	{
		$app = JFactory::getApplication();

		$params	= $app->getParams();

		// Load the object state.
		$id	= JFactory::getApplication()->input->getInt('##primary##', null);
		$this->setState('##name##.##primary##', $id);

		// Load the parameters.
		
		$this->setState('params', $params);
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('##name##.##primary##');

		return parent::getStoreId($id);
	}
	
	/**
	 * Method to get an ojbect.
	 *
	 * @param	integer	The id of the object to get.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function &getItem($id = null)
	{
		if ($this->_item === null) {
			
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('##name##.##primary##');
			}

			// Get a level row instance.
			$table = JTable::getInstance('##Name##', 'Table');


			// Attempt to load the row.
			if ($table->load($id)) {
				
				// Check published state.
				if ($published = $this->getState('filter.published')) {
					
					if ($table->state != $published) {
						return $this->_item;
					}
				}

				// Convert the JTable to a clean JObject.
				$this->_item = JArrayHelper::toObject($table->getProperties(1), 'JObject');
				
			} else if ($error = $table->getError()) {
				
				$this->setError($error);
			}
		}
##ifdefFieldparamsStart##		
		// Convert parameter fields to objects.
		$registry = new JRegistry;
		$registry->loadString($this->_item->params);
		$this->_item->params = clone $this->getState('params');
		$this->_item->params->merge($registry);
##ifdefFieldparamsEnd##
##ifnotdefFieldparamsStart##
		$this->_item->params = clone $this->getState('params');
##ifnotdefFieldparamsEnd##

		return $this->_item;
	}
		
}
##codeend##