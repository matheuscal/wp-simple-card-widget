<?php
/**
 * Creates the Custom_Card_Widget
*/

class Custom_Card_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'customcard-widget',
            'Simple Custom Card',
            array('description' => esc_html__( 'A simple customizable card with two buttons at the bottom', 'cc-domain' ))
        );
    }

    /**
     * Front-end widget display
     * @param array $args Are widget arguments
     * @param array $instance Are the values retrieved from DB
     */
    public function widget($args, $instance){
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . $args['after_title'];
        }
        ?>
        <!-- Card -->
        <div class="project-card">
            <h5><?php echo esc_html__($instance['title'], 'cc-domain');?></h5>
            <img src="<?php echo esc_html__($instance['img_url'], 'cc-domain'); ?>" alt="">
            <p><?php echo $instance['text']; ?></p>
            <div class="card-buttons">
                <?php if ($instance['btn1txt'] != "") {?>
                <a href="<?php echo $instance['btn1link'];?>" target='_blank' class='card-button'><?php echo esc_html__($instance['btn1txt']); ?></a>
                <?php } ?>
                <?php if ($instance['btn2txt'] != "") {?>
                <a href="<?php echo $instance['btn2link'];?>" target='_blank' class='card-button'><?php echo esc_html__($instance['btn2txt']); ?></a>
                <?php } ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form
     */
    public function form($instance){
        $title = (!empty($instance['title'])) ? $instance['title'] : esc_html__('Custom Card', 'cc-domain');
        $text = (!empty($instance['text'])) ? $instance['text'] : esc_html__('Custom Card Description', 'cc-domain');
        $img_url = (!empty($instance['img_url'])) ? $instance['img_url'] : esc_html__('path/to/file', 'cc-domain');
        $btn1txt = (!empty($instance['btn1txt'])) ? $instance['btn1txt'] : esc_html__('View Live', 'cc-domain');
        $btn2txt = (!empty($instance['btn2txt'])) ? $instance['btn2txt'] : esc_html__('Source Code', 'cc-domain');
        $btn1link = (!empty($instance['btn1link'])) ? $instance['btn1link'] : esc_html__('#', 'cc-domain');
        $btn2link = (!empty($instance['btn2link'])) ? $instance['btn2link'] : esc_html__('#', 'cc-domain');
        ?>
        <!-- TITLE FIELD -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>'>
            <?php esc_attr_e( 'Title: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='widefat' id='<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>' 
                name='<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>'
                value='<?php echo esc_attr( $title ); ?>'/>
        </p>
        <!-- TEXT FIELD -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id('text') ); ?>'>
            <?php esc_attr_e( 'Text: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='widefat' id='<?php echo esc_attr( $this->get_field_id('text') );?>' 
                name='<?php echo esc_attr( $this->get_field_name('text')); ?>'
                value='<?php echo esc_attr($text); ?>'/>
        </p>
        <!-- CUSTOM IMG FIELD -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id('img_url') ); ?>'>
            <?php esc_attr_e( 'Thumbnail URL: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='img-url' id='<?php echo esc_attr( $this->get_field_id('img_url') );?>' value='<?php echo esc_attr( $img_url ) ?>' name='<?php echo esc_attr( $this->get_field_name('img_url') );?>'></input>
            <input type='button' class='upload-image-button components-button components-button is-primary' 
                value='Upload Thumbnail' />
        </p>
        <!-- First Button Text -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id('btn1txt') ); ?>'>
            <?php esc_attr_e( 'First Button Text: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='widefat' id='<?php echo esc_attr( $this->get_field_id('btn1txt') );?>' 
                name='<?php echo esc_attr( $this->get_field_name('btn1txt')); ?>'
                value='<?php echo esc_attr($btn1txt); ?>'/>
        </p>
        <!-- First Button Link -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id('btn1link') ); ?>'>
            <?php esc_attr_e( 'First Button Link: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='widefat' id='<?php echo esc_attr( $this->get_field_id('btn1link') );?>' 
                name='<?php echo esc_attr( $this->get_field_name('btn1link')); ?>'
                value='<?php echo esc_attr($btn1link); ?>'/>
        </p>
        <!-- Second Button Text -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id('btn2txt') ); ?>'>
            <?php esc_attr_e( 'Second Button Text: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='widefat' id='<?php echo esc_attr( $this->get_field_id('btn2txt') );?>' 
                name='<?php echo esc_attr( $this->get_field_name('btn2txt')); ?>'
                value='<?php echo esc_attr($btn2txt); ?>'/>
        </p>
        <!-- Second Button Link -->
        <p>
            <label for='<?php echo esc_attr( $this->get_field_id('btn2link') ); ?>'>
            <?php esc_attr_e( 'First Button Link: ', "cc-domain" ); ?>
            </label>
            <input type='text' class='widefat' id='<?php echo esc_attr( $this->get_field_id('btn2link') );?>' 
                name='<?php echo esc_attr( $this->get_field_name('btn2link')); ?>'
                value='<?php echo esc_attr($btn2link); ?>'/>
        </p>
        
        <?php
    }

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = $new_instance['title'];
        $instance['text'] = $new_instance['text'];
        $instance['img_url'] = $new_instance['img_url'];
        $instance['btn1txt'] = $new_instance['btn1txt'];
        $instance['btn1link'] = $new_instance['btn1link'];
        $instance['btn2txt'] = $new_instance['btn2txt'];
        $instance['btn2link'] = $new_instance['btn2link'];

		return $instance;
	}
}