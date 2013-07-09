<?php

namespace Drupal\test\Form;

use Drupal\system\SystemConfigFormBase;

class TestSettingsForm extends SystemConfigFormBase {

	public function getFormID() {
    return 'test_settings';
  }

	public function buildForm(array $form, array &$form_state) {
		$config = config('test.settings');
		$form['test_show_extra_text'] = array(
  		'#type' => 'checkbox',
  		'#title' => t('Show extra text on test page'),
  		'#default_value' => config('test.settings')->get('test_show_extra_text')
  	);
  	return parent::buildForm($form, $form_state);
	}
	
	public function submitForm(array &$form, array &$form_state) {
		config('test.settings')
			->set('test_show_extra_text', $form_state['values']['test_show_extra_text'])
			->save();
		parent::submitForm($form, $form_state);
	}
  
}