<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @author William Waldon - http://www.wilwaldon.com
 * @package Claire 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo of_get_option( 'favicon' ); ?>">

	<!-- This controls the social buttons -->
	<style>
		.social.fb{
			display:
		}

		<?php
		if ( is_array( $multicheck ) ) {
			foreach ( $multicheck as $key => $value ) {
					// If you need the option's name rather than the key you can get that
				$name = $test_array_jr[$key];
					// Prints out each of the values
				echo '<li>' . $key . ' (' . $name . ') = ' . $value . '</li>';
			}
		}
		else {
			echo '<li>There are no saved values yet.</li>';
		}
		?>

	</style>



	<?php wp_head(); ?>
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async defer  data-pin-color="red" data-pin-height="28" data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>

<style>
  .logo-wrap a{
  color:<?php echo of_get_option( 'header-color' ); ?>;
}
body a,
a{
  color:<?php echo of_get_option( 'link-color' ); ?>;
}

body a:hover,
a:hover,
.nav li a:hover{
  color:<?php echo of_get_option( 'link-color-hover' ); ?>;
  text-decoration: none;
}

button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  background: <?php echo of_get_option( 'btn-bg' ); ?>;
  color: <?php echo of_get_option( 'btn-txt' ); ?>;
}

button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover{
  background: <?php echo of_get_option( 'btn-bg-hvr' ); ?>;
}

/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript,
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(<?php echo of_get_option( 'loading-icon' ); ?>) center no-repeat #fff;
}
</style>
</head>

<body <?php body_class(); ?>>
<div class="se-pre-con"></div>

<!--  navbar -->
<div class="navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse">
		<!-- nav items -->
	   <?php
		$args = array('theme_location' => 'primary',
			'container_class' => 'nav',
			'menu_class' => 'nav navbar-nav',
			'fallback_cb' => '',
			'menu_id' => 'main-menu',
			'walker' => new Upbootwp_Walker_Nav_Menu());
		wp_nav_menu($args);
		?>
    </div>
  </div>
</div>



