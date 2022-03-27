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
				$value = get_field(Bluex2_Acf::FIELD_NAME_SAMPLE_TEXTBOX);
				echo '<input type="textbox" size="64" value="';
				echo esc_attr($value);
				echo '">';
			} elseif ($input_type_value == 'textarea') {
				$value = get_field(Bluex2_Acf::FIELD_NAME_SAMPLE_TEXTAREA);
				echo '<textarea cols="64" rows="9">';
				echo esc_html($value);
				echo '</textarea>';
			}

			$checkbox_field = get_field(Bluex2_Acf::FIELD_NAME_CHECKBOX);
			var_dump($checkbox_field);
			?>
		</div>

	<?php else : ?>
		<div><?php the_excerpt(); ?></div>
		<div><a href="<?= esc_attr(the_permalink()) ?>">続きを読む</a></div>

	<?php endif; ?>

</article>