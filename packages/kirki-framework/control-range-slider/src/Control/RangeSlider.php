<?php
/**
 * The range-slider control.
 *
 * Creates a range slider control.
 *
 * @package kirki-framework/control-range-slider
 * @license MIT (https://oss.ninja/mit?organization=Kirki%20Framework)
 * @since   1.0
 */

namespace Kirki\Control;

use Kirki\Control\Base;
use Kirki\URL;

/**
 * Range slider control.
 *
 * @since 1.0
 */
class RangeSlider extends Base {

	/**
	 * The control type.
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-range-slider';

	/**
	 * The control version.
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 */
	public static $control_ver = '1.0';

	/**
	 * Enqueue control related styles/scripts.
	 *
	 * @since 1.0
	 * @access public
	 */
	public function enqueue() {

		parent::enqueue();

		// Enqueue the style.
		wp_enqueue_style( 'kirki-range-slider-control', URL::get_from_path( dirname( dirname( __DIR__ ) ) . '/dist/control.css' ), [], self::$control_ver );

		// Enqueue the script.
		wp_enqueue_script( 'kirki-range-slider-control', URL::get_from_path( dirname( dirname( __DIR__ ) ) . '/dist/control.js' ), [ 'jquery', 'customize-controls', 'customize-base', 'react-dom' ], self::$control_ver, false );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 *
	 * @since 1.0
	 * @access public
	 */
	public function to_json() {

		parent::to_json();

		$this->json['choices'] = wp_parse_args(
			$this->json['choices'],
			[
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			]
		);

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding WP_Customize_Control::to_json().
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @since 1.0
	 */
	protected function content_template() {}

}
