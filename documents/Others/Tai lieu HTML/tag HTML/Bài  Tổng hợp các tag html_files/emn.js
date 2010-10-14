window.onerror = _emEorrHandler;
function _emEorrHandler() {
}
function EMN(ns){
    
	 ns = typeof(ns) == 'undefined' ? '':ns;
	//private, static
	 
	var d = document;
	var n = navigator;
	var w = window;
	var detectFlash = function(){var axo; if (n.plugins["Shockwave Flash"] || n.plugins["Shockwave Flash 2.0"]) {var swVer2 = n.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";var desc =  n.plugins["Shockwave Flash" + swVer2].description;var desc_split = desc.split(" ");var version = parseInt(desc_split[2]);return version >= 6?1:0;} else {var hasObject = 0;try {axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");hasObject = 1;} catch (e) {}if (hasObject == 0) {try {axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");axo.AllowScriptAccess = "always";hasObject = 1;} catch (e) {}}return hasObject;}}
	var size = typeof( w.innerWidth ) == 'number'?w:(d.documentElement && ( d.documentElement.clientWidth || d.documentElement.clientHeight )?d.documentElement:(d.body && ( d.body.clientWidth || d.body.clientHeight ) ?d.body:null)) ;
	var encode64 = function(inp){var key = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";var chr1, chr2, chr3, enc3, enc4, i = 0, out = "";while (i < inp.length) {chr1 = inp.charCodeAt(i++);if (chr1 > 127) {chr1 = 88;}chr2 = inp.charCodeAt(i++);if (chr2 > 127) {chr2 = 88;}chr3 = inp.charCodeAt(i++);if (chr3 > 127) {chr3 = 88;}if (isNaN(chr3)) {enc4 = 64;chr3 = 0;} else {enc4 = chr3 & 63;}if (isNaN(chr2)) {enc3 = 64;chr2 = 0;} else {enc3 = ((chr2 << 2) | (chr3 >> 6)) & 63;}out += key.charAt((chr1 >> 2) & 63)+key.charAt(((chr1 << 4) | (chr2 >> 4)) & 63)+key.charAt(enc3) + key.charAt(enc4);}return encodeURIComponent(out);}
	
	//methods
	this.getCookie = function(c_name){if (d.cookie.length > 0) {var c_start = d.cookie.indexOf(c_name + "=");if (c_start != -1) {c_start = c_start + c_name.length + 1;var c_end = d.cookie.indexOf(";", c_start);if (c_end == -1) {c_end = d.cookie.length;}return unescape(d.cookie.substring(c_start, c_end));}}return typeof(arguments[1])=='undefined'?'':arguments[1];}
	
	//browser related
	this.width = function() {return size == null ? 0 : size == w ? size.innerWidth:size.clientWidth;}
	this.height = function() {return size == null ? 0 : size == w ? size.innerHeight:size.clientHeight;}

	this._hasFlash = detectFlash();
	this._isIE =  n.appVersion.indexOf("MSIE") != -1;
	this._isWin = n.appVersion.toLowerCase().indexOf("win") != -1;
	this._isOpera = n.userAgent.indexOf("Opera") != -1;
        this._isFF = n.userAgent.indexOf("Firefox") != -1;
 
	//env
	this._emVersion = 'v3';
        this._emsvVersion = 'v3';
        this._emSchema = location.protocol.indexOf('https') > -1 ? 'https://' : 'http://';
        this._emHost = this._emSchema+'www3.effectivemeasure.net';
        this._emCdnHost = this._emSchema+'www3-cdn.effectivemeasure.net';
	this._emsvHost = this._emSchema +'survey-b.effectivemeasure.net';
	this._emsvCdnHost = this._emSchema +'survey-cdn.effectivemeasure.net';

 
	this._inFrame = w!=w.top;
	this._page =  this._inFrame ? d.referrer:d.location.href;
	 
	//network specific variables
	this._surveySwitch = typeof (w._em_allow_invite) == "undefined" ? 0 : w._em_allow_invite == 1 ? 1 : 0;
	this._networkID = typeof (w.NetworkID) == "undefined" ? 0 : parseInt(w.NetworkID);
	this._adSpotID = typeof (w.AdSpotID) == "undefined" ? 0 : w.AdSpotID;
	 
	this._optedOut = this.getCookie('_em_opt_out',0); 
	this._hlLoaded = 0;

	this.getSwfHtml  = function(){var i=0;var args = arguments;var embedAttrs = new Object();var params = new Object();var objAttrs = new Object();for ( i = 0; i < args.length; i = i + 2) {var currArg = args[i].toLowerCase();switch (currArg) {case "src":embedAttrs["src"] = args[i + 1];params['movie'] = args[i + 1];break;case "id":case "width":case "height":case "class":case "name":embedAttrs[args[i]] = objAttrs[args[i]] = args[i + 1];break;default:embedAttrs[args[i]] = params[args[i]] = args[i + 1];}}objAttrs["classid"] = "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000";objAttrs["type"] = embedAttrs["type"] = "application/x-shockwave-flash";embedAttrs["wmode"] = params["wmode"] = "transparent";embedAttrs["allowScriptAccess"] = params["allowScriptAccess"] = "always";embedAttrs["quality"] = params["quality"] = "high";embedAttrs["align"] = objAttrs["align"] = "middle";var str = '';if (this._isIE && this._isWin && !this._isOpera) {str += '<object ';for ( i in objAttrs){str += i + '="' + objAttrs[i] + '" ';}str += '>';for (i in params){str += '<param name="' + i + '" value="' + params[i] + '" /> ';}str += '</object>';} else {str += '<embed ';for ( i in embedAttrs){str += i + '="' + embedAttrs[i] + '" ';}str += '> </embed>';}return str;}
	
	this.getStage = function(){
		return d.getElementById('_em_stage_'+ns);
	}
	
	
	this.loadEmnHl = function(vars){
		if(!this._optedOut && !this._hlLoaded && this._hasFlash){
			var emsrc = this._emCdnHost+ '/'+this._emVersion + "/emn.swf";
			vars = vars + '&ns='+ns;
			var stage = d.createElement("div");
			stage.setAttribute('id', '_em_stage_'+ns);
                        stage.style.display = 'block';
                        stage.style.position = 'absolute';
                        stage.style.width = '1px';
                        stage.style.height = '1px';
			
			stage.innerHTML = this.getSwfHtml("src", emsrc, "width", "1", "height", "1", "id", "_em_hilex"+ns,  "name", "_em_hilex"+ns,  "flashVars", vars);		
			d.body.insertBefore(stage, d.body.firstChild);
			this._hlLoaded = 1;
			
		}
		return this;
	}
	
	this.exe = function(){
		var env = new Object();
                var x;
		env._em_allow_invite = this._surveySwitch ;
		env._em_network_id = this._networkID;
		env._em_adslot_id = this._adSpotID;
		
		env.ns = ns;
		var appending = '';
		for (x in env){appending += x+'='+env[x]+'&';}
		
		var _em_page = this._page;
		_em_page += _em_page.indexOf('?') < 0 ? '?':'&';
		_em_page += appending;
 
		
		var param = new Object();
		var temp=this._page.split('/');
		param.emHost =this._emHost + '/'+this._emVersion;
		param.ns =ns;
		param.pageURL =encode64 (_em_page);
		param.pageHost =temp[2];
		var paramStr = '';
		for (x in param){paramStr += x+'='+param[x]+'&';}
		if(!this._inFrame){
			document.write('<iframe id="_em_inv_frame_'+ns+'" frameborder="0" style="display:none; border:0; padding: 0; height:0px; width:0px" ></iframe>');
		}
		this.loadEmnHl(paramStr);
	}
	
	this.loadInvitation = function(idStr,  isTest, domain){
		 
		var myW = typeof(w._em_width) == 'undefined' ? (this._inFrame? this.width():0): w._em_width;//allow user w and h specification
		var myH = typeof(w._em_height) == 'undefined' ? (this._inFrame? this.height():0):w._em_height;
		  
                var x;
 

                var p = new Object();
                
                p.ids = idStr;
                p.test = isTest;
                p.domain = domain;
                p.w=myW;
                p.h=myH;
                p.ns = ns;
                p.version = this._emsvVersion;
                p.ff = this._isFF?1:0;
                p.host = encode64(this._emsvHost);
                p.cdnHost = encode64(this._emsvCdnHost);


		var invUrl = this._emsvHost+'/'+this._emsvVersion+'/emnsv_invite?';
                for (x in p){invUrl += x+'='+p[x]+'&';}


		if(this._inFrame){
			location.href = invUrl;
		}else{
			 
			var ef = d.getElementById('_em_inv_frame_'+ns);
		 
			if(ef){
				 
				ef.style.width = myW+'px';
				ef.style.height = myH+'px';
                                ef.style.display = 'block';
                                ef.style.left = '0px';
                                ef.style.top = '0px';
				ef.src = invUrl;
			}
		}

                if(this._isFF){
                    var stage = this.getStage();
                    stage.innerHTML = '<img src="'+this._emCdnHost+'/img.gif" />';
                    stage.style.display = 'none';
                }
	}
	
 

}
 
var _emn = new EMN('_emn'); 
_emn.exe();
 
