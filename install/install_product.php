<?php

$table = 'product';
$query = "
    CREATE TABLE {product} (
        `productid` int(11) NOT NULL auto_increment,
        `code` varchar(255) NOT NULL default '',
        `name` varchar(255) NOT NULL default '',
        `description` text NOT NULL,
        `image` varchar(255) NOT NULL,
        `price` decimal(10,2) NOT NULL default '0.00',
        `currency` varchar(255) NOT NULL default '',
        `freight` text NOT NULL,
        `quantity_fixed` ENUM('yes','no') NOT NULL default 'no',
         PRIMARY KEY  (`productid`)
         ) TYPE=MyISAM ;";

/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jojo_cart_products1: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jojo_cart_products1: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) Jojo::printTableDifference($table,$result['different']);

