<form class="searchformhead" method="get" action="<?php  echo home_url(); ?>">
<input type="text" name="s" class="s" size="30" value="<?php _e('Search','themnific');?>" onfocus="if (this.value = '') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
<button class='searchSubmit' ><i class="icon-search"></i></button>
</form>