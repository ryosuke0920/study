<article>
	<h1><?php the_title(); ?></h1>

	<?php if (is_singular()) : ?>
		<div><?php the_content(); ?></div>
		<div>
			<?php
			$name = Bluex2_Acf::FIELD_NAME_INPUT_TYPE;

			$input_type_field = get_field(Bluex2_Acf::FIELD_NAME_INPUT_TYPE);
			$input_type_value = $input_type_field['value'];

			if ($input_type_value == 'textbox') {
				$attr = [
					'type' => 'textbox',
					'size' => '64',
					'value' => get_field(Bluex2_Acf::FIELD_NAME_SAMPLE_TEXTBOX),
				];
				$intput_tag = new Blue2_Tag('input', $attr);
				echo $intput_tag;
			} elseif ($input_type_value == 'textarea') {
				$value = get_field(Bluex2_Acf::FIELD_NAME_SAMPLE_TEXTAREA);
				$attr = [
					'cols' => '64',
					'rows' => '9',
				];
				$textarea_tag = new Blue2_Tag('textarea', $attr, $value);
				echo $textarea_tag;
			}
			?>
		</div>
		<div>
			<?php
			$checkbox_field_list = get_field(Bluex2_Acf::FIELD_NAME_CHECKBOX);
			if (count($checkbox_field_list)) {
				echo '<ul>';
				foreach ($checkbox_field_list as $checkbox_field) {
					echo '<li>';
					echo esc_html($checkbox_field['label']);
					echo '</li>';
				}
				echo '</ul>';
			}
			?>
		</div>
		<div>
			<?php
			$image_field = get_field(Bluex2_Acf::FIELD_NAME_IMAGE);
			if ($image_field) {
				$attr = [
					'src' => $image_field['url'],
					'width' => $image_field['width'],
					'height' => $image_field['height'],
				];

				if (Bluex2_Util::has_value('title', $image_field)) {
					$attr['title'] = $image_field['title'];
				}

				if (Bluex2_Util::has_value('alt', $image_field)) {
					$attr['alt'] = $image_field['alt'];
				}

				$img_tag = new Blue2_Tag('img', $attr);
				echo $img_tag;
			}
			?>
		</div>
		<div>
			<?php
			$args = [
				'post_status' => [
					'publish',
				],
				'posts_per_page' => -1,
			];
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) {
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$image = get_field(Bluex2_Acf::FIELD_NAME_IMAGE);
					the_ID();
					echo ' ';
					the_title();
					echo '<br>';
					echo $image['url'];
					echo '<br>';
					echo '<br>';
				}
			}
			?>
		</div>

	<?php else : ?>
		<div><?php the_excerpt(); ?></div>
		<div><a href="<?= esc_attr(the_permalink()) ?>">続きを読む</a></div>

	<?php endif; ?>

</article>