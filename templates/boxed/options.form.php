<?php

class formBoxedTemplateOptions extends cmsForm {
	
	public $is_tabbed = true;

    public function init() {

        return array(
		
			array(
                'type' => 'fieldset',
                'title' => LANG_THEME_SITE,
                'childs' => array(
				
					new fieldColor('color', array(
                        'title' => LANG_THEME_COLOR,
                        'default' => '#20b2aa'
                    )),
				
					new fieldColor('bg_color', array(
                        'title' => LANG_THEME_BG_COLOR,
                        'default' => '#eee'
                    )),
					
					new fieldImage('bg_img', array(
                        'title' => LANG_THEME_BG_IMAGE,
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldCheckbox('bg_img_fix', array(
                        'title' => LANG_THEME_BG_FIX
                    )),
					
					new fieldList('bg_repeat', array(
                        'title' => LANG_THEME_BG_REPEAT,
                        'default' => 'repeat',
                        'items' => array(
                            'repeat' => LANG_THEME_BG_REPEAT_XY,
                            'no-repeat' => LANG_THEME_BG_REPEAT_NO,
                            'repeat-x' => LANG_THEME_BG_REPEAT_X,
                            'repeat-y' => LANG_THEME_BG_REPEAT_Y,
                            'cover' => LANG_THEME_COVER,
                        )
                    )),
					
					new fieldList('bg_img_pos_x', array(
                        'title' => LANG_THEME_BG_POSX,
                        'default' => 'left',
                        'items' => array(
                            'center' => LANG_THEME_BG_POS_X_CENTER,
                            'left' => LANG_THEME_BG_POS_X_LEFT,
                            'right' => LANG_THEME_BG_POS_X_RIGHT,
                        )
                    )),

					new fieldList('bg_img_pos_y', array(
                        'title' => LANG_THEME_BG_POSY,
                        'default' => 'top',
                        'items' => array(
                            'center' => LANG_THEME_BG_POS_X_CENTER,
                            'top' => LANG_THEME_BG_POS_Y_TOP,
                            'bottom' => LANG_THEME_BG_POS_Y_BOTTOM
                        )
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_THEME_HEAD,
                'childs' => array(

                    new fieldImage('logo', array(
						'title' => LANG_THEME_LOGO,
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldColor('headbgcolor', array(
                        'title' => LANG_THEME_HEAD_COLOR,
                        'default' => '#fff'
                    )),

					new fieldCheckbox('hidebgimg', array(
                        'title' => LANG_THEME_HIDE_IMG
                    )),

					new fieldImage('headbg', array(
						'title' => LANG_THEME_HEAD_BG,
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldList('headbg_repeat', array(
                        'title' => LANG_THEME_BG_REPEAT,
                        'default' => 'repeat',
                        'items' => array(
                            'repeat' => LANG_THEME_BG_REPEAT_XY,
                            'no-repeat' => LANG_THEME_BG_REPEAT_NO,
                            'repeat-x' => LANG_THEME_BG_REPEAT_X,
                            'repeat-y' => LANG_THEME_BG_REPEAT_Y,
							'cover' => LANG_THEME_COVER,
                        )
                    )),
					
					new fieldList('headbg_img_pos_x', array(
                        'title' => LANG_THEME_BG_POSX,
                        'default' => 'left',
                        'items' => array(
                            'center' => LANG_THEME_BG_POS_X_CENTER,
                            'left' => LANG_THEME_BG_POS_X_LEFT,
                            'right' => LANG_THEME_BG_POS_X_RIGHT,
                        )
                    )),

					new fieldList('headbg_img_pos_y', array(
                        'title' => LANG_THEME_BG_POSY,
                        'default' => 'top',
                        'items' => array(
                            'center' => LANG_THEME_BG_POS_X_CENTER,
                            'top' => LANG_THEME_BG_POS_Y_TOP,
                            'bottom' => LANG_THEME_BG_POS_Y_BOTTOM
                        )
                    )),
					
					new fieldNumber('headpadding', array(
                        'title' => LANG_THEME_HEAD_PADDING,
						'default' => 55,
						'units' => 'px'
                    )),					
                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_THEME_FOOTER,
                'childs' => array(
				
					new fieldImage('footerbg', array(
						'title' => LANG_THEME_FOOTER_BG,
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldList('footerbg_img_pos_x', array(
                        'title' => LANG_THEME_BG_POSX,
                        'default' => 'left',
                        'items' => array(
                            'center' => LANG_THEME_BG_POS_X_CENTER,
                            'left' => LANG_THEME_BG_POS_X_LEFT,
                            'right' => LANG_THEME_BG_POS_X_RIGHT
                        )
                    )),

					new fieldList('footerbg_img_pos_y', array(
                        'title' => LANG_THEME_BG_POSY,
                        'default' => 'top',
                        'items' => array(
                            'center' => LANG_THEME_BG_POS_X_CENTER,
                            'top' => LANG_THEME_BG_POS_Y_TOP,
                            'bottom' => LANG_THEME_BG_POS_Y_BOTTOM
                        )
                    )),

                    new fieldString('owner_name', array(
                        'title' => LANG_THEME_COPYRIGHT
                    )),

                    new fieldString('owner_url', array(
                        'title' => LANG_THEME_COPYRIGHT_URL,
                        'hint' => LANG_THEME_COPYRIGHT_URL_HINT
                    )),

                    new fieldString('owner_year', array(
                        'title' => LANG_THEME_COPYRIGHT_YEAR,
                        'hint' => LANG_THEME_COPYRIGHT_YEAR_HINT
                    )),
					
					new fieldString('hide_text', array(
                        'title' => LANG_THEME_HIDE_TEXT
                    )),
					
					new fieldText('counters', array(
                        'title' => LANG_THEME_HTML
                    )),

                )
            ),

        );

    }

}
