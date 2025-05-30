<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 3.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PDO IBM DB2 Forge Class
 *
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/database/
 */
class CI_DB_pdo_ibm_forge extends CI_DB_pdo_forge {

	/**
	 * RENAME TABLE IF statement
	 *
	 * @var	string
	 */
	protected $_rename_table	= 'RENAME TABLE %s TO %s';

	/**
	 * UNSIGNED support
	 *
	 * @var	array
	 */
	protected $_unsigned		= array(
		'SMALLINT'	=> 'INTEGER',
		'INT'		=> 'BIGINT',
		'INTEGER'	=> 'BIGINT'
	);

	/**
	 * DEFAULT value representation in CREATE/ALTER TABLE statements
	 *
	 * @var	string
	 */
	protected $_default		= FALSE;

	// --------------------------------------------------------------------

	/**
	 * ALTER TABLE
	 *
	 * @param	string	$alter_type	ALTER type
	 * @param	string	$table		Table name
	 * @param	mixed	$field		Column definition
	 * @return	string|string[]
	 */
	protected function _alter_table($alter_type, $table, $field)
	{
		if ($alter_type === 'CHANGE')
		{
			$alter_type = 'MODIFY';
		}

		return parent::_alter_table($alter_type, $table, $field);
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute TYPE
	 *
	 * Performs a data type mapping between different databases.
	 *
	 * @param	array	&$attributes
	 * @return	void
	 */
	protected function _attr_type(&$attributes)
	{
		switch (strtoupper($attributes['TYPE']))
		{
			case 'TINYINT':
				$attributes['TYPE'] = 'SMALLINT';
				$attributes['UNSIGNED'] = FALSE;
				return;
			case 'MEDIUMINT':
				$attributes['TYPE'] = 'INTEGER';
				$attributes['UNSIGNED'] = FALSE;
				return;
			default: return;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute UNIQUE
	 *
	 * @param	array	&$attributes
	 * @param	array	&$field
	 * @return	void
	 */
	protected function _attr_unique(&$attributes, &$field)
	{
		if ( ! empty($attributes['UNIQUE']) && $attributes['UNIQUE'] === TRUE)
		{
			$field['unique'] = ' UNIQUE';

			// UNIQUE must be used with NOT NULL
			$field['null'] = ' NOT NULL';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute AUTO_INCREMENT
	 *
	 * @param	array	&$attributes
	 * @param	array	&$field
	 * @return	void
	 */
	protected function _attr_auto_increment(&$attributes, &$field)
	{
		// Not supported
	}

}
                         INDX( 	 |�Yk            (   �  �          �                    h V     �    �CD{i� � l-�O�DD{i����i�h�       �              
 1 - a p e x . p n g g     h X     �    ��BD{i� � l-�O�DD{i����i�h�                       2 - s t a c k . p n g     p Z     �    � CD{i� � l-�O�DD{i����i�h�       l               3 - c o n v e x . p n g V     '    x d     �    /	HD{i� � l-���ID{i� [pj�h�       	               4 - m a t e r i a l i z e . p n g     !    h R     �    T�DD{i� � l-��FD{i����i�h� p      mf               a p e x . j p g         ` P     �    mSAD{i� � l-�ϲBD{i����i�h� 0      �%               f a q . p n g "    p `     �    e�DD{i� � l-�mGD{i� [pj�h� p      �`               m a t e r i a l i z e . j p g %    � j     �    �[FD{i� � l-�/	HD{i� [pj�h�       �               m o d e r n - t h u m b n a i l . p n g         h V     �    Z,AD{i� � l-�ϲBD{i����i�h� p      �g             
 m o d e r n . j p g       p \     �    �BD{i� � l-��CD{i����i�h� `      �S               p i x i n v e n t . j p g          x f     �    O�DD{i� � l-���ED{i����i�h�       
               s i g n a t u r e - s c a n . p n g   $    h T     �    �4FD{i� � l-�+�GD{i� [pj�h� `      <Y              	 s t a c k . j p g . p #    p \     �    o#ED{i� � l-�mGD{i� [pj�h�       �               t h u m b n a i l . p n g     &    x b     �    +�GD{i� � l- �KD{i� [pj�h� �      ��               v u e x y - b a n n e r . j p g          h T     �    ��AD{i� � l-��CD{i����i�h� `      9^              	 v u e x y . j p g                                                                           