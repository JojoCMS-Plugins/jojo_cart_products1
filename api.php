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

$_options[] = array(
    'id'          => 'cart_product_image_size',
    'category'    => 'Cart',
    'label'       => 'Image size',
    'description' => 'This will control the size of the image in the shopping cart. The letter dictates the shape, "s" for square, "w" for overall width, "h" for overall height. The number is the number of pixels for the give shape.',
    'type'        => 'text',
    'default'     => 's50',
    'options'     => '',
    'plugin'      => 'jojo_cart_products1'
);

$_options[] = array(
    'id'          => 'buy_now_image',
    'category'    => 'Cart',
    'label'       => 'Buy Now source image',
    'description' => 'This will specify which image you would like to have in place of the standard browser generated button for the buy now button. eg images/buynow.gif',
    'type'        => 'text',
    'default'     => '',
    'options'     => '',
    'plugin'      => 'jojo_cart_products1'
);

$_options[] = array(
    'id'          => 'buy_now_with_quantity',
    'category'    => 'Cart',
    'label'       => 'Selectable Buy Now quantities',
    'description' => 'When enabled, buy now buttons will come with a quantity field.',
    'type'        => 'radio',
    'default'     => 'no',
    'options'     => 'yes,no',
    'plugin'      => 'jojo_cart_products1'
);

Jojo_plugin_jojo_cart::setProductHandler('JOJO_Plugin_jojo_cart_products1');

/* Buy Now Embed filter */
Jojo::addFilter('content', 'buynow', 'jojo_cart_products1');

/* add an icon onto the editors for inserting Buy Now buttons */
$vars = array('code'=>array('name'=>'code','description'=>'Please enter the Product code for the button'));
$buynowbtn = array(
                'name'=>'Buy Now button',
                'format'=>'[[buynow: [code]]]',
                'description'=>'',
                'vars'=>$vars,
                'icon'=>'images/buynowicon.gif'
                );
Jojo::addContentVar($buynowbtn);

/* add an icon onto the editors for inserting Buy Now links */
$vars = array('linkcode'=>array('name'=>'linkcode','description'=>'Please enter the Product code for the link'));
$buynowlink = array(
                'name'=>'Buy Now link',
                'format'=>'[[buynowlink: [linkcode]]]',
                'description'=>'',
                'vars'=>$vars,
                'icon'=>'images/buynowlink.gif'
                );
Jojo::addContentVar($buynowlink);