function Translit(txt, nourl){
	
	txt = txt.toLowerCase();
    var transl 	= [];
	
	transl['а']='a';
	transl['б']='b';
	transl['в']='v';
	transl['г']='g';
	transl['д']='d';
	transl['е']='e';
	transl['ё']='e';
	transl['ж']='zh';
	transl['з']='z';
	transl['и']='i';
	transl['й']='j';
	transl['к']='k';
	transl['л']='l';
	transl['м']='m';
	transl['н']='n';
	transl['о']='o';
	transl['п']='p';
	transl['р']='r';
	transl['с']='s';
	transl['т']='t';
	transl['у']='u';
	transl['ф']='f';
	transl['х']='h';
	transl['ц']='ts';
	transl['ч']='ch';
	transl['ш']='sh';
	transl['щ']='sch';
	transl['ъ']='';
	transl['ы']='y';
	transl['ь']='';
	transl['э']='e';
	transl['ю']='ju';
	transl['я']='ja';
	transl['і']='i';
	transl['є']='je';
	transl['ї']='ji';
	transl['ґ']='g';
	
    var ret = '';
	for(var i = 0; i < txt.length; i++){
		ret += (transl[txt[i]]) ? transl[txt[i]] : txt[i];
    }
	if(!nourl) {
		ret = ret.replace(/[^a-zA-Z0-9\s]/g,"");
		ret = ret.replace(/\s/g,'-');
	}
    return ret;
}

function SemCore(text, sortBy, ordrBy) {
	var s = text.replace(/([^а-яА-ЯA-Za-z0-9-]+)/g, '#').split('#');
	var a = [];
	var f = [];
	var ret = [];
	var wordOb = [];
	var sortOb = [];
	var sb = sortBy && sortBy < 3 ? sortBy : 0;
	var ob = ordrBy ? 1 : 0;

	function uniqa(ar) {
		var t = [];
		for (i = 0; i < ar.length; i++)
			if (t.indexOf(ar[i]) == -1) t.push(ar[i]);
		return t;
	}

	function findr(vl, ar) {
		var j = 0;
		ar.forEach(function(el, ix) {
			if (vl == el) j++;
		});
		return j;
	}

	function cutEl(el) {
		return (el.length > 5) ? el.slice(0, 4) : el;
	}
	s.forEach(function(el, ix) {
		el = el.toLowerCase();
		if (el && el.length > 3) {
			a.push(el);
			f.push(cutEl(el))
		}
	});
	if (sortBy < 2) {
		uniqa(a).forEach(function(el, ix) {
			wordOb.push([el, findr(el, a), findr(cutEl(el), f)]);
		});
	} else {
		var nf = uniqa(f);
		nf.forEach(function(el, ix) {
			var elem = a[f.indexOf(el)];
			wordOb.push([elem, findr(elem, a), findr(cutEl(el), f)]);
		});
	}
	sortOb = wordOb.sort(function(a, b) {
		return ob ? ((a[sb] < b[sb]) ? 1 : ((a[sb] > b[sb]) ? -1 : 0)) : ((
			a[sb] > b[sb]) ? 1 : ((a[sb] < b[sb]) ? -1 : 0));
	});
	sortOb.forEach(function(el, ix) {
		ret.push(el[0]);
	});
	return ret.slice(0,20);
}