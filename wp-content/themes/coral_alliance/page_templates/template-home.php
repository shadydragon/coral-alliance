<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<main>
	<?php if (have_posts()):
		while (have_posts()): the_post();

			// Build the style property if there is a replacement image specified
			$hero_bg = createBackground(get_field("hero_section_background"), "hero-background");
			$cta_bg = createBackground(get_field("cta_background"), "cta-background");

		?>

			<section class="hero"<?php echo $hero_bg; ?>>
				<?php the_field('hero_section_content'); ?>
			</section>

			<section class="cta"<?php echo $cta_bg; ?>>
				<h2><?php the_field('cta_title'); ?></h2>
				<?php the_field('cta_content'); ?>
			</section>

			<section class="extra-content">

				<?php if (have_rows('extra_content')):
					while (have_rows('extra_content')): the_row(); ?>
					<?php the_sub_field('width'); ?>
					<?php the_sub_field('content'); ?>

				<?php endwhile;
				endif; ?>

			</section>

			<section class="form">

			</section>

		<?php endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>
