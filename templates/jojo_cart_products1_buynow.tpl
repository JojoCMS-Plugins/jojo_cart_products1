<form style="display:inline;" action="{$SITEURL}/cart/add/{$prodcode}/">
{if $OPTIONS.buy_now_with_quantity == 'yes'}<label>Quantity: <input type="text" size="4" name="quantity" value="1" /></label>{/if}
{if $OPTIONS.buy_now_image}<input type="image" src="{$OPTIONS.buy_now_image}" />
{else}<input type="submit" value="Buy Now" />{/if}

</form>