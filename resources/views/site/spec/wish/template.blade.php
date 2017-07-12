<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="ITeam" />
		<meta name="keywords" content="ITeam" />
		
		<meta name="_token" content="{!! csrf_token() !!}" />

		<title>
			@yield('title') 
			Пожелания Бизнес Деду Морозу | Консалтинговая компания ITeam
		</title>
		
		<link rel="shortcut icon" href="/favicon.ico" />
		<style type="text/css">
		*{background-attachment:scroll;background-color:rgba(0, 0, 0, 0);background-position:95% center;background-repeat:no-repeat;margin:0;padding:0;}
		body{font:16px/18px Arial,sans-serif;margin:0;min-height:100%;padding:0;}
		
		body{background:#6b92b9;}
		canvas{display:block;position:fixed;z-index:1;top:0;width:100vw;height:100vh;}
		
		#page{z-index:999;position:relative;width:800px;max-width:90%;}
		#body{overflow:hidden;z-index:999;}
		#header{position:relative;height:96px;margin:0 0 -96px;width:100%;overflow:hidden;}
		#logo{float:left;height:70px;margin:0;width:140px;}
		.logo{width:200px;height:70px;background:url('data:image/png;base64,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') no-repeat scroll 0 -70px transparent;font:70px/70px Arial,Verdana sans-serif;text-indent:201px;display:block;overflow:hidden;border:0 none;text-decoration:none;color:#202;letter-spacing:35px;}
		.logo:hover{background:url('data:image/png;base64,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') no-repeat scroll 0 0 transparent;}
		#logo:hover{cursor:default;}
		a.logo:hover{cursor:pointer;}
		#wrapper{}
		h1{font:32px/1 Arial,sans-serif;margin:32px 0;color:#f00;}
		fieldset{border:0 none;display:inline-block;}
		u{text-decoration:none;}
		form.block label{display:block;float:left;margin:0 16px 16px 0;}
		.wlabel{}
		.wlabel label{margin:0 0 16px !important;min-height:32px;width:100%;}
		label{display:inline-block;position:relative;}
		.wlabel label input, .wlabel label select{border:0 none;height:30px;margin:1px;outline:1px solid #CCCCCC !important;width:100%;}
		.wlabel label input[type="checkbox"]{background-color:#008000;float:left;width:32px !important;}
		.mail,.email{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAsklEQVQ4T6WQsQ3DIBBFKTxMxkjPGBT01HRITEAfZYG0GcMDZJjz/eJHyIcdOy6eZB//Px92IuKuYAZncd77S3wfQgizIgeZjUDXuddaPzln2QMZZI0gxvj8JWEZWSNIKcmepC8jawQIbUnWZcyGAlBKeWl4ooRlzHDG3FDQWntr8KZ/+cFN+GXMcIbMUNCXsSavw7VBLzGCvsw1WezfKTGCdXkLSowAVt75AHaDfzGDsywjSfoq4S5J8gAAAABJRU5ErkJggg==");}
		.lock,.pass{background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA1klEQVQ4y2NITk5moDoAGlpfU1PzHx2DxAlqrq6uPpGfnw/ScBSIr0NpEL4GE8drANS220DM/PDhQ8b///8znj9/nhHIZ4Qa9J8uBpwHsUGaoTQ/VA6/AcBAeg8NLJwYKv8eqwFVVVX/sYU+Ogapw+d8ZDwXiI2AuBNdjlgDlIGYF4iFyTUgAmqAHbkGgLAuNnFcqXA5FsWqWMSOYzWgvr5eAmjIczTFL5D5QPnvlZWVGjjTAkgSZAMO71wHRqEFUTkSaJMHEDcANe0H4nYgDgC6kANdHQCXr0Y3YEz6JgAAAABJRU5ErkJggg==");}
		label input{max-width:100%;}
		input{background-attachment:scroll;background-color:rgba(0, 0, 0, 0);background-position:95% center;background-repeat:no-repeat;border:1px solid #CCCCCC;color:#7F7F7F;font:16px/2 Arial,sans-serif;height:30px;text-indent:4px;width:225px;}
		input[type="checkbox"]{width:30px !important;}
		fieldset label sup{background-attachment:scroll;background-color:#F7F7F7;background-position:8px center;background-repeat:no-repeat;color:#333333;cursor:pointer;display:block;font:13px/32px Arial,sans-serif;height:32px;overflow:hidden;padding:0 24px;float:right;}
		fieldset label:hover sup {background-color:#e7e7e7;}
		fieldset label input[type="checkbox"]:checked+sup{background-color:#cf9;}
		fieldset label:hover input[type="checkbox"]:checked+sup{background-color:#9f9;}
		#page{background-color:rgba(255,255,255,0.93);margin:40px auto;padding:40px;width:800px;}
		#passtoggle{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA0klEQVQ4y+3SMQrCQBCFYREJlkGCiIiVpAgpg5VH8RBibScWFinFwkKsPISIWKYSTyEiKURExCL+Ay8gETyBCx9hJjPDZjel0n99rSzLQsRIcJJEufBXo4sVlpjigRuueGKud8YtNjexQw913LFAhAomeKGjGqtt5M0ONggU9zXAnqlyZZwxUByox7Ggqol+YYDlax8D7CyGin1srSbfRRt7dG1rGhBr+9Y80if4qrHaVvEcPKx1WGMdYoqLmmd6ZzXer9uIVHzQDZijctH/R/9eb3+uR2y2o4yFAAAAAElFTkSuQmCC") no-repeat scroll 50% 50% #C80000;border-radius:16px;cursor:pointer;font:16px/1 sans-serif;height:16px;overflow:hidden;padding:4px;position:absolute;right:4px;text-indent:33px;top:4px;width:16px;}
		.wlabel label input, .wlabel label select{border:0 none;height:30px;margin:1px;outline:1px solid #CCCCCC !important;width:100%;}
		.lhalf{width:48%;float:left !important;}
		.rhalf{width:48%;float:right !important;}
		input[type="submit"]{background-attachment:scroll;background-color:#99CCFF;background-position:8px center;border-width:0;color:#333333;font:bold 16px/64px sans-serif;height:64px;/*padding:0 24px;*/
		text-indent:0;text-transform:lowercase;}
		input[type="submit"]:hover{background-color:#3399FF;cursor:pointer;}
		input:disabled{background-color:#EEEEEE;opacity:0.5;}
		p{padding:0 0 8px;}
		.block{display:block;}
		.auth_box{margin:20px auto 0;width:225px;}
		.auth fieldset{width:100%;}
		#uform{width:227px;float:left;margin:0 64px 0 0;position:relative;}
		#ulive{background-color:#f7f7f7;float:right;padding:32px;width:444px;}
		#uform form{width:227px;}
		#uform form.block label{margin:0 0 16px 0 !important;}
		#uform h3{color:#444444;font:32px/1 Arial,sans-serif;margin:0 0 16px;}
		#ulive{color:#444444;font:16px/1 Arial,sans-serif;}
		#ulive h1{color:#444444;font:32px/1 Arial,sans-serif;margin:0 0 16px;}
		#ulive h4{font:bold 80px/0.9 Arial,sans-serif;color:#7f7f7f;}
		#ulive h4 i{font-style:normal;}
		#ulive h5{font:32px/1 Arial,sans-serif;margin:32px 0;}
		.auth_links{left:291px;position:absolute;top:-96px;width:225px;}
		.auth_links a#logoutlink{width:48px;}
		.auth_links a{background-color:#99CCFF;color:#000;font:bold 16px/32px sans-serif;display:block;height:32px;padding:16px 32px;text-decoration:none;text-transform:lowercase;text-align:center;}
		.auth_links a:hover{background-color:#3399FF;cursor:pointer;}
		.linhead{float:left;margin:16px 0 0 150px;}
		.linhead a, a.btn-link{background-color:#69f;color:#000;font:18px/32px Arial,sans-serif;display:inline-block;height:32px;padding:16px 32px;text-decoration:none;}
		.rinhead{float:right;margin:16px 0 0;}
		.rinhead a{background-color:deeppink;color:#FFFFFF;font:18px/32px Arial,sans-serif;display:block;height:32px;padding:16px 32px;text-decoration:none;}
		.captcha i{display:block;float:left;margin:0 16px 0 0;width:104px;}
		.captcha img{width:80px;}
		.captcha label{width:104px;}
		.captcha input{font:bold 18px/32px Arial, sans-serif;}
		.alert{background-color:#CC0000;color:#FFFFFF;display:none;font:16px/32px Arial, sans-serif;margin:0;min-height:32px;padding:0 32px;position:relative;top:8px;width:736px;}
		.close{background-color:#CC3333;color:#FFFFFF;display:block;font:24px/32px Arial, sans-serif;height:32px;overflow:hidden;position:absolute;right:0;text-align:center;text-decoration:none;top:0;width:32px;cursor:pointer;}
		.clear{clear:both;float:none;}

		.pagination{clear:both;display:block;float:none;font:13px/32px sans-serif;height:32px;margin:8px auto;overflow-x:hidden;overflow-y:auto;text-align:center;width:90%;}
		.pagination li a, .pagination li span{display:inline-block;}
		.pagination li{display:inline;list-style-type:none;}
		.pagination li{background-color:#ff9;border-radius:32px;color:#333333;margin:0 1px;overflow:hidden;padding:4px 8px;text-decoration:none;}
		.pagination li:hover{background-color:#ff3;}
		.pagination li.active{background-color:#69f;color:#fff;}
		.pagination li.active:hover{background-color:#36f;}
		.pagination li.disabled{opacity:0.3;}
		
		.search{text-align:right;margin:-64px 0 32px;}
		h2 {
			background-color: rgba(192, 192, 255, 0.5);
			font: 24px/1 sans-serif;
			margin: 0 0 30px;
			padding: 10px;
			text-align: center;
		}
		.wishes {
			font: 18px/1 sans-serif;
		}
		.wishes > div {
			background-color: rgba(255, 255, 255, 0.7);
			margin: 0 0 32px;
			padding: 32px;
		}
		.ny{{ $year }} #nyear::before {
			background-image:url("/images/main/sekretno.png");
			background-repeat: no-repeat;
			position: absolute;
			content: "";
			top: 60px;
			left: 130px;
			width: 280px;
			height: 130px;
		}
		#nyear::after {
			background-image: url("/images/main/moroz_fon.png");
			background-repeat: no-repeat;
			background-position: center bottom;
			padding: 0 0 250px;
			width: 800px;
			margin: 0px auto;
			content: " ";
			display: block;
		}		
		#nyear.nstatus_ok{
			background-image:none !important;
			padding:0;
		}
		#nyear>img{
			width:200px;
			margin:0px auto;
			display:block;
		}
		#nyear_form {
			display: block;
			/*height: 620px;*/
			overflow: hidden;
			position: relative;
			width: 100%;
		}
		#nyear_form>p {
			height: 80%;
			left: 10%;
			overflow: hidden;
			position: absolute;
			top: 10%;
			width: 80%;
		}
		#nyear_form form {
			background-color: rgba(209, 222, 240, 0.7);
			border: 10px solid rgba(209, 222, 240, 0);
			border-radius: 10px;
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.9), 0 0 0 rgba(255, 255, 255, 0.4) inset;
			display: block;
			margin: 40px auto;
			min-width: 300px;
			padding: 20px;
			width: 300px;
		}
		#nyear_form form input[type="text"], #nyear_form form input[type="email"], #nyear_form form textarea {
			background-color: rgba(240, 250, 255, 0.95);
			border: 1px solid rgba(100, 100, 150, 0.95);
			border-radius: 3px;
			margin-bottom: 20px;
			padding: 2%;
			position: relative;
			width: 95% !important;
		}
		#nyear_form form fieldset, #nyear_form form fieldset label {
			border: 0 none;
			display: block;
			width: 100%;
		}
		#nyear_form form fieldset label span{
			background: none;
			cursor: pointer;
		}
		#nyear_form form h2 {
			margin: 0 0 20px;
			padding: 0;
			background-color: transparent;
		}
		#nyear_form form .captcha i {
			display: block;
			float: left;
			margin: 0 3% 0 0;
			width: 45%;
		}
		#nyear_form form .captcha label {
			overflow: hidden;
			width: 50% !important;
		}
		#nyear_form form i.error {
			background-color: rgb(255, 0, 0);
			color: rgb(255, 255, 255);
			padding: 4px 16px;
			position: relative;
			top: -24px;
			width: auto;
		}
		.submits{
			margin:8px 0;
			text-align:right;
		}
		#nyear_form form input[type="submit"] {
			border: 1px solid #447314;
			background: #6aa436;
			background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
			background: -webkit-linear-gradient(top, #8dc059, #6aa436);
			background: -moz-linear-gradient(top, #8dc059, #6aa436);
			background: -ms-linear-gradient(top, #8dc059, #6aa436);
			background: -o-linear-gradient(top, #8dc059, #6aa436);
			background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			-webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
			-moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
			box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
			text-shadow: #addc7e 0 1px 0;
			color: #31540c;
			font:bold 24px/1 sans-serif !important;
			padding: 8.5px 18px;
			text-decoration: none;
			vertical-align: middle;
		}
		#nyear_form form input[type="submit"]:hover {
			border: 1px solid #447314;
			text-shadow: #31540c 0 1px 0;
			background: #6aa436;
			background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
			background: -webkit-linear-gradient(top, #8dc059, #6aa436);
			background: -moz-linear-gradient(top, #8dc059, #6aa436);
			background: -ms-linear-gradient(top, #8dc059, #6aa436);
			background: -o-linear-gradient(top, #8dc059, #6aa436);
			background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
			color: #fff;
		}
		#nyear_form form input[type="submit"]:active {
			text-shadow: #31540c 0 1px 0;
			border: 1px solid #447314;
			background: #8dc059;
			background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
			background: -webkit-linear-gradient(top, #6aa436, #8dc059);
			background: -moz-linear-gradient(top, #6aa436, #8dc059);
			background: -ms-linear-gradient(top, #6aa436, #8dc059);
			background: -o-linear-gradient(top, #6aa436, #8dc059);
			background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
			color: #fff;
		}
		#nyear_form #complete{display:none;}
		#nyear_form.complete #complete {
			display: block;
			font: 16px/1 sans-serif;
			padding: 32px;
			position: relative;
			text-align: center;
		}
		#nyear_form.complete #complete h4{
			font: 24px/1 sans-serif;
		}
		#nyear_form.complete #wish{display:none;}
		
		.title {
			color: rgb(64, 128, 255);
			font: italic 12px/1.4 sans-serif;
		}
		.status_all.status_2 .title {
			color: rgb(16, 176, 16);
		}
		.status_2 {
			background-color: #EFFFE4 !important;
		}
		h4 span {
			font-weight: normal;
			color: #888;
		}
		</style>

		
	</head>
	<body>
		<div id="page" class="ny{{ $year }}">
			<div id="body">
				<div id="header">
					<div id="logo">
						<a class="logo" href="/">ITeam</a>
					</div>
					@if(Auth::user())
					<div id="i" class="-rinhead">
						<a href="/i/" style="float:right;">Профиль &rarr;</a>
					</div>
					@endif
				</div>
				<div id="wrapper">
					<div id="main">
						
						<div class="alerts">
						@if(session()->has('status'))
							@include('partials/error', ['type' => 'success', 'message' => session('status')])
						@endif
						@if(session()->has('error'))
							@include('partials/error', ['type' => 'danger', 'message' => session('error')])
						@endif
						</div>
						
						
						@yield('main')
						
						
					</div>
				</div>
			</div>
		</div>
		
		<canvas id="canvas"></canvas>
		
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.1.js"></script>
		<script type="text/javascript">
		(function($){
			var closer = '<i class="close">&#10005;</i>';
			$('input[type="password"]').each(function(){
				var password = $(this),id = password.attr('id');
				password.after('<span id="passtoggle" class="show_pass" data-elem="'+id+'">показать</span>');
				$('span#passtoggle').hide();
				password.focus(function(){$('span#passtoggle').show();});
			});
			$('span#passtoggle').on('click',function(){
				var toggle = $(this),elem = $('input#'+toggle.data('elem')),text_type = 'text', pass_type = 'password';
				if(elem.attr('type')===pass_type){elem.attr('type',text_type);toggle.text('скрыть').removeClass('show_pass').addClass('hide_pass');
				}else{elem.attr('type',pass_type);toggle.text('показать').removeClass('hide_pass').addClass('show_pass');}
			});
			$('.alert').hide().each(function(){ var alrt = $(this); if(alrt.html()) alrt.fadeIn('slow').append(closer).delay(20000).fadeOut('slow'); });
			$('.close').on('click',function(){ $(this).parent().hide(); });
			$('.status_toggle').on('click',function(){
				var toggle = $(this);/*, tr = toggle.parent().next('table').find("tr."+toggle.attr("id"));*/
				toggle.parent().children('.status_toggle').addClass("opacity30");
				toggle.removeClass("opacity30");
				toggle.parent().next('table').find("tr").each(function(){
					var tr = $(this);
					if(tr.is("."+toggle.attr("id"))) tr.removeClass("status_hide");
					else tr.addClass("status_hide");
				});
				return false;
			}).html(function(){
				var toggle = $(this), tr = toggle.parent().next('table').find("tr."+toggle.attr("id")).size();
				return (tr) ? toggle.html()+" ["+tr+"]" : "";
			});

			
			var f = $("form#wish"), deg = 90;

			f.parent("div").css({"-webkit-perspective":"800px"});
			f.parent("div").css({"-moz-perspective":"800px"});
			f.parent("div").css({"-ms-perspective":"800px"});
			f.parent("div").css({"-o-perspective":"800px"});
			f.parent("div").css({"perspective":"800px"});
			
			var nyear_form = $("#nyear_form");
			if(nyear_form.is(".send") || nyear_form.is(".error") || nyear_form.is(".complete")){
				
				$("html,body").animate({"scrollTop":(nyear_form.offset().top-$(window).height()*0.6)});

			}
			
			function flyCSS(e,x,s){
				
				e.parent("div").css({"-webkit-perspective":"800px"});
				e.parent("div").css({"-moz-perspective":"800px"});
				e.parent("div").css({"-ms-perspective":"800px"});
				e.parent("div").css({"-o-perspective":"800px"});
				e.parent("div").css({"perspective":"800px"});
				
				e.css({"-webkit-transform":"perspective(800px) rotateX("+x+"deg) translateY(0%) scale("+s+")"}); 
				e.css({"-moz-transform":"perspective(800px) rotateX("+x+"deg) translateY(0%) scale("+s+")"}); 
				e.css({"-ms-transform":"perspective(800px) rotateX("+x+"deg) translateY(0%) scale("+s+")"}); 
				e.css({"-o-transform":"perspective(800px) rotateX("+x+"deg) translateY(0%) scale("+s+")"}); 
				e.css({"transform":"perspective(800px) rotateX("+x+"deg) translateY(0%) scale("+s+")"}); 
			}
			function flyAnimate(e,op,deg,delay,cbf){
				var d = delay||0;
				e.delay(d).animate({opacity:op,top:((deg>0)?"+="+deg:"-="+(deg=-1*deg))+"px"},{
					step:function(now,fx){
						flyCSS($(this),now,(deg-now)/deg);
					},
					complete: cbf,
					duration:'slow'
				},'linear');
			}
			
			function Validatr(value,name){
				var valid = true;
				if(value){
					if(name==="email") valid = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/.test(value.trim());
					if(name==="phone") valid = /^[\+\s]?((\s|\s?\-\s?)?[0-9]){1,3}(\s|\s?\(\s?)?((\s|\s?\-\s?)?[0-9]){2,5}(\s|\s?\)\s?)?((\s|\s?\-\s?)?[0-9]){5,9}$/.test(value.trim());
					if(name==="_nobot") valid = /^([0-9]){4}$/.test(value.trim());
				} else valid = false;
				return valid;
			}
			$("form#wish").each(function(i){
				var wishForm = $(this), wishWrapId = "wishwrap_"+i, wishTargetId = wishWrapId+"_target",
				messages = {
							name:"Представьтесь, пожалуйста",
							email:"Не корректный Email",
							text:"Не указано пожелание!",
							_nobot:"Укажите цифры",
							};
				wishForm.wrap('<div id="'+wishWrapId+'" />').before('<div id="'+wishTargetId+'" />');
				var wishWrap = $("#"+wishWrapId);
				wishForm.on('submit',function(e){
					var errors = 0;
					///var errors = [];
					wishForm.find('input, select, textarea').each(function(){
						var inp = $(this);
						if(inp.is('.error')){
							inp.removeClass('error');
							inp.next('i.error').remove();
						}
						if (inp.is('.required')){
							var name = inp.attr('name'), value = inp.val(), valid = Validatr(value,name);
							if(!valid){
								errors++;
								///errors.push(name);
								inp.addClass('error');
								if(messages[name]) inp.after('<i class="error">'+messages[name]+'</i>');
							}
						}
					});
					if(errors) {
						///alert(errors);
						return false;
					}
					else {
						var f = wishForm, deg = 90;
						if(!f.data("submit")){
							flyAnimate(f,.5,deg,0,function(){
								f.data("submit",true);
								f.submit()
							});
							e.preventDefault();
							return false;
						} else return;
					}
				});
			});
			
		})(jQuery);
		
		window.onload = function(){
			//canvas init
			var canvas = document.getElementById("canvas");
			var ctx = canvas.getContext("2d");
			//canvas dimensions
			var W = window.innerWidth;
			var H = window.innerHeight;
			canvas.width = W;
			canvas.height = H;
			//snowflake particles
			var mp = 25; //max particles
			var particles = [];
			for(var i = 0; i < mp; i++){
				particles.push({
					x: Math.random()*W, //x-coordinate
					y: Math.random()*H, //y-coordinate
					r: Math.random()*4+1, //radius
					d: Math.random()*mp //density
				})
			}
			//Lets draw the flakes
			function draw(){
				ctx.clearRect(0, 0, W, H);
				ctx.fillStyle = "rgba(255, 255, 255, 0.8)";
				ctx.beginPath();
				for(var i = 0; i < mp; i++){
					var p = particles[i];
					ctx.moveTo(p.x, p.y);
					ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, true);
				}
				ctx.fill();
				update();
			}
			//Function to move the snowflakes
			//angle will be an ongoing incremental flag. Sin and Cos functions will be applied to it to create vertical and horizontal movements of the flakes
			var angle = 0;
			function update(){
				angle += 0.01;
				for(var i = 0; i < mp; i++){
					var p = particles[i];
					//Updating X and Y coordinates
					//We will add 1 to the cos function to prevent negative values which will lead flakes to move upwards
					//Every particle has its own density which can be used to make the downward movement different for each flake
					//Lets make it more random by adding in the radius
					p.y += Math.cos(angle+p.d) + 1 + p.r/2;
					p.x += Math.sin(angle) * 2;
					//Sending flakes back from the top when it exits
					//Lets make it a bit more organic and let flakes enter from the left and right also.
					if(p.x > W+5 || p.x < -5 || p.y > H){
						if(i%3 > 0) particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d}; //66.67% of the flakes
						else{
							//If the flake is exitting from the right
							if(Math.sin(angle) > 0) particles[i] = {x: -5, y: Math.random()*H, r: p.r, d: p.d};//Enter from the left
							else particles[i] = {x: W+5, y: Math.random()*H, r: p.r, d: p.d}; //Enter from the right
						}
					}
				}
			}
			//animation loop
			setInterval(draw, 33);
		}
		</script>
	</body>
</html>