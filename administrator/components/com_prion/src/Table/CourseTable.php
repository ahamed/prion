<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_prion
 *
 * @copyright   (C) Sajeeb Ahamed, <dark07web@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Prion\Administrator\Table;

\defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

/**
 * Course Table class.
 *
 * @since  1.0.0
 */
class CourseTable extends Table
{
	/**
	 * Constructor
	 *
	 * @param   DatabaseDriver  $db  Database connector object
	 *
	 * @since   1.0.0
	 */
	public function __construct(DatabaseDriver $db)
	{
		parent::__construct('#__prion_courses', 'id', $db);
	}
}
