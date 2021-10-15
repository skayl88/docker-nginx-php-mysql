(function(){

var d = document, k = ['',''], grecaptcha_token = '';
var jsloads = d.getElementsByTagName('script');
var currentScript = jsloads[jsloads.length-1].src;
var currentDir = currentScript.replace(/[^\/]+$/,'');
var msgOk = 'Ваше сообщение успешно отправлено.';
var msgEr = 'Не удалось отправить данные...';
var msgErrReq = 'Пожалуйста, заполните обязательное поле';
var msgErrMail = 'E-mail должен быть в формате ____@___.__';
var msgErrTel = 'Телефон должен быть в формате (xxx) xxx-xx-xx';
var isFormData = (typeof FormData == 'function');
var isIE8 = false;
var control_msg = null;

function formsInit(ev){
	var n;
	grecaptcha3Init();
	for (n = 0; n < d.forms.length; n++) {
		if (isIE8) d.forms[n].addEventListener('submit',ajaxFormSubmit); // IE8
		if (!isFormData) placeholderSet(d.forms[n], false); // IE9-
	}
	ajax({'url':currentDir+'form.php', 'method':'POST', 'send':'k=rg9OItWLXx', 'onload':function(data){
		if (data) eval("k = "+data+";");
	}})
}

function ajaxFormSubmit(ev) {
	var a, b, n, i, ds = '', data = {}, f = ev.target, m, er, fid, dn, dv;
	if (er = !formValidate(f)) {
		ev.preventDefault(); return;
	}
	if (f.className.indexOf('cform') < 0 && f.className.indexOf('ajax') < 0) return;
	m = f.getAttribute('method') || 'POST';
	a = f.action;
	if (f.className.indexOf('cform') >= 0 && typeof currentDir == 'string') {
		a = currentDir + 'form.php';
		m = 'POST';
	};
	if (f.querySelector('input[type="file"]')) f.setAttribute('enctype','multipart/form-data');
	if (f.className.indexOf('cform') >= 0) {
		for (n = 0; n < f.attributes.length; n++) {
			if (f.attributes[n].name.indexOf('data-') != 0) continue;
			data[dn = f.attributes[n].name.replace('data-','')] = dv = f.attributes[n].value;
			if (dn == 'include' || dn == 'attach' || dn == 'userto' || dn == 'useratt') dv = aRealpath(dv,true);
			ds += (ds ? '&' : '') + dn + '=' + dv; 
		}
		if (fid = f.getAttribute('id')) ds += (ds ? '&' : '') + 'formid=' + fid;
		if (k.length == 3) ds += (ds ? '&' : '') + k[0] + '=' + k[1] + '&sid=' + k[2];
		i = d.createElement('INPUT');
		i.name = '_formdata_'; i.value = ds; i.type = 'hidden';
		f.appendChild(i);
	}
	f.className += ' sender';
	if (isFormData) ajax({'url':a, 'method':m, 'send':new FormData(f), 'onload':formOnLoad, 'target':f});
	else iframeSend({'url':a, 'method':m, 'form':f, 'onload':formOnLoad});
	ev.preventDefault();
}

function formOnLoad(resp) {
	var ok = this.target.getAttribute('data-msgok') || msgOk,
	er = this.responseJson.error ? this.responseJson.error : this.target.getAttribute('data-msgerr') || msgEr,
	sendErr = (this.responseJson.error > '' || this.status != '200'),
	msg = sendErr ? '<div class="send-er">'+er+'</div>' : '<div class="send-ok"></div>' + ok,
	msgCustom = (ok.indexOf('#') == 0) ? document.getElementById(ok.substr(1)) : null,
	mb = this.target.querySelector('.form-message-box'),
	redirect = this.target.getAttribute('data-redirect') || '',
	errorbox = null, errorbox_id = this.target.getAttribute('data-errorbox') || '';
	if (!mb) {
		this.target.appendChild(mb = d.createElement('DIV'));
		mb.className = 'form-message-box';
	}
	if (this.responseJson.k instanceof Array) k = this.esponseJson.k;
	this.target.className = this.target.className.replace(' sender','') + (sendErr ? ' error':' response'); 
	mb.innerHTML = ''; 
	this.target.removeChild(this.target['_formdata_']);
	if (this.responseJson.response) {
		console.log(this.responseJson.response);
		this.target.ajaxResponse = this.responseJson.response;
	}
	if (sendErr) {
		if (errorbox && !msgCustom) errorbox.innerHTML = msg;
		if (errorbox && msgCustom) errorbox.appendChild(msgCustom);
		if (!errorbox) mb.innerHTML = msg; else errorbox.style.display = 'block';
		console.error(this.responseJson.error ? this.responseJson.error : 'status: '+this.status);
		trigger(this.target,'error');
	}
	else {
		if (!redirect && msgCustom) { mb.appendChild(msgCustom); msgCustom.style.display = 'block'; }
		if (!redirect && !msgCustom) mb.innerHTML = msg;
		trigger(this.target,'success');
		if (redirect) location.href = redirect;
	}
	if (this.responseJson.response) this.target.ajaxResponse = null;
};

function ajax(p) {
	var xhr = new XMLHttpRequest();
	if (typeof p.target != 'undefined') xhr.target = p.target;
	if (!p.method) p.method = 'GET'; else p.method = p.method.toUpperCase();
	if (p.method == 'GET' && p.send) if (p.send.length > 0) p.url += ((p.url.indexOf('?')>0) ? '&' : '?') + p.send;
	xhr.open(p.method, p.url, true);
	if (p.method == 'POST' && typeof p.send == 'string') xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	if (p.onload) xhr.onreadystatechange = function(){
		if (this.readyState != 4) return;
		if (/^\{[\s\S]+?\}$/.test(xhr.responseText)) eval("xhr.responseJson = "+xhr.responseText+";");
		else xhr.responseJson = {};
		p.onload.call(xhr,xhr.responseText);
	};
	xhr.send(p.send);
}

function iframeSend(p) {
	var ifr = d.createElement('IFRAME');
	var a = p.form.action, t = p.form.target;
	ifr.name = p.form.target = 'hidden_frame_' + (new Date().getTime());
	ifr.src = "javascript:''";
	p.form['_formdata_'].value += '&hidden_frame=1';
	ifr.style.display = 'none';
	d.body.appendChild(ifr);
	if (p.url) p.form.action = p.url;
	if (p.method) p.form.method = p.method;
	window['formIframeOnLoad'] = function(resp) {
		var xhr = {'readyState':4, 'status':'200', 'statusText':'OK', 'responseText':'', 'responseJson':resp, 'target':p.form}
		p.form.action = a; p.form.target = t;
		d.body.removeChild(ifr);
		if (typeof p.onload == 'function') p.onload.call(xhr,resp);
	}
	p.form.submit();
}

function formValidate(f) {
	var i, v, e, p, pl = [], t, tt;
	for (i = 0; i < f.elements.length; i++) {
		e = f.elements[i]; tt = e.title;
		t = e.getAttribute('type'); p = e.getAttribute('placeholder');
		if (e.tagName == 'FIELDSET' || e.tagName == 'BUTTON' || t == 'button' || t == 'submit' || t == 'reset') continue;
		if (p && e.value == p && !isFormData) e.value = '';
		v = e.value.replace(/^\s+|\s+$/g,'');
		if (t == 'email' && v > '') if (!/^[a-z,A-Z,0-9][a-z,A-Z,0-9\._-]*@[a-z,A-Z,0-9\._-]+$/.test(v)) {
			controlMsg(e, tt?tt:msgErrMail); return false;
		}
		
		if (e.getAttribute('required') !== null && v == '') {
			controlMsg(e, tt?tt:msgErrReq); return false;
		}
		e.className = e.className.replace(' invalid','');
		if (p > '' && p != null && e.value == p && e.className.indexOf(' empty') >= 0) pl.push(e);
	}
	return true;
}
function controlMsg(e,msg) {
	var r = e.getBoundingClientRect(),
		sTop = (window.pageYOffset || d.documentElement.scrollTop || d.body.scrollTop),
		sLeft = (window.pageXOffset || d.documentElement.scrollLeft || d.body.scrollLeft),
		pos = {'top': r.top + sTop + e.offsetHeight - 1, 'left': r.left + sLeft};
	if (!control_msg) {
		control_msg = d.createElement('DIV');
		control_msg.className = 'controlMsg';
		control_msg.innerHTML = msg;
		control_msg.style.top = pos.top + 'px';
		control_msg.style.left = pos.left + 'px';
	}
	d.body.appendChild(control_msg);
	if (e.className.indexOf(' invalid') < 0) e.className += ' invalid';
	e.focus();
	if (!isFormData) placeholderSet(e.form,false);
}
function placeholderSet(f,clear) {
	for (var i = 0; i < f.elements.length; i++) inpOnPlh(f.elements[i],clear);
}
function inpOnPlh(e,clear) {
	var p = e.getAttribute('placeholder');
	if (!p || p == null) return;
	if (clear && e.value == p) {
		e.value = ''; e.className = e.className.replace(' empty','');
	}
	if (!clear && (!e.value.replace(/^\s+|\s+$/g,'') || e.value == p)) {
		e.value = p; e.className += ' empty';
	}
}
function realpath(link,sfx) {
	var a;
	if (!link || link.substr(0,1) == '/' || link.indexOf('http://')==0) return link;
	if (sfx) if (!/\.[a-z]+$/.test(link)) return link;
	a = d.createElement('A');
	a.href = link;
	return a.href.replace(location.protocol+'//'+location.hostname,'');
}
function aRealpath(s,sfx) {
	var a = s.split(','), l = '', i;
	for (i = 0; i < a.length; i++) {
		l += (l ? ',' : '') + realpath(a[i],sfx);
	}
	return l;
}
function trigger(el,ev) {
	if (typeof el['on'+ev] == 'function') el['on'+ev]();
	if (typeof el.getAttribute('on'+ev) == 'string') eval(el.getAttribute('on'+ev));
	if (!isIE8) { 
		event = document.createEvent("Event");
		event.initEvent(ev,true,true); 
		el.dispatchEvent(event);
	}
}
function grecaptcha3Init(){
	var r = /https:\/\/www.google.com\/recaptcha\/api\.js\?render=([^&]+)/;
	var j = d.getElementsByTagName('script'), key = '', n, l;
	for (n = 0; n < j.length; n++) {
		if (!key) if (r.test(j[n].src)) key = RegExp.$1;
	}
	if (key && typeof grecaptcha != 'undefined') grecaptcha.ready(function() {
      grecaptcha.execute(key, {action: 'homepage'}).then(function(token) {
         l = document.querySelectorAll('form input[name="recaptcha-token"]');
		 for (n = 0; n < l.length; n++) {
			l[n].value = token; l[n].name = 'g-recaptcha-response';
		 }
      });
  });
}

if (!window.addEventListener && window.attachEvent) {
	isIE8 = true;
	function ie8EvAdd(t,h) {
		if (this.stopImPr) return;
		var self = this, w2, w = function(e){ 
			e.currentTarget = self;
			e.target = (t == 'DOMContentLoaded') ? d : e.srcElement;
			h.call(self, e);
		}
		if (t == 'DOMContentLoaded') {
			w2 = function(e){
				if (d.readyState == 'complete') w(e);
			}
			if (d.readyState == 'complete') {
				var e = new Event(); e.srcElement = d; w2(e);
			} else d.attachEvent('onreadystatechange',w2);
		} else this.attachEvent('on'+t,w);
		return this;
	}
	Event.prototype.preventDefault = function(){this.returnValue = false};
	window.constructor.prototype.addEventListener = d.constructor.prototype.addEventListener = Element.prototype.addEventListener = ie8EvAdd;
}

if (d.readyState == 'loading' || isIE8) d.addEventListener('DOMContentLoaded',formsInit); else formsInit();
if (!isIE8) d.addEventListener('submit',ajaxFormSubmit);
d.addEventListener('click', function(ev){
	if (control_msg === null || ev.target.className == 'controlMsg') return;
	d.body.removeChild(control_msg);
	control_msg = null;
});
d.addEventListener('focusin',function(ev){
	if (ev.target.tagName == 'INPUT' || ev.target.tagName == 'TEXTAREA' && !isFormData) inpOnPlh(ev.target,true);
	if ((ev.target.tagName == 'INPUT' || ev.target.tagName == 'TEXTAREA') && ev.target.parentElement.className.indexOf('frow') >= 0 && ev.target.parentElement.className.indexOf(' focus') < 0) ev.target.parentElement.className += ' focus';
});
d.addEventListener('focusout',function(ev){
	if (ev.target.tagName == 'INPUT' || ev.target.tagName == 'TEXTAREA' && !isFormData) inpOnPlh(ev.target,false);
	if ((ev.target.tagName == 'INPUT' || ev.target.tagName == 'TEXTAREA') && ev.target.parentElement.className.indexOf('frow') >= 0 && ev.target.parentElement.className.indexOf(' focus') >= 0) ev.target.parentElement.className = ev.target.parentElement.className.replace(' focus','');
});
d.addEventListener('keyup',function(ev){
	if ((ev.target.tagName != 'INPUT' && ev.target.tagName != 'TEXTAREA') || ev.target.parentElement.className.indexOf('frow') < 0) return;
	if (ev.target.value != '' && ev.target.parentElement.className.indexOf(' not-empty') < 0) ev.target.parentElement.className = ev.target.parentElement.className.replace(' empty','') + ' not-empty';
	if (ev.target.value == '' && ev.target.parentElement.className.indexOf(' not-empty') >= 0) ev.target.parentElement.className = ev.target.parentElement.className.replace(' not-empty','') + ' empty';
});
d.addEventListener('keypress',function(ev){
	if (control_msg != null) {d.body.removeChild(control_msg); control_msg = null; }
	ev.target.className = ev.target.className.replace(' invalid','');
})
})()