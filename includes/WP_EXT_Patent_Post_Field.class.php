<?php

/**
 * Class WP_EXT_Patent_Post_Field
 * ------------------------------------------------------------------------------------------------------------------ */

class WP_EXT_Patent_Post_Field extends WP_EXT_Patent {

	/**
	 * Constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		parent::__construct();

		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function run() {
		add_action( 'acf/init', [ $this, 'post_fields' ] );
	}

	/**
	 * Post fields.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function post_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( [
				'key'                   => 'group_' . $this->pt_ID,
				'title'                 => esc_html__( 'Информация о патенте', 'wp-ext-' . $this->domain_ID ),
				'fields'                => [
					[
						'key'               => 'tab_' . $this->pt_ID . '_general',
						'label'             => esc_html__( 'Общие сведения', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_number',
						'label'             => esc_html__( 'Номер патента', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_number',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_date',
						'label'             => esc_html__( 'Даты патента', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_date',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'layout'            => 'table',
						'sub_fields'        => [
							[
								'key'               => 'field_' . $this->pt_ID . '_date_priority',
								'label'             => esc_html__( 'Приоритет', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'priority',
								'type'              => 'date_picker',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'display_format'    => 'd/m/Y',
								'return_format'     => 'd/m/Y',
								'first_day'         => 1,
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_date_registration',
								'label'             => esc_html__( 'Регистрация', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'registration',
								'type'              => 'date_picker',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'display_format'    => 'd/m/Y',
								'return_format'     => 'd/m/Y',
								'first_day'         => 1,
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_date_expires',
								'label'             => esc_html__( 'Истекает', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'expires',
								'type'              => 'date_picker',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'display_format'    => 'd/m/Y',
								'return_format'     => 'd/m/Y',
							],
						],
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_type',
						'label'             => esc_html__( 'Тип патента', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_type',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_type',
						'field_type'        => 'radio',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_status',
						'label'             => esc_html__( 'Статус патента', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_status',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_status',
						'field_type'        => 'radio',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_possessors',
						'label'             => esc_html__( 'Патентообладатели', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_possessor',
						'label'             => esc_html__( 'Патентообладатель', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_possessor',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'row',
						'button_label'      => '',
						'sub_fields'        => [
							[
								'key'               => 'field_' . $this->pt_ID . '_possessor_name',
								'label'             => esc_html__( 'Название', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'name',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_possessor_email',
								'label'             => esc_html__( 'E-mail', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'email',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_possessor_phone',
								'label'             => esc_html__( 'Телефон', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'phone',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_possessor_fax',
								'label'             => esc_html__( 'Факс', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'fax',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_possessor_country',
								'label'             => esc_html__( 'Страна', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'country',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
						],
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_authors',
						'label'             => esc_html__( 'Авторы', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_author',
						'label'             => esc_html__( 'Автор', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_author',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'row',
						'button_label'      => '',
						'sub_fields'        => [
							[
								'key'               => 'field_' . $this->pt_ID . '_author_name',
								'label'             => esc_html__( 'ФИО', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'name',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_author_email',
								'label'             => esc_html__( 'E-mail', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'email',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_author_phone',
								'label'             => esc_html__( 'Телефон', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'phone',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_author_fax',
								'label'             => esc_html__( 'Факс', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'fax',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_author_country',
								'label'             => esc_html__( 'Страна', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'country',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
						],
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_cover',
						'label'             => esc_html__( 'Обложка', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_cover',
						'label'             => esc_html__( 'Обложка', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_cover',
						'type'              => 'image',
						'instructions'      => 'Загрузите обложку патента.',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'thumbnail',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg,png',
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_gallery',
						'label'             => esc_html__( 'Галерея', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_gallery',
						'label'             => esc_html__( 'Галерея', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_gallery',
						'type'              => 'gallery',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'min'               => '',
						'max'               => '',
						'insert'            => 'append',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg,png',
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_storage',
						'label'             => esc_html__( 'Хранилище', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_storage',
						'label'             => esc_html__( 'Хранилище', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_storage',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => [
							[
								'key'               => 'field_' . $this->pt_ID . '_file',
								'label'             => esc_html__( 'Файл', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'file',
								'type'              => 'file',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'return_format'     => 'array',
								'library'           => 'all',
								'min_size'          => '',
								'max_size'          => '',
								'mime_types'        => 'zip,pdf',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_file_hash',
								'label'             => esc_html__( 'SHA-256 Hash', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'file_hash',
								'type'              => 'textarea',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
								'maxlength'         => '',
								'rows'              => '',
								'new_lines'         => '',
							],
						],
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_meta',
						'label'             => esc_html__( 'META-информация', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_meta',
						'label'             => esc_html__( 'META-теги', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_meta',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_meta',
						'field_type'        => 'multi_select',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => $this->pt_ID,
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			] );
		}
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_Patent_Post_Field
 * ------------------------------------------------------------------------------------------------------------------ */

function WP_EXT_Patent_Post_Field() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_Patent_Post_Field;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 * ------------------------------------------------------------------------------------------------------------------ */

add_action( 'plugins_loaded', [ WP_EXT_Patent_Post_Field(), 'run' ] );