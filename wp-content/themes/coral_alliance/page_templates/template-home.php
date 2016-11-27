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
				<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Coral Alliance: Protecting our reef, together"></div>
				<div class="container">
					<?php the_field('hero_section_content'); ?>
				</div>
			</section>

			<section class="cta"<?php echo $cta_bg; ?>>
				<div class="container">
					<h2><?php the_field('cta_title'); ?></h2>
					<?php the_field('cta_content'); ?>
				</div>
			</section>

			<section class="extra-content">
				<div class="container">
					<?php if (have_rows('extra_content')):
						while (have_rows('extra_content')): the_row(); ?>

							<div class="box box-<?php the_sub_field('width'); ?>">
								<?php the_sub_field('content'); ?>
							</div>

						<?php endwhile;
					endif; ?>
				</div>
			</section>

			<section class="petition" id="petition">
				<div class="container">

					<h2>BE a hero,<br>add your name</h2>
					<?php echo do_shortcode('[contact-form-7 id="52" title="Petition"]'); ?>
					<div class="past-entries" id="past-entries"><div class="group">&nbsp;</div></div>

				</div>
			</section>

		<?php endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>
