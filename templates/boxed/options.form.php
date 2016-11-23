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
                        'title' => 'Цветовая схема',
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
                        'title' => 'Фиксировать фоновую картинку (не будет прокручиваться)'
                    )),
					
					new fieldList('bg_repeat', array(
                        'title' => LANG_THEME_BG_REPEAT,
                        'default' => 'repeat',
                        'items' => array(
                            'repeat' => LANG_THEME_BG_REPEAT_XY,
                            'no-repeat' => LANG_THEME_BG_REPEAT_NO,
                            'repeat-x' => LANG_THEME_BG_REPEAT_X,
                            'repeat-y' => LANG_THEME_BG_REPEAT_Y,
                            'cover' => 'Растянуть на весь экран',
                        )
                    )),
					
					new fieldList('bg_img_pos_x', array(
                        'title' => 'Горизонтальное положение фона',
                        'default' => 'left',
                        'items' => array(
                            'center' => 'По центру',
                            'left' => 'Налево',
                            'right' => 'Направо',
                        )
                    )),

					new fieldList('bg_img_pos_y', array(
                        'title' => 'Вертикальное положение фона',
                        'default' => 'top',
                        'items' => array(
                            'center' => 'По центру',
                            'top' => 'Сверху',
                            'bottom' => 'Снизу'
                        )
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => 'Шапка',
                'childs' => array(

                    new fieldImage('logo', array(
						'title' => 'Логотип',
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldColor('headbgcolor', array(
                        'title' => 'Цвет фона шапки',
                        'default' => '#fff'
                    )),

					new fieldCheckbox('hidebgimg', array(
                        'title' => 'Убрать прозрачную картинку из фона шапки'
                    )),

					new fieldImage('headbg', array(
						'title' => 'Фоновое изображение шапки',
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
							'cover' => 'Растянуть на весь экран',
                        )
                    )),
					
					new fieldList('headbg_img_pos_x', array(
                        'title' => 'Горизонтальное положение фона',
                        'default' => 'left',
                        'items' => array(
                            'center' => 'По центру',
                            'left' => 'Налево',
                            'right' => 'Направо',
                        )
                    )),

					new fieldList('headbg_img_pos_y', array(
                        'title' => 'Вертикальное положение фона',
                        'default' => 'top',
                        'items' => array(
                            'center' => 'По центру',
                            'top' => 'Сверху',
                            'bottom' => 'Снизу'
                        )
                    )),
					
					new fieldNumber('headpadding', array(
                        'title' => 'Отступ по верх и вниз шапки',
						'default' => 55,
						'units' => 'px'
                    )),					
                )
            ),

            array(
                'type' => 'fieldset',
                'title' => 'Падвал',
                'childs' => array(
				
					new fieldImage('footerbg', array(
						'title' => 'Фон блока с виджетами',
                        'options' => array(
                            'sizes' => array('small', 'original'),
							'allow_import_link' => true
                        )
                    )),
					
					new fieldList('footerbg_img_pos_x', array(
                        'title' => 'Горизонтальное положение фона',
                        'default' => 'left',
                        'items' => array(
                            'center' => 'По центру',
                            'left' => 'Налево',
                            'right' => 'Направо',
                        )
                    )),

					new fieldList('footerbg_img_pos_y', array(
                        'title' => 'Вертикальное положение фона',
                        'default' => 'top',
                        'items' => array(
                            'center' => 'По центру',
                            'top' => 'Сверху',
                            'bottom' => 'Снизу'
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
                        'title' => 'Скрытый текст'
                    )),
					
					new fieldText('counters', array(
                        'title' => 'Счетчики или любой HTML код'
                    )),

                )
            ),

        );

    }

}
