<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */



$table = 'product';
$o = 1;


$default_td[$table]['td_displayfield']     = 'name';
$default_td[$table]['td_rolloverfield']    = '';
$default_td[$table]['td_orderbyfields']    = 'name';
$default_td[$table]['td_topsubmit']        = 'yes';
$default_td[$table]['td_deleteoption']     = 'yes';
$default_td[$table]['td_menutype']         = 'list';
$default_td[$table]['td_categoryfield']    = '';
$default_td[$table]['td_categorytable']    = '';
$default_td[$table]['td_help']             = '';


/* status */
$field = 'status';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'Page Status';
$default_fd[$table][$field]['fd_type']     = 'radio';
$default_fd[$table][$field]['fd_options']  = "active:Active\ninactive:Inactive";
$default_fd[$table][$field]['fd_default']  = 'active';
$default_fd[$table][$field]['fd_help']     = 'Inactive pages will not show on the shopping car lists';

/* PRODUCT ID */
$field = 'productid';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'readonly';
$default_fd[$table][$field]['fd_help']     = 'A unique ID, automatically assigned by the system';

/* Name */
$field = 'name';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size']     = '50';
$default_fd[$table][$field]['fd_help']     = '';

/* Desciption */
$field = 'description';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'textarea';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_help']     = '';
$default_fd[$table][$field]['fd_rows']     = '6';
$default_fd[$table][$field]['fd_cols']     = '50';

/* Image */
$field = 'image';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'fileupload';
$default_fd[$table][$field]['fd_mode']     = 'standard';
$default_fd[$table][$field]['fd_tabname']  = '';

/* Price */
$field = 'price';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'decimal';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size']     = '20';
$default_fd[$table][$field]['fd_help']     = '';

/* Currency */
$field = 'currency';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_size']     = '50';
$default_fd[$table][$field]['fd_help']     = '';

/* Code */
$field = 'code';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_size']     = '20';
$default_fd[$table][$field]['fd_help']     = '';

/* Quantity fixed */
$field = 'quantity_fixed';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'Fixed quantities';
$default_fd[$table][$field]['fd_type']     = 'checkbox';
$default_fd[$table][$field]['fd_options']  = "yes\nno";
$default_fd[$table][$field]['fd_default']  = 'no';
$default_fd[$table][$field]['fd_help']     = 'Prevents the user from changing the quantity of this product, useful for software items etc.';

/* freight */
$field = 'freight';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'Freight costs';
$default_fd[$table][$field]['fd_type']     = 'freight';
$default_fd[$table][$field]['fd_default']  = '';
$default_fd[$table][$field]['fd_help']     = 'Customize the freight charges that apply to this product';

