//J(document).ready(function(J) {
var J = jQuery.noConflict();
jQuery(function(J){
	J('a.pay').on('click',function(){
		J('#pay').show();
	});	
	
	var dialog = J("#pay-dialog");
	J(".show-dialog").on("click",function(){
		if(dialog.css('display')=='none') dialog.css('display','block');
		dialog.attr('open');
		var productId = J(this).data('product');
		if(productId){
			dialog.data('product',productId);
			J("input#product_id",dialog).val(productId);
		}
	});;
	J(".close-dialog").on("click",function(){
		if(dialog.css('display')=='block') dialog.css('display','none');
		dialog.removeAttr('open');
		if(dialog.data('product')){
			J("input#product_id",dialog).val('');
			dialog.data('product',null);
		}
	});
						

	J('.iiclose').on('click',function(){
		J(this).parents('.iiwindow').hide();
	});
	J('.iiwindow').on('click',function(e){
		if(e.target == this) J(this).hide();
	});
	
	J('.toggle').on('click',function(){
		J(this).toggleClass('toggleActive').next().toggle();
	});
	
	function Validatr(value,name){
		var valid = true;
		if(value){
			if(name==="email") valid = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/.test(value.trim());;
			if(name==="phone") valid = /^[\+\s]?((\s|\s?\-\s?)?[0-9]){1,3}(\s|\s?\(\s?)?((\s|\s?\-\s?)?[0-9]){3,5}(\s|\s?\)\s?)?((\s|\s?\-\s?)?[0-9]){5,9}$/.test(value.trim());;
		} else valid = false;
		return valid;
	}
	J("form.auth").each(function(i){
		var authForm = J(this), authWrapId = "authwrap_"+i, authTargetId = authWrapId+"_target",
		messages = {
					name:"Пожалуйста, укажите имя",
					email:"Пожалуйста, введите корректный email",
					phone:"Пожалуйста, укажите телефон полностью (c кодом страны и города), в понятном формате. Пример:+7 (987) 654-32-10",
					_nobot:"Укажите цифры",
					};
		if(authForm.is("#rgstrform") && J('.iteam-content').is('#pay_content')){
			//authForm.addClass('nosubmit');
		}
		authForm.wrap('<div id="'+authWrapId+'" />').before('<div id="'+authTargetId+'" />');
		var authWrap = J("#"+authWrapId);
		authForm.on('submit',function(){
			
			if(authForm.is(".nosubmit")){
				authForm.removeClass('nosubmit');
				return false;
			}else{
				var errors = 0;
				/*var errors = [];*/
				authForm.find('input, select, textarea').each(function(){
					var inp = J(this);
					if(inp.is('.error')){
						inp.removeClass('error');
						inp.next('i.error').remove();
					}
					if (inp.is('.required')){
						var name = inp.attr('rel'), value = inp.val(), valid = Validatr(value,name);
						if(!valid){
							errors++;
							/*errors.push(name);*/
							inp.addClass('error');
							
							if(inp.attr('data-required')) inp.after('<i class="error">'+inp.attr('data-required')+'</i>');
							else if(messages[name]) inp.after('<i class="error">'+messages[name]+'</i>');
						}
					}
				});
				if(errors) {
					/*alert(errors);*/
					return false;
				}			
			}
		});
	}).css({"opacity":"1"});
	
	J("form#invoice").each(function(i){
		var invoiceForm = J(this),
			messages = {
						company:"Пожалуйста, укажите название компании",
						details:"Пожалуйста, укажите форму собственности"
						};
		invoiceForm.on('submit',function(){
			var errors = 0;
			invoiceForm.find('input, select, textarea').each(function(){
				var inp = J(this);
				if(inp.is('.error')){
					inp.removeClass('error');
					inp.next('i.error').remove();
				}
				if (inp.is('.required')){
					var name = inp.attr('name'), value = inp.val(), valid = Validatr(value,name);
					if(!valid){
						errors++;
						/*errors.push(name);*/
						inp.addClass('error');
						
						if(inp.attr('data-required')) inp.after('<i class="error">'+inp.attr('data-required')+'</i>');
						else if(messages[name]) inp.after('<i class="error">'+messages[name]+'</i>');
					}
				}
			});
			if(errors) {/*alert(errors);*/
				invoiceForm.addClass('nosubmit');
				return false;
			}
			else {
				if(invoiceForm.is(".nosubmit")) invoiceForm.removeClass('nosubmit');
				return;
			}		
		});
	});

	var modalInit = false;
	function ModalWinInit(){
		modalWin = '<div id="modalw" class="modalwrap" style="display:none;position:fixed;top:0;left:0;padding:0;margin:0;width:100%;height:100%;background-color:rgba(64,64,64,0.8);overflow:hidden;">';
		modalWin += '	<i class="close" style="position:absolute;right:32px;top:0;color:white;font:32px/1 monospace;cursor:pointer;">&#10005;</i>';
		modalWin += '	<div class="modalwin" style="padding:32px;position:relative;">';
		modalWin += '		<div class="modalbox">';
		modalWin += '		</div>';
		modalWin += '	</div>';
		modalWin += '</div>';
		J("body").append(modalWin);
		modalInit = true;
		J("#modalw").on("click",function(e){
			if(!J(e.target).closest(".modalbox>*").length) J(this).fadeOut(200).children(".modalwin").children(".modalbox").html("");
			e.stopPropagation();
		});
		return modalInit;
	}
	modalInit = ModalWinInit();
	function ModalBoxHtml(modalBoxContent){
		if(!modalInit) modalInit = ModalWinInit();
		var modalWin = J("#modalw");
		var modalBox = modalWin.children(".modalwin").children(".modalbox");
		modalBox.html("Загрузка...");
		if(modalBoxContent){
			modalBox.html(modalBoxContent);
			modalWin.show();
		}
	}
	function FileBoxHtml(file,opt){
		var mimes = {"mp4":"mp4","ogg":"ogg","webm":"webm","flv":"flv"};
		var exts = {"mp4":"mp4","ogv":"ogg","webm":"webm","flv":"flv"};
		var fileBox = '';
		var ext = false;
		if(file){
			ext = (ext)?ext:file.split('.').pop().split('?')[0].split('#')[0];
		} else ext = false;
		if(ext) opt.mime = mimes[ext] || exts[ext] || false;
		fileBox = (opt.mime) ? VidooBoxHtml(file,opt) : DocBoxHtml(file,opt);
		return (fileBox)?fileBox:false;
	}
	function VidooBoxHtml(file,opt){
		var vidooBox = '';
		vidooBox += '<div class="filebox" style="width:'+opt.width+'px;height:'+opt.height+'px;">';
		if(opt.mime==="mp4"||opt.mime==="ogg"||opt.mime==="webm"){
			vidooBox += '	<video width="'+opt.width+'" height="'+opt.height+'" controls>';
			vidooBox += '		<source src="'+file+'" type="video/'+opt.mime+'" />';
			if(opt.mime==="mp4"){
				vidooBox += '			<object width="'+opt.width+'" height="'+opt.height+'" type="application/x-shockwave-flash" data="/@Body/c/inc/vidoo/player.swf?movie='+file+'">';
				vidooBox += '				<param name="movie" value="/@Body/c/inc/vidoo/player.swf" />';
				vidooBox += '				<param name="allowfullscreen" value="true" />';
				vidooBox += '				<param name="flashvars" value="movie='+file+'&image=/@Body/c/inc/vidoo/player.png" />';
				vidooBox += '			</object>';
			} else {
				vidooBox += '			<p><i>Данное видео не поддерживается нашим плеером</i></p>';
			}
			vidooBox += '	</video>';
		} else if(opt.mime==="flv") {
			vidooBox += '	<object width="'+opt.width+'" height="'+opt.height+'" type="application/x-shockwave-flash" data="/@Body/c/inc/vidoo/player.swf?movie='+file+'">';
			vidooBox += '		<param name="movie" value="/@Body/c/inc/vidoo/player.swf" />';
			vidooBox += '		<param name="allowfullscreen" value="true" />';
			vidooBox += '		<param name="flashvars" value="movie='+file+'&image=/@Body/c/inc/vidoo/player.png" />';
			vidooBox += '	</object>';
		} else {
			vidooBox += '	<p><i>Данное видео не поддерживается нашим плеером</i></p>';
		}
		vidooBox += '<p><a download target="_blank" href="'+file+'">Скачать</a></p>';
		vidooBox += '</div>';
		
		return (vidooBox)?vidooBox:false;
	}
	function PrintIframe() {
		frames["fileboxframe"].focus();
		frames["fileboxframe"].print();
	}
	function returnFalse() {
		return false;
	}
	J(".printFile").on("click",function() {
		var file = J(this).attr("href");
		var newWin = window.open(file,"printFile","width=800,height=800,resizable=yes,scrollbars=yes,status=yes");
		newWin.focus();
		if(newWin.print()) newWin.close();
		return false;
	});
	function DocBoxHtml(file,opt){
		var docBox = '';
		var ext = false;
		if(file){
			docBox += '<div class="filebox" style="width:'+opt.width+'px;height:'+opt.height+'px;">';
			docBox += '	<iframe width="'+opt.width+'" height="'+opt.height+'" src="https://drive.google.com/viewerng/viewer?embedded=true&url='+file+'">';
			docBox += '	</iframe>';
			docBox += '<p><a download target="_blank" href="'+file+'">Скачать</a></p>';
			docBox += '</div>';
		}
		return (docBox)?docBox:false;
	}
	function YtbBoxHtml(file,opt){
		var docBox = '';
		var ext = false;
		if(file){
			docBox += '<div class="filebox" style="width:'+opt.width+'px;height:'+opt.height+'px;">';
			docBox += '	<iframe allowfullscreen="" frameborder="0" width="'+opt.width+'" height="'+opt.height+'" src="'+file+'?feature=player_embedded">';
			docBox += '	</iframe>';
			//docBox += '<p><a download target="_blank" href="'+file+'">Скачать</a></p>';
			docBox += '</div>';
		}
		return (docBox)?docBox:false;
	}
	J(".modalFile").each(function(i){
		var modalFile = J(this);
		modalFile.on("click",function() {
			var file = modalFile.attr("href");
			var opt = modalFile.data() || false;
			
			opt.mime = (opt.mime)?opt.mime:false;
			opt.width = (opt.width)?opt.width:(J(window).width()-80)||720;
			opt.height = (opt.height)?opt.height:(J(window).height()-80)||480;

			ModalBoxHtml(FileBoxHtml(file,opt));
			return false;
		});
	});
	J(".modalDoc").each(function(i){
		var modalDoc = J(this);
		modalDoc.on("click",function() {
			var file = modalDoc.attr("href");
			var opt = modalDoc.data() || false;
			
			opt.mime = (opt.mime)?opt.mime:false;
			opt.width = (opt.width)?opt.width:(J(window).width()-80)||720;
			opt.height = (opt.height)?opt.height:(J(window).height()-80)||480;

			ModalBoxHtml(DocBoxHtml(file,opt));
			return false;
		});
	});
	J(".modalYtb").each(function(i){
		var modalYtb = J(this);
		modalYtb.on("click",function() {
			var file = modalYtb.attr("href");
			var opt = modalYtb.data() || false;
			
			opt.mime = (opt.mime)?opt.mime:false;
			opt.width = (opt.width)?opt.width:(J(window).width()-80)||720;
			opt.height = (opt.height)?opt.height:(J(window).height()-80)||480;

			ModalBoxHtml(YtbBoxHtml(file,opt));
			return false;
		});
	});
	
	J('#footer').on('dblclick',function(e){J('#debug').show();e.preventDefault();});
	J('#debug').on('dblclick',function(e){J(this).hide();e.stopPropagation();});
	
	//J('.unslider').unslider();
	
	J('.closer').on('click',function(e){
		var parent = (J(this).attr('href')) ? J(J(this).attr('href')) : ((J(this).data('parent')) ? J(J(this).data('parent')) : J(this).parent());
		parent.hide();
		e.preventDefault();
	});
	
	var closer = '<i class="close">&#10005;</i>';
	J('.alert').hide().each(function(){ var alrt = J(this); if(alrt.html()) alrt.fadeIn('slow').append(closer).delay(20000).fadeOut('slow'); });
	J('.close').on('click',function(){ J(this).parent().hide(); });
	
	J('.toggle_parent').on('click',function(e){
		var parent = (J(this).attr('href')) ? J(J(this).attr('href')) : ((J(this).data('parent')) ? J(J(this).data('parent')) : J(this).next());
		parent.toggle();
		e.preventDefault();
	});
	

	J("#banner-form").on('submit', function(e) {
		
		e.preventDefault();
		
		var win = window,
			doc = document,
			form = this,
			act = form.getAttribute("action"),
			w = 0,
			h = 0,
			popW = 920,
			popH = 680,
			SendWin;

		if (doc.all || doc.layers) {
			w = screen.availWidth;
			h = screen.availHeight;
		}
		if(w==0){
			var el = doc.documentElement,
				ge = doc.getElementsByTagName('body')[0];
				
			w = win.innerWidth || el.clientWidth || ge.clientWidth;
			h = win.innerHeight|| el.clientHeight|| ge.clientHeight;
		}

		var leftPos = (w>0 && w>popW)?(w-popW)/2:0,
			topPos = (h>0 && h>popH)?(h-popH)/2:0;

		SendWin = win.open(act, 'ActionForm', 'width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos + ',resizable=yes,scrollbars=yes');
		if (navigator.appName=='Netscape') { SendWin.focus(); }

		form.setAttribute("target", "ActionForm");
		form.submit();
		
	});	

});

function SendForm(act,pw,ph) {
	
	var w = 640, h = 480;
	var popW = 920, popH = 680, leftPos = 20, topPos = 20;
	var wid = (act.split('=')[1]).split('&')[0];

	if (document.all || document.layers) {
		w = screen.availWidth;
		h = screen.availHeight;
	}
	
	var SendWin = window.open(act + '&navagator=ie', 'Action', 'width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos + ',resizable=yes,scrollbars=yes');
	
}