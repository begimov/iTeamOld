<?php namespace App\Services\Html;

class FormBuilder extends \Collective\Html\FormBuilder {

	public function submit($value = null, $options = [])
	{
		return sprintf('
			<div class="form-group %s">
				%s
			</div>',
			empty($options) ? '' : (isset($options[0]) ? $options[0] : ''),
			parent::submit($value, ['class' => 'btn '.((!empty($options) && isset($options[1])) ? $options[1] : 'btn-default')])
		);
	}

	public function destroy($text, $message, $class = null)
	{
		return parent::submit($text, ['class' => 'btn btn-danger btn-block ' . ($class? $class:''), 'onclick' => 'return confirm(\'' . $message . '\')']);
	}

	public function control($type, $colonnes, $name, $errors, $label = null, $value = null, $pop = null, $placeholder = '', $options = [])
	{
		$placeholder = $placeholder ? $placeholder : ($label ? $label : '');
		$attributes = $options;
		if(!isset($attributes['class'])) $attributes['class'] = 'form-control';
		if(!isset($attributes['placeholder'])) $attributes['placeholder'] = $placeholder;
		#$attributes = ['class' => 'form-control', 'placeholder' => $placeholder];
		return sprintf('
			<div class="fg-line form-group %s %s">
				%s
				%s
				%s
				%s
			</div>',
			($colonnes == 0)? '': 'col-lg-' . $colonnes,
			$errors->has($name) ? 'has-error' : '',
			$label ? $this->label($name, $label, ['class' => 'control-label']) : '',
			$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
			call_user_func_array(['Form', $type], ($type == 'password')? [$name, $attributes] : [$name, $value, $attributes]),
			$errors->first($name, '<small class="help-block">:message</small>')
		);
	}
	
	public function group($type, $name, $errors, $label = null, $value = null, $pre = '', $post = '', $options = [], $checkbox = '')
	{
		$attributes = $options;
		if(!isset($attributes['class'])) $attributes['class'] = 'form-control';
		if(!isset($attributes['placeholder'])) $attributes['placeholder'] = ($label ? $label : '');
		
		if(is_array($pre)){
			$pre_content = '';
			foreach($pre AS $a_pre) $pre_content .= '<span class="input-group-addon">' . $a_pre . '</span>';
		}
		else $pre_content = $pre ? '<span class="input-group-addon"><span class="glyphicon glyphicon-'.$pre.'" aria-hidden="true"></span></span>': '';
		
		return sprintf('
			<div class="form-group %s">
				%s
				<div class="input-group">
				%s
				%s
				%s
				%s
				</div>
				%s
			</div>',
			$errors->has($name) ? 'has-error' : '',
			$label ? $this->label($name, $label, ['class' => 'control-label']) : '',
			$pre_content,
			call_user_func_array(['Form', $type], ($type == 'password')? [$name, $attributes] : [$name, $value, $attributes]),
			$post ? '<span class="input-group-addon"><span class="glyphicon glyphicon-'.$post.'" aria-hidden="true"></span></span>': '',
			$checkbox ? '<span class="input-group-addon checkbox">'. call_user_func_array(['Form', 'checkbox'], [$checkbox]) . '<i class="input-helper"></i></span>' : '',
			$errors->first($name, '<small class="help-block">:message</small>')
		);
	}

	public function check($name, $label = '', $value = 1, $checked = null, $options = [])
	{
		return sprintf('
			<span class="checkbox">
				<label>
					%s<i class="input-helper"></i> %s
				</label>
			</span>',
			parent::checkbox($name, $value, $checked, $options),
			$label
		);		
	}

	public function checkHorizontal($name, $label = '', $value = 1, $checked = null, $options = [])
	{
		return sprintf('
			<div class="form-group">
				<div class="checkbox">
					<label>
						%s<i class="input-helper"></i> %s
					</label>
				</div>
			</div>',
			parent::checkbox($name, $value, $checked, $options),
			$label
		);		
	}

	public function selection($name, $list = [], $selected = null, $label = null)
	{
		return sprintf('
			<div class="form-group" style="width:200px;">
				%s
				%s
			</div>',
			$label ? $this->label($name, $label, ['class' => 'control-label']) : '',
			parent::select($name, $list, $selected, ['class' => 'form-control'])
		);
	}

}
