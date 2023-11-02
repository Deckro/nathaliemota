<?php

function themeperso_add_admin_pages() {
    add_menu_page('Paramètres du thème themeperso', 'themeperso', 'manage_options', 'themeperso-settings',
    'themeperso_theme_settings', 'dashicons-admin-settings', 60);
}
function themeperso_theme_settings() {
    echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
    echo '<form action="options.php" method="post" name="themeperso_settings">';
    echo '<div>';
    settings_fields('themeperso_settings_fields');
    do_settings_sections('themeperso_settings_section');
    submit_button();
    echo '</div>';
    echo '</form>';
}
function themeperso_settings_fields_validate($inputs) {
    if(!empty($_POST)) {
        if(!empty($_POST['themeperso_settings_field_introduction'])) {
            update_option('themeperso_settings_field_introduction', $_POST['themeperso_settings_field_introduction']);
        }     
        if(!empty($_POST['themeperso_settings_field_telephone'])) {
            update_option('themeperso_settings_field_telephone', $_POST['themeperso_settings_field_telephone']);
        } 
        if(!empty($_POST['themeperso_settings_field_email'])) {
           update_option('themeperso_settings_field_email', $_POST['themeperso_settings_field_email']);
        }}
        return $inputs; }
add_action('admin_menu', 'themeperso_add_admin_pages', 10);
function themeperso_settings_register() {
    register_setting('themeperso_settings_fields', 'themeperso_settings_fields', 'themeperso_settings_fields_validate');
    add_settings_section('themeperso_settings_section', __('Paramètres', 'themeperso'), 'themeperso_settings_section_introduction', 'themeperso_settings_section');
    add_settings_field('themeperso_settings_field_introduction', __('Introduction', 'themeperso'), 'themeperso_settings_field_introduction_output', 'themeperso_settings_section', 'themeperso_settings_section');
    add_settings_field('themeperso_settings_field_telephone', __('telephone', 'themeperso'), 'themeperso_settings_field_telephone_output', 'themeperso_settings_section', 'themeperso_settings_section');
    add_settings_field('themeperso_settings_field_email', __('email', 'themeperso'), 'themeperso_settings_field_email_output', 'themeperso_settings_section', 'themeperso_settings_section');
}
function themeperso_settings_section_introduction() {
    echo __('Paramètrez les différentes options de votre thème themeperso.', 'themeperso');
}
function themeperso_settings_field_introduction_output() {
    $value = get_option('themeperso_settings_field_introduction');
    echo '<input name="themeperso_settings_field_introduction" type="text" value="'.$value.'" />';
}
function themeperso_settings_field_telephone_output() {
    $value = get_option('themeperso_settings_field_telephone');
    echo '<input name="themeperso_settings_field_telephone" type="text" value="'.$value.'" />';
} 
function themeperso_settings_field_email_output() {
    $value = get_option('themeperso_settings_field_email');
    echo '<input name="themeperso_settings_field_email" type="text" value="'.$value.'" />';
}     
add_action('admin_init', 'themeperso_settings_register');