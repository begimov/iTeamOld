				
				<div id="sidebar" class="sidebar--desktop">
					<div class="sidebar_wrapper">
					
					
					@if(!Request::segment(1))
						<div class="widget widget_special widget_promo">
							<p style="padding:0 0 64px">
								<a href="/-/ru_management">
									<img alt="Система управления " Русский="" Менеджмент""="" src="/images/content/ru_manag.png" style="max-width: 100%;" class="no_zoom">
								</a>
							</p>
						</div>
					@endif
							
						<div class="widget widget_special widget_target">
						
							<p class="tac"><a href="/publications/target/"><img src="/images/all/bsc_fon.png"></a></p>
							<h3><a href="/publications/target/">BSC, KPI, контроллинг?</a></h3>

							<ul>
								<li>Ставить цели и достигать их.</li>
								<li>Стать лучшим поставщиком для своих клиентов.</li>
								<li>Делать больше меньшими средствами.</li>
							</ul>
							<p>Ознакомьтесь с <a href="/publications/target/">практическим руководством по построению системы целевого управления компанией</a> (раздел "<a href="/publications/target/">Целевое управление</a>").</p>
						</div>
						
					
						<div class="widget" style="margin: 0px 0 15px -40px;overflow: hidden;">
							<iframe src="//pomogi.org/urgent/4-1/?target=blank" width="468" height="60" frameborder="0" scrolling="no"></iframe>
						</div>
						
						
						<div class="sidebar_fixing">
							<div class="widget">
								
								<h3><i class="material-icons">computer</i> &nbsp; Мастер-классы</h3>
								
								<h5>
									<a href="/learn/webinar/business_processes">
									Приведите в порядок бизнес-процессы
									</a>
								</h5>
								<p><i>Бесплатный мастер-класс для собственников и руководителей компаний</i></p>
								<p>
									<ul class="small"><strong>Из мастер-класса вы узнаете:</strong>
										<li>Чем отличается процессный подход к управлению от функционального, и какие преимущества он дает?</li>
										<li>Почему не следует вмешиваться в стабильно работающий бизнес-процесс?</li>
										<li>Как сформировать процессную структуру компании и соотнести её с организационной структурой?</li>
										<li>Как выявить «слабое звено» в цепи бизнес-процессов?</li>
										<li>Как выбрать наиболее подходящие методы улучшения бизнес-процессов?</li>
										<li>Как вовлечь сотрудников в работу по совершенствованию процессов?</li>
										<li>Как сделать деятельность по совершенствованию процессов прозрачной и управляемой?</li>
									</ul>
								</p>
								
								<p>
									<a href="/learn/webinar/business_processes">
										<strong>Получить доступ к мастер-классу</strong>
									</a>
								</p>

								<h6><a href="/learn/webinar/">Библиотека мастер-классов</a></h6>

								
							</div>
						</div>
					</div>
					
				
					@if(!$childrens)					
					
					<div id="sidebar_share" class="sidebar-share">
							
							<h5>Нравится?</h5>
							<p><i class="material-icons">&#xE8DC;</i> Рекомендуйте друзьям и коллегам:</p>
							<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="icon" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
							
							<h5>Вам подарок!</h5>
							<p><i class="material-icons">&#xE8F6;</i> Цикл статей по бизнес-процессам!</b></p>
							

							<form accept-charset="utf-8" action="http://app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank" style="width:80%;">
								<input type="hidden" name="webform_id" value="9340301">
								<input type="text" value="" placeholder="Имя" name="name">
								<input type="email" value="" placeholder="@Почта" name="email">
								<input type="submit" name="submit" class="btn" value="👉 Подписаться">
							</form>
							
							<h5>Хотите больше?</h5>
							<p><i class="material-icons">&#xE04B;</i> <a href="/learn/webinar/" target="_blank">Смотрите мастер-классы по управлению компанией!</a></p>
							
							<a class="closer closer-smallicon" href="#sidebar_share" title="Закрыть это окно">Закрыть</a>
							<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
							
					</div>
					
					@endif
					
				</div>