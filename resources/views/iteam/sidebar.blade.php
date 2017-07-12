				
				<div id="sidebar" class="sidebar--desktop">
					<div class="sidebar_wrapper">
					
					
					@if(!Request::segment(1))
						<div class="widget widget_special widget_promo">
<p style="padding:0 0 64px">
								<a href="/-/ru_management">
									<img alt="Система управления " Русский="" Менеджмент""="" src="/images/content/ru_manag.png" style="max-width: 100%;" class="no_zoom">
								</a>
							</p> 
<!--							
							<div style="width: 100%; margin-bottom: 30px;">
							    <div style="display:inline-block !important;width:25%;float:left;"><img alt="" src="https://iteam.ru/images/icons/book/cover_new_1.png" style="width:220px;margin-left:-70px;" /></div>
							    <div style="display:inline-block !important;width:75%;float:right;">
<div style="text-align: center; border: 1px solid grey; border-radius: 4px; color: rgb(201, 19, 13); font-weight: bold; line-height: 20px; margin: -5px -35px 5px 45px; padding-left: 0px; padding-bottom: 10px; padding-top: 10px;">
			    Получите бесплатно<br>КНИГУ<br>"Как внедрить бизнес-процессы"!</div>

<div style="text-align:center;margin-left:20px;">
<form accept-charset="utf-8" action="http://app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank" style="float:right; width:70%;">
								<input type="hidden" name="webform_id" value="9340301">
								<input type="text" style="border-radius:4px;border:1px solid grey;margin-bottom:5px;text-align:center;font-size:15px;color:#000;" size="15" value="" placeholder="Имя" name="name">
								<input type="email" style="border-radius:4px;border:1px solid grey;margin-bottom:5px;text-align:center;font-size:15px;color:#000;" size="15" value="" placeholder="E-mail" name="email">
								<input type="submit" style="color:#fff; background-color: rgb(201, 19, 13);padding:5px 23px;" name="submit" class="btn" value="ПОЛУЧИТЬ">
							</form>			
  </div>			        
							    </div>
							    <br style="clear:both;">
							</div>
<br/>
-->
				
						</div>
					@endif
							
						{{--<div class="widget widget_special widget_target">--}}
						{{----}}
							{{--<p class="tac"><a href="/publications/target/"><img src="/images/all/bsc_fon.png"></a></p>--}}
							{{--<h3><a href="/publications/target/">BSC, KPI, контроллинг?</a></h3>--}}

							{{--<ul>--}}
								{{--<li>Ставить цели и достигать их.</li>--}}
								{{--<li>Стать лучшим поставщиком для своих клиентов.</li>--}}
								{{--<li>Делать больше меньшими средствами.</li>--}}
							{{--</ul>--}}
							{{--<p>Ознакомьтесь с <a href="/publications/target/">практическим руководством по построению системы целевого управления компанией</a> (раздел "<a href="/publications/target/">Целевое управление</a>").</p>--}}
						{{--</div>--}}

						@if(isset($sum) && $sum != 0)
							<div style="border-top: 1px dashed lightgrey; border-bottom: 1px dashed lightgrey; margin-bottom: 30px">
								<h3 style="text-align: center; margin: 0px">Оцените систему управления процессами вашей компании</h3>
								<div id="chart_div"></div>
								<p style="text-align: center; margin: 0px;">
									<a href="https://iteam.ru/tests/show-form/3" style="font-size: 25px;"><b>Перейти к тесту</b></a>
								</p>
								<p style="text-align: center">Уже прошли тестирование: <b>{{ $sum }}</b></p>
							</div>
						@endif
						
					
						<div class="widget" style="margin: 0px 0 15px -40px;overflow: hidden;">
							<iframe src="//pomogi.org/urgent/4-1/?target=blank" width="468" height="60" frameborder="0" scrolling="no"></iframe>
						</div>

						<div class="sidebar_fixing">
							<div class="widget">
								
								<h3><i class="material-icons">computer</i> &nbsp; Мастер-классы</h3>
								
								<h5>
									<a href="/learn/webinar/business_processes">
									Как создать систему управления процессами за 4 месяца
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
					
				
					@if(isset($childrens))
					
					<div id="sidebar_share" class="sidebar-share" style="height:440px;">
							
							<h5>Нравится?</h5>
							<p><i class="material-icons">&#xE8DC;</i> Рекомендуйте друзьям и коллегам:</p>
							<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="icon" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>

				
							
								<div style="width: 100%;margin-top:-10px;margin-bottom:0!important;">
							    <div style="display:inline-block !important;width:25%;float:left;">
							        
							        <!-- <img style="width: 220px; margin-left: -58px; margin-top: -30px;" src="https://iteam.ru/images/icons/book/11.png" alt="">-->
							        
							        <img alt="Как внедрить бизнес-процессы" src="https://iteam.ru/images/icons/book/11_4.png" style="width: 160px; margin-left: -22px;margin-top:12px;">
							        
							        </div>
							    <div style="display:inline-block !important;width:75%;float:right;">
<div style="text-align: center; color: rgb(201, 19, 13); font-weight: bold; line-height: 20px; margin: -5px -10px 5px 50px; padding-left: 0px; padding-bottom: 10px; padding-top: 10px;">
			    Вам подарок<br>КНИГА<br>"Как внедрить бизнес-процессы"!</div>

<!-- <div style="text-align:center;">
<form accept-charset="utf-8" action="http://app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank" style="float:right; width:70%;margin-bottom:-20px;">
								<input type="hidden" name="webform_id" value="9340301">
								<input type="text" style="border-radius:4px;border:1px solid grey;margin-bottom:5px;text-align:center;font-size:15px;color:#000;" size="15" value="" placeholder="Имя" name="name">
								<input type="email" style="border-radius:4px;border:1px solid grey;margin-bottom:5px;text-align:center;font-size:15px;color:#000;" size="15" value="" placeholder="E-mail" name="email">
								<input type="submit" style="color:#fff; background-color: rgb(201, 19, 13);padding:5px 23px;" name="submit" class="btn" value="ПОЛУЧИТЬ">
							</form>			
  </div>
  -->
  
  <div style="margin-left:65px;">
<script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=Bh5z&webforms_id=5415206"></script>
  </div>
  
							    </div>
							    <br style="clear:both;">
							</div>


							
<!--			
			<h5>Вам подарок!</h5>
							<p><i class="material-icons">&#xE8F6;</i> Цикл статей по бизнес-процессам!</b></p>
							

							<form accept-charset="utf-8" action="http://app.getresponse.com/add_contact_webform.html?u=Bh5z" method="post" target="_blank" style="width:80%;">
								<input type="hidden" name="webform_id" value="9340301">
								<input type="text" value="" placeholder="Имя" name="name">
								<input type="email" value="" placeholder="@Почта" name="email">
								<input type="submit" name="submit" class="btn" value="👉 Подписаться">
							</form>
							
-->							
							
							<h5 style="margin-top: 0px; margin-bottom: 0px;">Хотите больше?</h5>
							<p><i class="material-icons">&#xE04B;</i> <a href="/learn/webinar/" target="_blank">Смотрите мастер-классы по управлению компанией!</a></p>
							
							<a class="closer closer-smallicon" href="#sidebar_share" title="Закрыть это окно">Закрыть</a>
							<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
							
					</div>
					
					@endif
					
				</div>