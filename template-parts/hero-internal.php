<?php
	$hero_class = get_post_meta($post->ID, 'hero_class', true);
	$hero_title = get_post_meta($post->ID, 'hero_title', true);
	$id = get_the_ID();
    $img_full = get_the_post_thumbnail_url($id, 'full');
    $img_medium = get_the_post_thumbnail_url($id, 'medium_large');
?>
<svg
	width="0"
	height="0"
	viewBox="0 0 1 1"
	preserveAspectRatio="none"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink"
	xml:space="preserve"
	xmlns:serif="http://www.serif.com/"
	style="
		fill-rule: evenodd;
		clip-rule: evenodd;
		stroke-linejoin: round;
		stroke-miterlimit: 2;
	"
>
	<clipPath
		id="hero-path"
		clipPathUnits="objectBoundingBox"
		transform="scale(1.35, 2.35)"
	>
		<path
			d="M0,0l0.75,0l0,0.33c-0.251,-0 -0.41,0.163 -0.75,0.017l0,-0.347Z"
		/>
	</clipPath>
</svg>

<div class="hero hero__internal hero--<?php echo $hero_class ?>">

	<h1><?php echo $hero_title ?></h1>

</div>