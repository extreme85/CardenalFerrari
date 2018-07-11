<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s','themnific'), max( $paged, $page ) ); ?></title>

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "Organization",
      "name" : "Grupos Scout Cardenal Ferrari",
      "url" : "http:/www.cardenalferrari.com.ar",
      "sameAs" : [
        "https://www.facebook.com/CardenalFerrari.com.ar",
        "https://twitter.com/cardenalferrari",
        "http://instagram.com/cardenalferrari",
        "https://plus.google.com/u/0/111037397814506997499",
        "http://www.youtube.com/channel/UCzagCGsZq6ikMjP079NiE9g"
      ]
    }
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/escultismo/",
      "name": "Escultismo"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/ramas-scout/lobatos/",
      "name": "Lobatos"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/ramas-scout/unidad/",
      "name": "Unidad"
    },{
    "@type": "ListItem",
    "position": 4,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/ramas-scout/caminantes/",
      "name": "Caminantes"
    },{
    "@type": "ListItem",
    "position": 5,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/ramas-scout/rovers/",
      "name": "Rovers"
    }
  }]
}
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/cardenal-historia/",
      "name": "Cardenal Ferrari Historia"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "http://www.cardenalferrari.com.ar/contactenos/",
      "name": "Contactenos"
    }
  }]
}
</script>
<?php themnific_head(); ?>

<?php wp_head(); ?>

</head>

     
<body <?php body_class(); ?>>
    
<div class="container <?php if (get_option('themnific_columns') == 'false' ); else echo 'twocols'; ?> <?php if (get_option('themnific_cont_shadow') == 'false' ); else echo 'container_shadow'; ?> <?php if (get_option('themnific_upper') == 'false' ); else echo 'upper'; ?>"> 

    <header id="header">
        <h1>
        
            <?php if(get_option('themnific_logo')) { ?>
                            
                <a href="<?php echo home_url(); ?>/">
                
                    <img class="logo" src="<?php echo esc_url(get_option('themnific_logo'));?>" alt="<?php bloginfo('name'); ?>"/>
                        
                </a>
                    
            <?php } 
                    
                else { ?> <a href="<?php echo home_url(); ?>/"><?php bloginfo('name');?></a>
                    
            <?php } ?>	
        
        </h1>                
        
        <?php if(get_option('themnific_headeradscript')) { 
         
            echo '<div class="headad">';
         
            echo get_option('themnific_headeradscript');
        
            echo '</div>';
        
        } elseif(get_option('themnific_headeradimg1')) { ?> 
        
            <div class="headad <?php if (get_option('themnific_ad_res_mode') == 'false' ); else echo 'resmode-No'; ?>">
            
                <a href="<?php echo get_option('themnific_headeradurl1');?>"><img src="<?php echo get_option('themnific_headeradimg1');?>" alt="" /></a>
                
            </div>
            
        <?php } else {} ?>
            
        
        <a id="navtrigger" href="#"><?php _e('MENU','themnific');?></a>
        
        <nav id="navigation"> 
        
            <?php  get_template_part('/includes/mag-navigation'); ?>
            
            <div style="clear: both;"></div>  
        
			<?php 
			
				get_template_part('/includes/uni-navigation');
				
				get_template_part('/includes/uni-social');
				
			?>
                            
        </nav>

    </header> 
    <?php if (get_option('themnific_ticker_dis') <> "true") { 

        get_template_part('/includes/mag-ticker' );

    } ?>
 <div style="clear: both;"></div>