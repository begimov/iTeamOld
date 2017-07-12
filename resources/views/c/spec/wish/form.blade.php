		<div id="nyear_form" class="">

			{!! Form::open(['route' => 'wish.store', 'class' => '', 'id' => 'wish']) !!}
					
				{!! Form::hidden('_method','POST') !!}
					
				<h2>Письмо Деду Морозу</h2>
				<fieldset class="param_inputs">
					<label>
						<span>От кого:</span>
						{!! Form::text('name',(Request::input('name')?Request::input('name'):(Auth::user()->firstname?Auth::user()->firstname:'')),["class"=>"required","placeholder"=>"Ваше ФИО"]) !!}
					</label>
					<label>
						<span>Ответ от Деда Мороза прислать на Email:</span>
						{!! Form::email('email',(Request::input('email')?Request::input('email'):(Auth::user()->email?Auth::user()->email:'')),["required"=>"required","class"=>"mail required","placeholder"=>"Ваш Email для ответа"]) !!}
					</label>
					<label>
						<span>Я желаю, чтобы в моей компании <br>в новом {{ $year}} году:</span>
						{!! Form::textarea('text',null,["required"=>"required","class"=>"required","placeholder"=>"Ваше пожелание"]) !!}
						</textarea>
					</label>
				</fieldset>
				
				<fieldset class="submits">
					{!! Form::hidden('_redirect','#') !!}
					{!! Form::submit('Отправить') !!}

				</fieldset>
				
			{!! Form::close() !!}
		
			<div id="complete">Письмо отправлено!</div>
			
		</div>