<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2008 Harvey Kane <code@ragepank.com>
 * Copyright 2008 Michael Holt <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

/* Edit Products */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/product'");
if (!count($data)) {
    echo "jojo_cart_products1: Adding <b>Edit Product</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Edit Products', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/product', pg_parent=". Jojo::clean($_ADMIN_CONTENT_ID).", pg_order=4, pg_sitemapnav='no', pg_xmlsitemapnav='no', pg_index='no', pg_followto='no', pg_followfrom='yes'");
}