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

class JOJO_Plugin_jojo_cart_products1 extends JOJO_Plugin
{
    function getProductDetails($code)
    {
        /* use a cache to store product details */
        static $_cache;
        if (!isset($_cache)) $_cache = array();
        if (isset($_cache[$code])) return $_cache[$code];

        /* attempt to match by product code */
        $product = Jojo::selectRow("SELECT * FROM {product} WHERE code = ? and status='active'", $code);

        /* attempt to match by id instead */
        if (empty($product['productid']) && preg_match('/^[0-9]+$/m', $code)) {
            $product = Jojo::selectRow("SELECT * FROM {product} WHERE productid = ? and status='active'", $code);
        }
        if (empty($product['productid'])) return false;

        /* decide on an appropriate product image */
        if(!empty($product['image'])){
            $image = "images/".Jojo::getOption('cart_product_image_size')."/products/".$product['image'];
        } else {
            $image = '';
        }

        /* a fixed quantity means the quantity can't be changed by the user (useful for licenses / software etc) */
        $fixed = $product['quantity_fixed'] == 'yes' ? true : false;

        /* if specified, read quantity from GET / POST */
        $quantity = Jojo::getFormData('quantity', 1);

        /* include the freight class */
        foreach (Jojo::listPlugins('jojo_cart_freight.php') as $pluginfile) {
            require_once($pluginfile);
            break;
        }
        $freight = new jojo_cart_freight($product['freight']);

        /* prepare return array - key names are important */
        $data = array('id'             => Jojo::either($product['code'], $product['productid']),
                      'name'           => $product['name'],
                      'description'    => $product['description'],
                      'image'          => $image,
                      'price'          => $product['price'],
                      'currency'       => $product['currency'],
                      'code'           => $product['code'],
                      'quantity'       => $quantity,
                      'quantity_fixed' => $fixed,
                      'freight'        => $freight->export()
                      );

        /* cache */
        $_cache[$code] = $data;
        return $data;
    }

    /* a content filter for inserting buy now buttons */
    function buyNow($content)
    {
        global $smarty;

        /* Find all [[buynow: code]] tags */
        preg_match_all('/\[\[buy ?now: ?([^\]]*)\]\]/', $content, $matches);
        foreach($matches[1] as $id => $code) {

            $smarty->assign('prodcode', $code);

            /* attempt to match by product code */
            $product = Jojo::selectRow("SELECT status FROM {product} WHERE code = ?", $code);

            /* attempt to match by id instead */
            if (empty($product['status']) && preg_match('/^[0-9]+$/m', $code)) {
                $product = Jojo::selectRow("SELECT status FROM {product} WHERE productid = ?", $code);
            }
            if (empty($product['status']))          $smarty->assign('status', 'doesntexist');
            elseif ($product['status']=='inactive')   $smarty->assign('status', 'inactive');
            else $smarty->assign('status', 'active');

            /* Get the embed html */
            $html = $smarty->fetch('jojo_cart_products1_buynow.tpl');
            $content = str_replace($matches[0][$id], $html, $content);
        }

        /* Find all [[buynowlink: code]] tags */
        preg_match_all('/\[\[buy ?now ?link: ?([^\]]*)\]\]/', $content, $matches);
        foreach($matches[1] as $id => $linkcode) {
            $smarty->assign('prodlinkcode', $linkcode);

            /* attempt to match by product code */
            $product = Jojo::selectRow("SELECT status FROM {product} WHERE code = ?", $linkcode);

            /* attempt to match by id instead */
            if (empty($product['status']) && preg_match('/^[0-9]+$/m', $linkcode)) {
                $product = Jojo::selectRow("SELECT status FROM {product} WHERE productid = ?", $linkcode);
            }
            if (empty($product['status']))          $smarty->assign('status', 'doesntexist');
            elseif ($product['status']=='inactive')   $smarty->assign('status', 'inactive');
            else $smarty->assign('status', 'active');

            /* Get the embed html */
            $html = $smarty->fetch('jojo_cart_products1_buynowlink.tpl');
            $content = str_replace($matches[0][$id], $html, $content);
        }
        return $content;
    }
}
