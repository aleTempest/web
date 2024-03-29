<?php
/**
 * Upload media library control.
 *
 * @package xts
 */

namespace XTS\Admin\Modules\Options\Controls;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

use XTS\Admin\Modules\Options\Field;
/**
 * Upload list button.
 */
class Upload_List extends Field {
	/**
	 * Displays the field control HTML.
	 *
	 * @since 1.0.0
	 *
	 * @return void.
	 */
	public function render_control() {
		$images = $this->get_field_value();
		?>
		<div class="xts-upload-preview">
			<?php foreach ( explode( ',', $images ) as $image_id ) : ?>
				<?php if ( $image_id ) : ?>
					<div data-attachment_id="<?php echo esc_attr( $image_id ); ?>">
						<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); // phpcs:ignore ?>
						<a href="#" class="xts-remove">
							<span class="xts-i-close"></span>
						</a>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<div class="xts-upload-btns">
			<a class="xts-btn xts-upload-btn xts-i-import"><?php esc_html_e( 'Upload', 'woodmart' ); ?></a>
			<a class="xts-btn xts-color-warning xts-clear-all xts-remove-upload-btn xts-i-trash"><?php esc_html_e( 'Clear all', 'woodmart' ); ?></a>
			<input type="hidden" class="xts-upload-input-id" name="<?php echo esc_attr( $this->get_input_name() ); ?>" value="<?php echo esc_attr( $images ); ?>" />
		</div>
		<?php
	}

	/**
	 * Check value URl and ID fields.
	 *
	 * @since 1.0.0
	 *
	 * @param string or array $value Field value.
	 *
	 * @return mixed
	 */
	public function validate( $value ) {
		if ( isset( $value['id'] ) ) {
			$attachment = wp_get_attachment_url( $value['id'] );

			if ( $attachment ) {
				$value['url'] = $attachment;
			}
		}

		return $value;
	}

	/**
	 * Enqueue media lib.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_media();
	}
}
