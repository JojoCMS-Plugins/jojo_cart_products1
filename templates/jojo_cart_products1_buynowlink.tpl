{if $status=='doesntexist'}<div class="wrongproductcode">Wrong Product Code</div>
{elseif $status=='inactive'}<div class="outofstock">Out of Stock</div>{else}

<a href="{$SITEURL}/cart/add/{$prodlinkcode}/" rel="nofollow">Buy Now</a>
{/if}