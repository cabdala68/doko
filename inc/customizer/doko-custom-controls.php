<?php
/**
 * Define some custom classes for unicon.
 * 
 * https://codex.wordpress.org/Class_Reference/WP_Customize_Control
 *
 * @package AccessPress Themes
 * @subpackage Unicon
 * @since 1.0.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Doko_Gradient_Control extends WP_Customize_Control {
		public $type = 'gradient';

		public $params = array();

		public function __construct($manager, $id, $args = array() ){
			$this->params = $args['params'];
			parent::__construct( $manager, $id, $args );
		}

		public function enqueue() {
			wp_enqueue_script( 'color-picker', get_template_directory_uri().'/inc/customizer/assets/js/colorpicker.js', array('jquery') );
			wp_enqueue_script( 'jquery-classygradient', get_template_directory_uri().'/inc/customizer/assets/js/jquery.classygradient.js', array('jquery') );
			wp_enqueue_script( 'custom-gradient', get_template_directory_uri().'/inc/customizer/assets/js/custom-gradient.js', array('jquery','jquery-ui-slider', 'color-picker', 'jquery-classygradient'), '1.0', true );

			wp_enqueue_style( 'color-picker', get_template_directory_uri().'/inc/customizer/assets/css/colorpicker.css', array() );
			wp_enqueue_style( 'jquery-classygradient', get_template_directory_uri().'/inc/customizer/assets/css/jquery.classygradient.css', array() );
		}

		public function render_content() {

			if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;

			if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
			<?php endif;

			$dependency = '';
			$type = $this->type;
			$params = $this->params;
			$class = isset($params['class']) ? $params['class'] : '';
			$default_color = isset($params['default_color']) ? $params['default_color'] : '0% #0051FF, 100% #00C5FF';
			$picker_label = isset($params['picker_label']) ? $params['picker_label'] : esc_html__("Define Gradient Colors", 'doko');
			$picker_description = isset($params['picker_description']) ? $params['picker_description'] : esc_html__("For a gradient, at least one starting and one end color should be defined.", 'doko');
			$angle_label = isset($params['angle_label']) ? $params['angle_label'] : esc_html__("Define Gradient Direction", 'doko');
			$preview_label = isset($params['preview_label']) ? $params['preview_label'] : esc_html__("Gradient Preview", 'doko');
			?>
			<div class="gradient-box" data-default-color="<?php echo esc_attr($default_color); ?>">
			<div class="gradient-row">
			<div class="gradient-label"><?php echo esc_html($picker_label); ?></div>
			<div class="gradient-picker"></div>
			<div class="gradient-description"><?php echo esc_html($picker_description); ?></div>
			</div>

			<div class="gradient-row">
			<div class="gradient-label"><?php echo esc_html($angle_label); ?></div>
			<select class="gradient-direction">
				<option value="vertical"><?php echo esc_html__('Vertical Spread (Top to Bottom)', 'doko'); ?></option>
				<option value="horizontal"><?php echo esc_html__('Horizontal Spread (Left To Right)', 'doko'); ?></option>
				<option value="custom"><?php echo esc_html__('Custom Angle Spread', 'doko'); ?></option>
				</select>
			</div>

			<div class="gradient-row">
			<div class="gradient-custom" style="display: none;">
			<div class="gradient-label"><?php echo esc_html__('Define Custom Angle', 'doko'); ?></div>
			<div class="gradient-angle-slider">
			<div class="gradient-range"></div>
			</div>
			</div>
			</div>

			<div class="gradient-row">
			<div class="gradient-label"><?php echo esc_html($preview_label); ?></div>
			<div class="gradient-preview"></div>
			</div>
			<input type="hidden" class="<?php echo esc_attr($type) . ' ' . esc_attr($class); ?> gradient-val"  value="<?php echo esc_attr( $this->value() ) ?>" <?php $this->link(); ?> />
			</div>
			<?php
		}
	}

	/**
	 * A class to create a list of icons in customizer field
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Icons_Control extends WP_Customize_Control {

		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'doko_icons';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {

			$saved_icon_value = $this->value(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="ap-customize-icons">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$doko_icons_list = doko_icons_array();
						
							foreach ( $doko_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="<?php echo esc_attr($saved_icon_value); ?>" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}


	/**
	 * A class to create a list of search icons in customizer field
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Icons_Search_Control extends WP_Customize_Control {

		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'doko_icons';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {

			$saved_icon_value = $this->value(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="ap-customize-icons">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$doko_icons_list = doko_icons_search_array();
						
							foreach ( $doko_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="<?php echo esc_attr($saved_icon_value); ?>" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}

	/**
	 * A class to create a list of basket icons in customizer field
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Icons_Basket_Control extends WP_Customize_Control {

		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'doko_icons';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {

			$saved_icon_value = $this->value(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="ap-customize-icons">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$doko_icons_list = doko_icons_basket_array();
					
							foreach ( $doko_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="<?php echo esc_attr($saved_icon_value); ?>" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}


	/**
	 * A class to create a list of Phone icons in customizer field
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Icons_Phone_Control extends WP_Customize_Control {

		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'doko_icons';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {

			$saved_icon_value = $this->value(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="ap-customize-icons">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$doko_icons_list = doko_icons_phone_array();
						
							foreach ( $doko_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="<?php echo esc_attr($saved_icon_value); ?>" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}

	/**
	 * A class to create a list of email icons in customizer field
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Icons_Email_Control extends WP_Customize_Control {

		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'doko_icons';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {

			$saved_icon_value = $this->value(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="ap-customize-icons">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$doko_icons_list = doko_icons_email_array();
		
							foreach ( $doko_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="<?php echo esc_attr($saved_icon_value); ?>" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}



	/**
	 * A class to create a list of email icons in customizer field
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Social_Icons_Control extends WP_Customize_Control {

		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'doko_icons';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {

			$saved_icon_value = $this->value(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="ap-customize-icons">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$doko_icons_list = doko_social_icons_array();
		
							foreach ( $doko_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="<?php echo esc_attr($saved_icon_value); ?>" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}

	/**
     * Switch button customize control.
     *
     * @since 1.0.0
     * @access public
     */
    class Doko_Customize_Switch_Control extends WP_Customize_Control {

    	/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'switch';
		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() { 

			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
		        <div class="switch_options">
		        	<?php 
		        		$show_choices = $this->choices;

		        		foreach ( $show_choices as $key => $value ) {
		        			echo '<span class="switch_part '.esc_attr($key).'" data-switch="'.esc_attr($key).'">'. esc_html($value).'</span>';
		        		}
		        	?>
                  	<input type="hidden" id="ap_switch_option" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" />
                </div>
            </label>
	<?php
		}
	}


	/**
	* Multiple checkbox customize control class.
	*
	* @since  1.0.0
	* @access public
	*/
	class Doko_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {

	   /**
	    * The type of customize control being rendered.
	    *
	    * @since  1.0.0
	    * @access public
	    * @var    string
	    */
	   public $type = 'checkbox-multiple';

	   /**
	    * Displays the control content.
	    *
	    * @since  1.0.0
	    * @access public
	    * @return void
	    */
	   public function render_content() {

	       if ( empty( $this->choices ) )
	           return; ?>

	       <?php if ( !empty( $this->label ) ) : ?>
	           <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	       <?php endif; ?>

	       <?php if ( !empty( $this->description ) ) : ?>
	           <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	       <?php endif; ?>

	       <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

	       <ul>
	           <?php foreach ( $this->choices as $value => $label ) : ?>

	               <li>
	                   <label>
	                       <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
	                       <?php echo esc_html( $label ); ?>
	                   </label>
	               </li>

	           <?php endforeach; ?>
	       </ul>

	       <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
	   <?php }
	}

	/**
	 * A class to create a dropdown for all categories in your WordPress site
	 *
	 * @since 1.0.0
	 * @access public
	 */
	class Doko_Customize_Category_Control extends WP_Customize_Control {
		
		/**
		 * Render the control's content.
		 *
		 * @return HTML
		 * @since 1.0.0
		 */
		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;', 'doko' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
				esc_html($this->label),
				esc_html($this->description),
				$dropdown
			);
		}
	}


	 class Doko_Customize_Our_Team_Info_Control extends WP_Customize_Control {            
            public function render_content() {                
                ?>
                <div class="doko-info-secton">
                	 <h3><?php echo esc_html__('Note :', 'doko'); ?> </h3>
                	<p>
                		<?php echo esc_html__('You can add the Team Member Name and Country from image title, caption correspondingly From Same Team Image Title and Caption when uploaded ', 'doko'); ?>
                	</p>
                </div>
                <?php
            }
    }

    class Doko_Customize_Testimonials_Info_Control extends WP_Customize_Control {            
            public function render_content() {                
                ?>
                <div class="doko-info-secton">
                	 <h3><?php echo esc_html__('Note :', 'doko'); ?> </h3>
                	<p>
                		<?php echo esc_html__('You can add the Testimonials Name and Designation from image title, caption correspondingly From  Same  Testimonial Title and Caption when uploaded ', 'doko'); ?>
                	</p>
                </div>
                <?php
            }
    }	


    /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Doko_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'doko';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;  
            $json['pro_url']  = $this->pro_url;
            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }

} // WP_Customize_Control Class Exists