<?php

class formTemplateProfileOptions extends cmsForm {

    public function init() {

        return array(

            array(
                'type' => 'fieldset',
                'title' => LANG_BX_THEME_BG,
                'childs' => array(

                    new fieldImage('bg_img', array(
                        'title' => LANG_BX_THEME_BG_IMAGE,
                        'hint' => LANG_BX_THEME_BG_IMAGE_HINT,
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldCheckbox('bg_img_fix', array(
                        'title' => LANG_BX_THEME_BG_FIX
                    )),

                    new fieldColor('bg_color', array(
                        'title' => LANG_BX_THEME_BG_COLOR,
                        'default' => '#FFFFFF'
                    )),

                    new fieldList('bg_repeat', array(
                        'title' => LANG_BX_THEME_BG_REPEAT,
                        'default' => 'repeat',
                        'items' => array(
                            'repeat' => LANG_BX_THEME_BG_REPEAT_XY,
                            'no-repeat' => LANG_BX_THEME_BG_REPEAT_NO,
                            'repeat-x' => LANG_BX_THEME_BG_REPEAT_X,
                            'repeat-y' => LANG_BX_THEME_BG_REPEAT_Y,
							'cover' => LANG_BX_THEME_COVER,
                        )
                    )),
					
					new fieldList('bg_pos_x', array(
                        'title' => LANG_BX_THEME_BG_POS_X,
                        'default' => 'left',
                        'items' => array(
                            'left' => LANG_BX_THEME_BG_POS_X_LEFT,
                            'center' => LANG_BX_THEME_BG_POS_X_CENTER,
                            'right' => LANG_BX_THEME_BG_POS_X_RIGHT,
                        )
                    )),

                    new fieldList('bg_pos_y', array(
                        'title' => LANG_BX_THEME_BG_POS_Y,
                        'default' => 'top',
                        'items' => array(
                            'top' => LANG_BX_THEME_BG_POS_Y_TOP,
                            'center' => LANG_BX_THEME_BG_POS_Y_CENTER,
                            'bottom' => LANG_BX_THEME_BG_POS_Y_BOTTOM,
                        )
                    )),
					
					new fieldNumber('margin_top', array(
						'title' => LANG_BX_THEME_TOP_MARGIN,
                        'default' => 0,
                        'rules' => array(
                           array('min', 0),
                           array('max', 200),
                        )
                    )),

                )
            ),

        );

    }

}
