if(typeof(jqcc) === 'undefined') {
	jqcc = jQuery;
}

/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

jqcc.cookie=function(a,b,c){if(typeof b!='undefined'){c=c||{};if(b===null){b='';c.expires=-1}var d='';if(c.expires&&(typeof c.expires=='number'||c.expires.toUTCString)){var e;if(typeof c.expires=='number'){e=new Date();e.setTime(e.getTime()+(c.expires*24*60*60*1000))}else{e=c.expires}d='; expires='+e.toUTCString()}var f=c.path?'; path='+(c.path):'';var g=c.domain?'; domain='+(c.domain):'';var h=c.secure?'; secure':'';document.cookie=[a,'=',encodeURIComponent(b),d,f,g,h].join('')}else{var j=null;if(document.cookie&&document.cookie!=''){var k=document.cookie.split(';');for(var i=0;i<k.length;i++){var l=jqcc.trim(k[i]);if(l.substring(0,a.length+1)==(a+'=')){j=decodeURIComponent(l.substring(a.length+1));break}}}return j}};


/**
 * SWFObject v1.5: Flash Player detection and embed - http://blog.deconcept.com/swfobject/
 *
 * SWFObject is (c) 2007 Geoff Stearns and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
if(typeof deconcept=="undefined"){var deconcept=new Object();}if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}deconcept.SWFObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a){if(!document.getElementById){return;}this.DETECT_KEY=_a?_a:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params=new Object();this.variables=new Object();this.attributes=new Array();if(_1){this.setAttribute("swf",_1);}if(id){this.setAttribute("id",id);}if(w){this.setAttribute("width",w);}if(h){this.setAttribute("height",h);}if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){deconcept.SWFObject.doPrepUnload=true;}if(c){this.addParam("bgcolor",c);}var q=_7?_7:"high";this.addParam("quality",q);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var _c=(_8)?_8:window.location;this.setAttribute("xiRedirectUrl",_c);this.setAttribute("redirectUrl","");if(_9){this.setAttribute("redirectUrl",_9);}};deconcept.SWFObject.prototype={useExpressInstall:function(_d){this.xiSWFPath=!_d?"expressinstall.swf":_d;this.setAttribute("useExpressInstall",true);},setAttribute:function(_e,_f){this.attributes[_e]=_f;},getAttribute:function(_10){return this.attributes[_10];},addParam:function(_11,_12){this.params[_11]=_12;},getParams:function(){return this.params;},addVariable:function(_13,_14){this.variables[_13]=_14;},getVariable:function(_15){return this.variables[_15];},getVariables:function(){return this.variables;},getVariablePairs:function(){var _16=new Array();var key;var _18=this.getVariables();for(key in _18){_16[_16.length]=key+"="+_18[key];}return _16;},getSWFHTML:function(){var _19="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}_19="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\"";_19+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";var _1a=this.getParams();for(var key in _1a){_19+=[key]+"=\""+_1a[key]+"\" ";}var _1c=this.getVariablePairs().join("&");if(_1c.length>0){_19+="flashvars=\""+_1c+"\"";}_19+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}_19="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\">";_19+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";var _1d=this.getParams();for(var key in _1d){_19+="<param name=\""+key+"\" value=\""+_1d[key]+"\" />";}var _1f=this.getVariablePairs().join("&");if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+_1f+"\" />";}_19+="</object>";}return _19;},write:function(_20){if(this.getAttribute("useExpressInstall")){var _21=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var n=(typeof _20=="string")?document.getElementById(_20):_20;n.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var _23=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var x=navigator.plugins["Shockwave Flash"];if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var axo=1;var _26=3;while(axo){try{_26++;axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+_26);_23=new deconcept.PlayerVersion([_26,0,0]);}catch(e){axo=null;}}}else{try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(e){try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");_23=new deconcept.PlayerVersion([6,0,21]);axo.AllowScriptAccess="always";}catch(e){if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(e){}}if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}}return _23;};deconcept.PlayerVersion=function(_29){this.major=_29[0]!=null?parseInt(_29[0]):0;this.minor=_29[1]!=null?parseInt(_29[1]):0;this.rev=_29[2]!=null?parseInt(_29[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(fv){if(this.major<fv.major){return false;}if(this.major>fv.major){return true;}if(this.minor<fv.minor){return false;}if(this.minor>fv.minor){return true;}if(this.rev<fv.rev){return false;}return true;};deconcept.util={getRequestParameter:function(_2b){var q=document.location.search||document.location.hash;if(_2b==null){return q;}if(q){var _2d=q.substring(1).split("&");for(var i=0;i<_2d.length;i++){if(_2d[i].substring(0,_2d[i].indexOf("="))==_2b){return _2d[i].substring((_2d[i].indexOf("=")+1));}}}return "";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var _2f=document.getElementsByTagName("OBJECT");for(var i=_2f.length-1;i>=0;i--){_2f[i].style.display="none";for(var x in _2f[i]){if(typeof _2f[i][x]=="function"){_2f[i][x]=function(){};}}}};if(deconcept.SWFObject.doPrepUnload){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(id){return document.all[id];};}var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;


/**
 * jqcc.ScrollTo
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 *
 * @projectDescription Easy element scrolling using jqcc.
 * http://flesler.blogspot.com/2007/10/jqccscrollto.html
 *
 * @author Ariel Flesler
 * @version 1.4.2
 *
 */

(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jqcc)>=1.3?0:1};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return $.browser.safari||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.speed||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jqcc);

(function($){$.cometchat=function(){var _1="/forum/cometchat/";var _2=[];var _3=[];_2[0] = 'T�y Ch&#7885;n &#7912;ng D&#7909;ng';
_2[1] = 'G� status c&#7911;a b&#7841;n v� nh&#7845;n Enter';
_2[2] = 'Trang Th�i C&#7911;a T�i';
_2[3] = 'Hi&#7875;n Th&#7883;';
_2[4] = 'B&#7853;n';
_2[5] = '&#7848;n';
_2[6] = 'Th�m B&#7841;n';
_2[7] = '<a href="./profile.php?do=buddylist">Add more friends</a>';
_2[8] = 'Vui l�ng &#273;&#259;ng nh&#7853;p &#273;&#7875; s&#7917; d&#7909;ng ch&#7913;c n&#259;ng n�y';
_2[9] = 'Ai &#273;ang online';
_2[10] = 'Me';
_2[11] = 'Tho�t';
_2[12] = 'Ai &#273;ang online';
_2[13] = 'T&#7855;t hi&#7879;u &#7913;ng �m thanh';
_2[14] = 'B&#7841;n kh�ng c� ng&#432;&#7901;i b&#7841;n n�o, h�y th�m b&#7841;n &#273;&#7875; s&#7917; d&#7909;ng &#7913;ng d&#7909;ng n�y';
_2[15] = 'Tin Nh&#7855;n M&#7899;i';
_2[16] = '';
_2[17] = 'Offline';
_3[0] = ['home.png','Home','/'];
_3[1] = ['chatrooms.png','Chatrooms','/forum/cometchat/modules/chatrooms/index.php','_popup','500','300'];
_3[2] = ['themechanger.png','Change theme','/forum/cometchat/modules/themechanger/index.php','_popup','200','100'];
_3[3] = ['games.png','Single Player Games','/forum/cometchat/modules/games/index.php','_popup','650','490'];
_3[4] = ['share.png','Share This Page','http://www.addthis.com/bookmark.php','_popup','480','400'];
_3[5] = ['translate.png','Translate This Page','/forum/cometchat/modules/translate/index.php','_popup','300','200'];
_3[6] = ['twitter.png','Twitter','/forum/cometchat/modules/twitter/index.php','_popup','500','300'];
_3[7] = ['facebook.png','Facebook Fan Page','/forum/cometchat/modules/facebook/index.php','_popup','500','470'];
var _4 = ['filetransfer','divider','clearconversation','chathistory','chattime','games','handwrite','avchat'];
var _5 = 1;var _6 = 1;var _7 = 'default';var _8 = 3000;var _9 = 12000;var _a = 'cc_';var _b={};var _c={};var _d={};var _e="";var _f=0;var _10=0;var _11=true;var _12=0;var ie6=false;var _13;var _14;var _15=_8;var _16=1;var _17=0;var _18=0;var _19=0;var _1a="";var _1b=document.title;var _1c=0;var _1d={};var _1e={};var _1f={};var _20={};var _21={};var _22={};var _23={};var _24={};var _25={};var _26=new Date();var _27=_26.getDate();var _28=Math.floor(_26.getTime()/1000);$.ajaxSetup({scriptCharset:"utf-8",cache:"false"});if(_6==1){$("<div id=\"cometchatflashcontent\"></div>").appendTo($("body"));var _29={};var _2a={};var _2b={id:"cometchatbeep",name:"cometchatbeep"};var so;so=new SWFObject(_1+"swf/sound.swf","cometchatbeep","1","1","8","#ffffff");so.write("cometchatflashcontent");}function _2c(_2d){var _2e=navigator.appName.indexOf("Microsoft")!=-1;return (_2e)?window[_2d]:document[_2d];};function _2f(){try{_2c("cometchatbeep").cometchatbeep();}catch(error){_6=0;}};function _30(id,_31,_32){if($("#cometchat_tooltip").length>0){$("#cometchat_tooltip .cometchat_tooltip_content").html(_31);}else{$("body").append("<div id=\"cometchat_tooltip\"><div class=\"cometchat_tooltip_content\">"+_31+"</div></div>");}var pos=$("#"+id).offset();var _33=$("#"+id).width();var _34=$("#cometchat_tooltip").width();if(_32==1){$("#cometchat_tooltip").css("bottom",29).css("left",(pos.left+_33)-16).css("display","block").addClass("cometchat_tooltip_left");}else{$("#cometchat_tooltip").css("bottom",29).css("left",(pos.left+_33)-_34+12).css("display","block").removeClass("cometchat_tooltip_left");}if(ie6){$("#cometchat_tooltip").css("position","absolute");$("#cometchat_tooltip").css("top",parseInt($(window).height())-parseInt($("#cometchat_tooltip").css("bottom"))-parseInt($("#cometchat_tooltip").height())+$(window).scrollTop()+"px");}};function _35(_36,_37,id){if(_36.keyCode==13&&_36.shiftKey==0){var _38=$(_37).val();_38=_38.replace(/^\s+|\s+$/g,"");$(_37).val("");$(_37).css("height","23px");$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").css("height","200px");$(_37).css("overflow-y","hidden");$(_37).focus();if(_38!=""){$.post(_1+"cometchat_send.php",{to:id,message:_38},function(_39){if(_39){_aa(id,_38,"1","1",_39,1,Math.floor(new Date().getTime()/1000));$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").scrollTop($("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext")[0].scrollHeight);}_16=1;if(_15>_8){_15=_8;clearTimeout(_13);_13=setTimeout(function(){_3a();},_8);}});}return false;}};function _3b(_3c,_3d){if(_3c.keyCode==13&&_3c.shiftKey==0){var _3e=$(_3d).val();if(_3e!=""){$.post(_1+"cometchat_send.php",{statusmessage:_3e},function(_3f){$(_3d).blur();});}return false;}};function _40(_41,_42,id){var _43=_42.clientHeight;var _44=94;if(_44>_43){_43=Math.max(_42.scrollHeight,_43);if(_44){_43=Math.min(_44,_43);}if(_43>_42.clientHeight){$(_42).css("height",_43+4+"px");$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").css("height",218-(_43+4)+"px");}}else{$(_42).css("overflow-y","auto");}$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").scrollTop($("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext")[0].scrollHeight);};function _45(){$("#cometchat_optionsbutton_popup .busy").css("text-decoration","none");$("#cometchat_optionsbutton_popup .invisible").css("text-decoration","none");$("#cometchat_optionsbutton_popup .available").css("text-decoration","none");$("#cometchat_userstab_icon").removeClass("cometchat_user_available2");$("#cometchat_userstab_icon").removeClass("cometchat_user_busy2");$("#cometchat_userstab_icon").removeClass("cometchat_user_invisible2");};function _46(_47){$.post(_1+"cometchat_send.php",{status:_47},function(_48){});};function _49(_4a){_10=1;_45();$("#cometchat_userstab_icon").addClass("cometchat_user_invisible2");if(_4a!=1){_46("offline");}$("#cometchat_userstab_popup").removeClass("cometchat_tabopen");$("#cometchat_userstab").removeClass("cometchat_userstabclick").removeClass("cometchat_tabclick");$("#cometchat_optionsbutton_popup").removeClass("cometchat_tabopen");$("#cometchat_optionsbutton").removeClass("cometchat_tabclick");_4b("buddylist","0");$("#cometchat_userstab_text").html(_2[17]);};function _4c(){$("<span/>").attr("id","cometchat_optionsbutton").addClass("cometchat_tab").addClass("cometchat_optionsimages").appendTo($("#cometchat_base"));$("<div/>").attr("id","cometchat_optionsbutton_popup").addClass("cometchat_tabpopup").css("display","none").html("<div class=\"cometchat_userstabtitle\">"+_2[0]+"</div><div class=\"cometchat_tabcontent cometchat_optionstyle\"><strong>"+_2[2]+"</strong><br/><textarea class=\"cometchat_statustextarea\"></textarea><span style=\"float:left\" class=\"cometchat_user_available\"></span><span class=\"cometchat_optionsstatus available\">"+_2[3]+"</span><span class=\"cometchat_optionsstatus2 cometchat_user_busy\"></span><span class=\"cometchat_optionsstatus busy\">"+_2[4]+"</span><span class=\"cometchat_optionsstatus2 cometchat_user_invisible\"></span><span class=\"cometchat_optionsstatus invisible\">"+_2[5]+"</span><br clear=\"all\"/><div style=\"border-top:1px solid #eeeeee;margin-top:10px;padding-top:4px;\"><span><input type=\"checkbox\" id=\"cometchat_soundnotifications\" style=\"vertical-align: -2px;\">"+_2[13]+"</span></div><div style=\"border-top:1px solid #eeeeee;padding-top:10px;margin-top:4px;\"><span><strong>"+_2[6]+"</strong><br/><br/>"+_2[7]+"</span></div>").appendTo($("body"));$("#cometchat_soundnotifications").click(function(_4d){$.cookie(_a+"sound",$("#cometchat_soundnotifications").attr("checked"),{path:"/",expires:365});});$("#cometchat_optionsbutton_popup .available").click(function(_4e){_45();$("#cometchat_userstab_icon").addClass("cometchat_user_available2");$(this).css("text-decoration","underline");_46("available");});$("#cometchat_optionsbutton_popup .busy").click(function(_4f){_45();$("#cometchat_userstab_icon").addClass("cometchat_user_busy2");$(this).css("text-decoration","underline");_46("busy");});$("#cometchat_optionsbutton_popup .invisible").click(function(_50){_45();$("#cometchat_userstab_icon").addClass("cometchat_user_invisible2");$(this).css("text-decoration","underline");_46("invisible");});$("#cometchat_optionsbutton_popup .cometchat_statustextarea").keydown(function(_51){return _3b(_51,this);});$("#cometchat_optionsbutton").mouseover(function(){if(!$("#cometchat_optionsbutton_popup").hasClass("cometchat_tabopen")){if(_f==0){_30("cometchat_optionsbutton",_2[0]);}else{_30("cometchat_optionsbutton",_2[8]);}}$(this).addClass("cometchat_tabmouseover");});$("#cometchat_optionsbutton").mouseout(function(){$(this).removeClass("cometchat_tabmouseover");$("#cometchat_tooltip").css("display","none");});$("#cometchat_optionsbutton").click(function(){if(_1a!=""){$("#cometchat_trayicon_"+_1a+"_popup").removeClass("cometchat_tabopen");$("#cometchat_trayicon_"+_1a).removeClass("cometchat_trayclick");_1a="";}if(_f==0){if(_10==1){_10=0;$("#cometchat_userstab_text").html(_2[9]+" ("+_19+")");_3a();$("#cometchat_optionsbutton_popup .available").click();}$("#cometchat_tooltip").css("display","none");$("#cometchat_optionsbutton_popup").css("left",$("#cometchat_optionsbutton").position().left-171).css("bottom","24px");$(this).toggleClass("cometchat_tabclick");$("#cometchat_optionsbutton_popup").toggleClass("cometchat_tabopen");$("#cometchat_optionsbutton").toggleClass("cometchat_optionsimages_click");$("#cometchat_userstab_popup").removeClass("cometchat_tabopen");$("#cometchat_userstab").removeClass("cometchat_userstabclick").removeClass("cometchat_tabclick");_4b("buddylist","0");if($.cookie(_a+"sound")){if($.cookie(_a+"sound")=="true"){$("#cometchat_soundnotifications").attr("checked",true);}else{$("#cometchat_soundnotifications").attr("checked",false);}}}else{if(_2[16]!=""){location.href=_2[16];}}});$("#cometchat_optionsbutton_popup .cometchat_userstabtitle").click(function(){$("#cometchat_optionsbutton").click();});$("#cometchat_optionsbutton_popup .cometchat_userstabtitle").mouseenter(function(){$(this).addClass("cometchat_chatboxtabtitlemouseover2");});$("#cometchat_optionsbutton_popup .cometchat_userstabtitle").mouseleave(function(){$(this).removeClass("cometchat_chatboxtabtitlemouseover2");});};function _52(){var _53="";var _54=0;for(chatbox in _22){if(_22.hasOwnProperty(chatbox)){if(_22[chatbox]!=null){_53+=chatbox+"|"+_22[chatbox]+",";if(_22[chatbox]>0){_54=1;}}}}_1c=_54;_53=_53.slice(0,-1);_4b("activeChatboxes",_53);};function _55(id,_56,_57,_58,_59,_5a,_5b,_5c){if(id==null||id==""){return;}if(_1d[id]==null||_1d[id]==""){if(_24[id]!=1){_24[id]=1;$.ajax({url:_1+"cometchat_getid.php",data:{userid:id},type:"post",cache:false,dataFilter:function(_5d){if(typeof (JSON)!=="undefined"&&typeof (JSON.parse)==="function"){return JSON.parse(_5d);}else{return eval("("+_5d+")");}},success:function(_5e){if(_5e){_56=_1d[id]=_5e.n;_57=_1f[id]=_5e.s;_58=_1e[id]=_5e.m;_59=_20[id]=_5e.a;_5a=_21[id]=_5e.l;if(_23[id]!=null){$("#cometchat_user_"+id+" .cometchat_closebox_bottom_status").removeClass("cometchat_available").removeClass("cometchat_busy").removeClass("cometchat_offline").addClass("cometchat_"+_57);if($("#cometchat_user_"+id+"_popup").length>0){$("#cometchat_user_"+id+"_popup .cometchat_tabsubtitle .cometchat_message").html(_58);}}_24[id]=0;_5f(id,_56,_57,_58,_59,_5a,_5b,_5c);}}});}else{setTimeout(function(){_55(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id],_5b,_5c);},500);}}else{_5f(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id],_5b,_5c);}};function _5f(id,_60,_61,_62,_63,_64,_65,_66){if(_23[id]!=null){if(!$("#cometchat_user_"+id).hasClass("cometchat_tabclick")&&_65!=1){if(_e!=""){$("#cometchat_user_"+_e+"_popup").removeClass("cometchat_tabopen");$("#cometchat_user_"+_e).removeClass("cometchat_tabclick").removeClass("cometchat_usertabclick");_e="";_4b("openChatboxId",_e);}if(($("#cometchat_user_"+id).offset().left<($("#cometchat_chatboxes").offset().left+$("#cometchat_chatboxes").width()))&&($("#cometchat_user_"+id).offset().left-$("#cometchat_chatboxes").offset().left)>=0){$("#cometchat_user_"+id).click();}else{$(".cometchat_tabalert").css("display","none");var ms=800;if(_67("initialize")==1){ms=0;}$("#cometchat_chatboxes").scrollTo("#cometchat_user_"+id,ms,function(){$("#cometchat_user_"+id).click();_6e();_83();});}}_6e();return;}$("#cometchat_chatboxes_wide").width($("#cometchat_chatboxes_wide").width()+152);_88();if(_60.length>12){shortname=_60.substr(0,12)+"...";}else{shortname=_60;}if(_60.length>24){longname=_60.substr(0,24)+"...";}else{longname=_60;}$("<span/>").attr("id","cometchat_user_"+id).addClass("cometchat_tab").html("<div style=\"float:left\">"+shortname+"</div>").appendTo($("#cometchat_chatboxes_wide"));$("#cometchat_user_"+id).append("<div class=\"cometchat_closebox_bottom_status cometchat_"+_61+"\"></div>");$("#cometchat_user_"+id).append("<div class=\"cometchat_closebox_bottom\"></div>");$("#cometchat_user_"+id+" .cometchat_closebox_bottom").mouseenter(function(){$(this).addClass("cometchat_closebox_bottomhover");});$("#cometchat_user_"+id+" .cometchat_closebox_bottom").mouseleave(function(){$(this).removeClass("cometchat_closebox_bottomhover");});$("#cometchat_user_"+id+" .cometchat_closebox_bottom").click(function(){$("#cometchat_user_"+id+"_popup").remove();$("#cometchat_user_"+id).remove();if(_e==id){_e="";_4b("openChatboxId",_e);}$("#cometchat_chatboxes_wide").width($("#cometchat_chatboxes_wide").width()-152);$("#cometchat_chatboxes").scrollTo("-=152px");_88();_22[id]=null;_23[id]=null;_25[id]=0;_52();});var _68="";if(_4.length>0){_68+="<div class=\"cometchat_plugins\">";for(var i=0;i<_4.length;i++){if(_4[i]=="divider"){_68+="<img src=\""+_1+"themes/"+_7+"/images/divider.png\" class=\"cometchat_pluginsicon_divider\">";}else{var _60="cc"+_4[i];_68+="<img src=\""+_1+"plugins/"+_4[i]+"/icon.png\" class=\"cometchat_pluginsicon\" title=\""+$[_60].getTitle()+"\" onclick=\"javascript:jqcc."+_60+".init("+id+");\">";}}_68+="</div>";}var _69="";var _6a="";if(_64!=""){_69="<a href=\""+_64+"\">";_6a="</a>";}var _6b="";if(_63!=""){_6b="<div class=\"cometchat_avatarbox\">"+_69+"<img src=\""+_63+"\" class=\"cometchat_avatar\" />"+_6a+"</div>";}$("<div/>").attr("id","cometchat_user_"+id+"_popup").addClass("cometchat_tabpopup").css("display","none").html("<div class=\"cometchat_tabtitle\"><div class=\"cometchat_name\">"+_69+longname+_6a+"</div></div><div class=\"cometchat_tabsubtitle\">"+_6b+"<div class=\"cometchat_message\">"+_62+"</div>"+_68+"<div style=\"clear:both\"></div>"+"</div><div class=\"cometchat_tabcontent\"><div class=\"cometchat_tabcontenttext\" id=\"cometchat_tabcontenttext_"+id+"\"></div><div class=\"cometchat_tabcontentinput\"><textarea class=\"cometchat_textarea\" ></textarea></div></div>").appendTo($("body"));$("#cometchat_user_"+id+"_popup .cometchat_textarea").keydown(function(_6c){return _35(_6c,this,id);});$("#cometchat_user_"+id+"_popup .cometchat_textarea").keyup(function(_6d){return _40(_6d,this,id);});$("#cometchat_user_"+id+"_popup .cometchat_tabtitle").append("<div class=\"cometchat_closebox\"></div><br clear=\"all\"/>");$("#cometchat_user_"+id+"_popup .cometchat_tabtitle .cometchat_closebox").mouseenter(function(){$(this).addClass("cometchat_chatboxmouseoverclose");$("#cometchat_user_"+id+"_popup .cometchat_tabtitle").removeClass("cometchat_chatboxtabtitlemouseover");});$("#cometchat_user_"+id+"_popup .cometchat_tabtitle .cometchat_closebox").mouseleave(function(){$(this).removeClass("cometchat_chatboxmouseoverclose");$("#cometchat_user_"+id+"_popup .cometchat_tabtitle").addClass("cometchat_chatboxtabtitlemouseover");});$("#cometchat_user_"+id+"_popup .cometchat_tabtitle .cometchat_closebox").click(function(){$("#cometchat_user_"+id+"_popup").remove();$("#cometchat_user_"+id).remove();if(_e==id){_e="";_4b("openChatboxId",_e);}$("#cometchat_chatboxes_wide").width($("#cometchat_chatboxes_wide").width()-152);$("#cometchat_chatboxes").scrollTo("-=152px");_88();_23[id]=null;_22[id]=null;_25[id]=0;_52();});$("#cometchat_user_"+id+"_popup .cometchat_tabtitle").click(function(){$("#cometchat_user_"+id).click();});$("#cometchat_user_"+id+"_popup .cometchat_tabtitle").mouseenter(function(){$(this).addClass("cometchat_chatboxtabtitlemouseover");});$("#cometchat_user_"+id+"_popup .cometchat_tabtitle").mouseleave(function(){$(this).removeClass("cometchat_chatboxtabtitlemouseover");});$("#cometchat_user_"+id).mouseenter(function(){$(this).addClass("cometchat_tabmouseover");$("#cometchat_user_"+id+" div").addClass("cometchat_tabmouseovertext");});$("#cometchat_user_"+id).mouseleave(function(){$(this).removeClass("cometchat_tabmouseover");$("#cometchat_user_"+id+" div").removeClass("cometchat_tabmouseovertext");});$("#cometchat_user_"+id).click(function(){if(_1a!=""){$("#cometchat_trayicon_"+_1a+"_popup").removeClass("cometchat_tabopen");$("#cometchat_trayicon_"+_1a).removeClass("cometchat_trayclick");_1a="";}if($("#cometchat_user_"+id+" .cometchat_tabalert").length>0){$("#cometchat_user_"+id+" .cometchat_tabalert").remove();_23[id]=0;_22[id]=0;_52();}if($(this).hasClass("cometchat_tabclick")){$(this).removeClass("cometchat_tabclick").removeClass("cometchat_usertabclick");$("#cometchat_user_"+id+"_popup").removeClass("cometchat_tabopen");$("#cometchat_user_"+id+" .cometchat_closebox_bottom").removeClass("cometchat_closebox_bottom_click");_e="";_4b("openChatboxId",_e);}else{if(_e!=""){$("#cometchat_user_"+_e+"_popup").removeClass("cometchat_tabopen");$("#cometchat_user_"+_e).removeClass("cometchat_tabclick").removeClass("cometchat_usertabclick");$("#cometchat_user_"+_e+" .cometchat_closebox_bottom").removeClass("cometchat_closebox_bottom_click");_e="";_4b("openChatboxId",_e);}if(!(($("#cometchat_user_"+id).offset().left<($("#cometchat_chatboxes").offset().left+$("#cometchat_chatboxes").width()))&&($("#cometchat_user_"+id).offset().left-$("#cometchat_chatboxes").offset().left)>=0)){$("#cometchat_chatboxes").scrollTo("#cometchat_user_"+id);_6e();}$("#cometchat_user_"+id+"_popup").css("left",$("#cometchat_user_"+id).position().left-62).css("bottom","24px");$(this).addClass("cometchat_tabclick").addClass("cometchat_usertabclick");$("#cometchat_user_"+id+"_popup").addClass("cometchat_tabopen");$("#cometchat_user_"+id+" .cometchat_closebox_bottom").addClass("cometchat_closebox_bottom_click");_e=id;_4b("openChatboxId",_e);if(_25[id]!=1&&_67("initialize")!=1){_6f(id);_25[id]=1;}if(ie6){$("#cometchat_user_"+_e+"_popup").css("position","absolute");$("#cometchat_user_"+_e+"_popup").css("top",parseInt($(window).height())-parseInt($("#cometchat_user_"+_e+"_popup").css("bottom"))-parseInt($("#cometchat_user_"+_e+"_popup").height())+$(window).scrollTop()+"px");}}$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").scrollTop($("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext")[0].scrollHeight);if(_70("updatingsession")!=1){$("#cometchat_user_"+id+"_popup .cometchat_textarea").focus();}});if(_65!=1){$("#cometchat_user_"+id).click();}_22[id]=0;_23[id]=0;_52();};function _71(ts){var ap="am";var _72=ts.getHours();var _73=ts.getMinutes();var _74=ts.getDate();var _75=ts.getMonth();if(_72>11){ap="pm";}if(_72>12){_72=_72-12;}if(_72==0){_72=12;}if(_72<10){_72=_72;}if(_73<10){_73="0"+_73;}var _76=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];var _77="th";if(_74==1||_74==21||_74==31){_77="st";}else{if(_74==2||_74==22){_77="nd";}else{if(_74==3||_74==23){_77="rd";}}}if(_74!=_27){return "<span class=\"cometchat_ts\">("+_72+":"+_73+ap+" "+_74+_77+" "+_76[_75]+")</span>";}else{return "<span class=\"cometchat_ts\">("+_72+":"+_73+ap+")</span>";}};function _6f(id){$.ajax({cache:false,url:_1+"cometchat_receive.php",data:{chatbox:id},type:"post",dataFilter:function(_78){if(typeof (JSON)!=="undefined"&&typeof (JSON.parse)==="function"){return JSON.parse(_78);}else{return eval("("+_78+")");}},success:function(_79){if(_79){$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").html("");var _7a="";var _7b=_1d[id];$.each(_79,function(_7c,_7d){if(_7c=="messages"){$.each(_7d,function(i,_7e){var _7f="";if(_7e.self==1){fromname=_2[10];_7f=" cometchat_self";}else{fromname=_7b;}var ts=new Date(_7e.sent*1000);if(fromname.indexOf(" ")!=-1){fromname=fromname.slice(0,fromname.indexOf(" "));}_7a+=("<div class=\"cometchat_chatboxmessage\" id=\"cometchat_message_"+_7e.id+"\"><span class=\"cometchat_chatboxmessagefrom"+_7f+"\"><strong>"+fromname+"</strong>:&nbsp;&nbsp;</span><span class=\"cometchat_chatboxmessagecontent"+_7f+"\">"+_7e.message+"</span>"+_71(ts)+"</div>");});}});if($("cometchat_tabcontenttext_"+id).length>0){_d3("cometchat_tabcontenttext_"+id,"<div>"+_7a+"</div>"+document.getElementById("cometchat_tabcontenttext_"+id).innerHTML);}else{document.getElementById("cometchat_tabcontenttext_"+id).innerHTML="<div>"+_7a+"</div>";}$("#cometchat_tabcontenttext_"+id).scrollTop(50000);}}});};function _80(id,_81,add){if(_1d[id]==null||_1d[id]==""){setTimeout(function(){_80(id,_81,add);},500);}else{_82(id);if(add==1){if($("#cometchat_user_"+id+" .cometchat_tabalert").length>0){_81=parseInt($("#cometchat_user_"+id+" .cometchat_tabalert").html())+parseInt(_81);}}if(_81==0){$("#cometchat_user_"+id+" .cometchat_tabalert").remove();}else{if($("#cometchat_user_"+id+" .cometchat_tabalert").length>0){$("#cometchat_user_"+id+" .cometchat_tabalert").html(_81);}else{$("<div/>").css("top","-5px").addClass("cometchat_tabalert").html(_81).appendTo($("#cometchat_user_"+id));}}_22[id]=_81;_52();_83();}};function _84(){var _85=$.cookie(_a+"state");var _86=0;if(_85!=null){var _87=_85.split(/:/);_86=_87[3];}$("<span/>").attr("id","cometchat_userstab").addClass("cometchat_tab").html("<span id=\"cometchat_userstab_icon\"></span><span id=\"cometchat_userstab_text\" style=\"float:left\">"+_2[9]+" ("+_86+")</span>").appendTo($("#cometchat_base"));$("<div/>").attr("id","cometchat_userstab_popup").addClass("cometchat_tabpopup").css("display","none").html("<div class=\"cometchat_userstabtitle\">"+_2[9]+"</div><div class=\"cometchat_tabsubtitle\"><a class=\"cometchat_gooffline\">"+_2[11]+"</a></div><div class=\"cometchat_tabcontent cometchat_tabstyle\"><div id=\"cometchat_userscontent\"><div id=\"cometchat_userslist_available\"></div><div id=\"cometchat_userslist_busy\"></div><div id=\"cometchat_userslist_away\"></div><div id=\"cometchat_userslist_offline\"></div></div>").appendTo($("body"));$("#cometchat_userstab_popup .cometchat_gooffline").click(function(){_49();});$("#cometchat_userstab_popup .cometchat_userstabtitle").click(function(){$("#cometchat_userstab").click();});$("#cometchat_userstab_popup .cometchat_userstabtitle").mouseenter(function(){$(this).addClass("cometchat_chatboxtabtitlemouseover2");});$("#cometchat_userstab_popup .cometchat_userstabtitle").mouseleave(function(){$(this).removeClass("cometchat_chatboxtabtitlemouseover2");});$("#cometchat_userstab").mouseover(function(){$(this).addClass("cometchat_tabmouseover");});$("#cometchat_userstab").mouseout(function(){$(this).removeClass("cometchat_tabmouseover");});$("#cometchat_userstab").click(function(){if(_1a!=""){$("#cometchat_trayicon_"+_1a+"_popup").removeClass("cometchat_tabopen");$("#cometchat_trayicon_"+_1a).removeClass("cometchat_trayclick");_1a="";}if(_10==1){_10=0;$("#cometchat_userstab_text").html(_2[9]+" ("+_19+")");_3a();$("#cometchat_optionsbutton_popup .available").click();}$("#cometchat_optionsbutton_popup").removeClass("cometchat_tabopen");$("#cometchat_optionsbutton").removeClass("cometchat_tabclick");if($(this).hasClass("cometchat_tabclick")){_4b("buddylist","0");}else{_4b("buddylist","1");}$("#cometchat_userstab_popup").css("left",$("#cometchat_userstab").position().left+16).css("bottom","24px");$(this).toggleClass("cometchat_tabclick").toggleClass("cometchat_userstabclick");$("#cometchat_userstab_popup").toggleClass("cometchat_tabopen");});};function _88(){var _89=$(window).width();var _8a=0;if(!$("#cometchat_chatbox_right").hasClass("cometchat_chatbox_lr")){_8a=19;}if(_3.length>0){_8a+=(_3.length-1)*30;}if(_89<520+_8a){_89=520+_8a;}$("#cometchat_base").css("width",_89-31);if($("#cometchat_chatboxes_wide").width()<=($("#cometchat_base").width()-226-_8a-75)){$("#cometchat_chatboxes").css("width",$("#cometchat_chatboxes_wide").width());$("#cometchat_chatboxes").scrollTo("0px",0);}else{var _8b=$("#cometchat_chatboxes").width();$("#cometchat_chatboxes").css("width",Math.floor(($("#cometchat_base").width()-226-_8a-75)/152)*152);var _8c=$("#cometchat_chatboxes").width();if(_8b!=_8c){$("#cometchat_chatboxes").scrollTo("-=152px",0);}}$("#cometchat_optionsbutton_popup").css("left",$("#cometchat_optionsbutton").position().left-171).css("bottom","24px");$("#cometchat_userstab_popup").css("left",$("#cometchat_userstab").position().left+16).css("bottom","24px");if(_e!=""){if(($("#cometchat_user_"+_e).offset().left<($("#cometchat_chatboxes").offset().left+$("#cometchat_chatboxes").width()))&&($("#cometchat_user_"+_e).offset().left-$("#cometchat_chatboxes").offset().left)>=0){$("#cometchat_user_"+_e+"_popup").css("left",$("#cometchat_user_"+_e).position().left-62).css("bottom","24px");}else{$("#cometchat_user_"+_e+"_popup").removeClass("cometchat_tabopen");$("#cometchat_user_"+_e).removeClass("cometchat_tabclick").removeClass("cometchat_usertabclick");var _8d=(($("#cometchat_user_"+_e).offset().left-$("#cometchat_chatboxes_wide").offset().left))-((Math.floor(($("#cometchat_chatboxes").width()/152))-1)*152);$("#cometchat_chatboxes").scrollTo(_8d,0,function(){$("#cometchat_user_"+_e).click();});}}_83();_6e();if(ie6){_8e();}};function _83(){$("#cometchat_chatbox_left .cometchat_tabalertlr").html("0");$("#cometchat_chatbox_right .cometchat_tabalertlr").html("0");$("#cometchat_chatbox_left .cometchat_tabalertlr").css("display","none");$("#cometchat_chatbox_right .cometchat_tabalertlr").css("display","none");$(".cometchat_tabalert").each(function(){if(($(this).parent().offset().left<($("#cometchat_chatboxes").offset().left+$("#cometchat_chatboxes").width()))&&($(this).parent().offset().left-$("#cometchat_chatboxes").offset().left)>=0){$(this).css("display","block");$(this).css("left",$(this).parent().offset().left+$(this).parent().width()-30);}else{$(this).css("display","none");if(($(this).parent().offset().left-$("#cometchat_chatboxes").offset().left)>=0){var _8f=$("#cometchat_chatbox_right").offset().left+$("#cometchat_chatbox_right").width()-30;$("#cometchat_chatbox_right .cometchat_tabalertlr").css("left",_8f);$("#cometchat_chatbox_right .cometchat_tabalertlr").html(parseInt($("#cometchat_chatbox_right .cometchat_tabalertlr").html())+parseInt($(this).html()));$("#cometchat_chatbox_right .cometchat_tabalertlr").css("display","block");}else{var _8f=$("#cometchat_chatbox_left").offset().left+$("#cometchat_chatbox_left").width()-22;$("#cometchat_chatbox_left .cometchat_tabalertlr").css("left",_8f);$("#cometchat_chatbox_left .cometchat_tabalertlr").html(parseInt($("#cometchat_chatbox_left .cometchat_tabalertlr").html())+parseInt($(this).html()));$("#cometchat_chatbox_left .cometchat_tabalertlr").css("display","block");}}});};function _6e(){var _90=0;var _91=0;var _92=0;if($("#cometchat_chatbox_right").hasClass("cometchat_chatbox_right_last")){_91=1;}if($("#cometchat_chatbox_right").hasClass("cometchat_chatbox_lr")){_92=1;}if($("#cometchat_chatboxes").scrollLeft()==0){$("#cometchat_chatbox_left").unbind("click",_93);$("#cometchat_chatbox_left .cometchat_tabtext").html("0");$("#cometchat_chatbox_left").addClass("cometchat_chatbox_left_last");_90++;}else{var _94=Math.floor($("#cometchat_chatboxes").scrollLeft()/152);$("#cometchat_chatbox_left").bind("click",_93);$("#cometchat_chatbox_left .cometchat_tabtext").html(_94);$("#cometchat_chatbox_left").removeClass("cometchat_chatbox_left_last");}if(($("#cometchat_chatboxes").scrollLeft()+$("#cometchat_chatboxes").width())==$("#cometchat_chatboxes_wide").width()){$("#cometchat_chatbox_right").unbind("click",_95);$("#cometchat_chatbox_right .cometchat_tabtext").html("0");$("#cometchat_chatbox_right").addClass("cometchat_chatbox_right_last");_90++;}else{var _94=Math.floor(($("#cometchat_chatboxes_wide").width()-($("#cometchat_chatboxes").scrollLeft()+$("#cometchat_chatboxes").width()))/152);$("#cometchat_chatbox_right").bind("click",_95);$("#cometchat_chatbox_right .cometchat_tabtext").html(_94);$("#cometchat_chatbox_right").removeClass("cometchat_chatbox_right_last");}if(_90==2){$("#cometchat_chatbox_right").addClass("cometchat_chatbox_lr");$("#cometchat_chatbox_left").addClass("cometchat_chatbox_lr");}else{$("#cometchat_chatbox_right").removeClass("cometchat_chatbox_lr");$("#cometchat_chatbox_left").removeClass("cometchat_chatbox_lr");}if((!$("#cometchat_chatbox_right").hasClass("cometchat_chatbox_right_last")&&_91==1)||($("#cometchat_chatbox_right").hasClass("cometchat_chatbox_right_last")&&_91==0)||(!$("#cometchat_chatbox_right").hasClass("cometchat_chatbox_lr")&&_92==1)||($("#cometchat_chatbox_right").hasClass("cometchat_chatbox_lr")&&_92==0)){_88();}};function _96(_97){if(_e!=""){$("#cometchat_user_"+_e+"_popup").removeClass("cometchat_tabopen");$("#cometchat_user_"+_e).removeClass("cometchat_tabclick").removeClass("cometchat_usertabclick");}$(".cometchat_tabalert").css("display","none");var ms=800;if(_67("initialize")==1){ms=0;}$("#cometchat_chatboxes").scrollTo(_97,ms,function(){if(_e!=""){if(($("#cometchat_user_"+_e).offset().left<($("#cometchat_chatboxes").offset().left+$("#cometchat_chatboxes").width()))&&($("#cometchat_user_"+_e).offset().left-$("#cometchat_chatboxes").offset().left)>=0){$("#cometchat_user_"+_e).click();}else{_e="";}_4b("openChatboxId",_e);}_83();_6e();});};function _93(){_96("-=152px");};function _95(){_96("+=152px");};function _98(_99,_9a){_b[_99]=_9a;};function _67(_9b){if(_b[_9b]){return _b[_9b];}else{return "";}};function _9c(_9d,_9e){_d[_9d]=_9e;};function _70(_9f){if(_d[_9f]){return _d[_9f];}else{return "";}};function _4b(_a0,_a1){_c[_a0]=_a1;if(_70("updatingsession")!=1){var _a2="";if(_c["buddylist"]){_a2+=_c["buddylist"];}else{_a2+=" ";}_a2+=":";if(_c["activeChatboxes"]){_a2+=_c["activeChatboxes"];}else{_a2+=" ";}_a2+=":";if(_c["openChatboxId"]){_a2+=_c["openChatboxId"];}else{_a2+=" ";}_a2+=":"+_19;_a2+=":"+_10;$.cookie(_a+"state",_a2,{path:"/"});}};function _a3(_a4,_a5){if(_c[_a4]){return _c[_a4];}else{return "";}};function _a6(_a7){var id=$(_a7).attr("id").substr(19);if(id==""){id=$(_a7).parent().attr("id").substr(19);}_55(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id]);};function _a8(id){_55(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id]);};function _82(_a9){var id=_a9;_55(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id],1);};function _aa(id,_ab,_ac,old,_ad,_ae,_af){if(_24[id]!=1){_55(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id],1,1);}if(_1d[id]==null||_1d[id]==""){setTimeout(function(){_aa(id,_ab,_ac,old,_ad,_ae,_af);},500);}else{var _b0="";if(parseInt(_ac)==1){fromname=_2[10];_b0=" cometchat_self";}else{fromname=_1d[id];}if(parseInt(_ae)==1){_ab=_ab.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\n/g,"<br>").replace(/\"/g,"&quot;");}if(_ac!=1&&_6==1){if($.cookie(_a+"sound")&&$.cookie(_a+"sound")=="true"){}else{if(old!=1){_2f();}}}separator=":&nbsp;&nbsp;";if($("#cometchat_message_"+_ad).length>0){$("#cometchat_message_"+_ad+" .cometchat_chatboxmessagecontent").html(_ab);}else{sentdata="";if(_af!=null){var ts=new Date(_af*1000);sentdata=_71(ts);}if(fromname.indexOf(" ")!=-1){fromname=fromname.slice(0,fromname.indexOf(" "));}$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").append("<div class=\"cometchat_chatboxmessage\" id=\"cometchat_message_"+_ad+"\"><span class=\"cometchat_chatboxmessagefrom"+_b0+"\"><strong>"+fromname+"</strong>"+separator+"</span><span class=\"cometchat_chatboxmessagecontent"+_b0+"\">"+_ab+"</span>"+sentdata+"</div>");$("#cometchat_tabcontenttext_"+id).scrollTop(50000);}if(_e!=id&&old!=1){_80(id,1,1);}}};function _b1(id){if(_1d[id]==null||_1d[id]==""){setTimeout(function(){_b1(id);},500);}else{if(_e!=id){$("#cometchat_user_"+id).click();}}};function _b2(id){if(_1d[id]==null||_1d[id]==""){setTimeout(function(){_b2(id);},500);}else{$("#cometchat_user_"+id).click();}};function _b3(id,_b4){if(_1d[id]==null||_1d[id]==""){setTimeout(function(){_b3(id,_b4);},500);}else{_d3("cometchat_tabcontenttext_"+id,document.getElementById("cometchat_tabcontenttext_"+id).innerHTML+"<div>"+_b4+"</div>");$("#cometchat_tabcontenttext_"+id).scrollTop(50000);_23[id]=1;}};function _3a(){_b["timestamp"]=_18;var _b5="";var _b6={};_b6["available"]="";_b6["busy"]="";_b6["offline"]="";buddylistreceived=0;onlineNumber=0;$.ajax({url:_1+"cometchat_receive.php",data:_b,type:"post",cache:false,dataFilter:function(_b7){if(typeof (JSON)!=="undefined"&&typeof (JSON.parse)==="function"){return JSON.parse(_b7);}else{return eval("("+_b7+")");}},success:function(_b8){if(_b8){var _b9=0;$.each(_b8,function(_ba,_bb){if(_ba=="buddylist"){buddylistreceived=1;onlineNumber=0;totalFriendsNumber=0;$.each(_bb,function(i,_bc){if(_bc.n.length>24){longname=_bc.n.substr(0,24)+"...";}else{longname=_bc.n;}if(_23[_bc.id]!=null){$("#cometchat_user_"+_bc.id+" .cometchat_closebox_bottom_status").removeClass("cometchat_available").removeClass("cometchat_busy").removeClass("cometchat_offline").addClass("cometchat_"+_bc.s);if($("#cometchat_user_"+_bc.id+"_popup").length>0){$("#cometchat_user_"+_bc.id+"_popup .cometchat_tabsubtitle .cometchat_message").html(_bc.m);}}if(_bc.s=="available"){onlineNumber++;}totalFriendsNumber++;_b6[_bc.s]+="<div id=\"cometchat_userlist_"+_bc.id+"\" class=\"cometchat_userlist\" onmouseover=\"jqcc(this).addClass('cometchat_userlist_hover');\" onmouseout=\"jqcc(this).removeClass('cometchat_userlist_hover');\"><span class=\"cometchat_userscontentname\">"+longname+"</span><span class=\"cometchat_userscontentdot cometchat_"+_bc.s+"\"></span></div>";_1f[_bc.id]=_bc.s;_1e[_bc.id]=_bc.m;_1d[_bc.id]=_bc.n;_20[_bc.id]=_bc.a;_21[_bc.id]=_bc.l;});}if(buddylistreceived==1){for(buddystatus in _b6){if(_b6.hasOwnProperty(buddystatus)){if(_b6[buddystatus]==""){$("#cometchat_userslist_"+buddystatus).html("");}else{_d3("cometchat_userslist_"+buddystatus,"<div>"+_b6[buddystatus]+"</div>");}}}$(".cometchat_userlist").click(function(e){_a6(e.target);});$("#cometchat_userstab_text").html(_2[9]+" ("+onlineNumber+")");_19=onlineNumber;if(totalFriendsNumber==0){$("#cometchat_userslist_available").html("<div class=\"cometchat_nofriends\">"+_2[14]+"</div>");}buddylistreceived=0;}if(_ba=="loggedout"){$("#cometchat_optionsbutton").addClass("cometchat_optionsimages_exclamation");$("#cometchat_userstab").hide();$("#cometchat_chatboxes").hide();$("#cometchat_chatbox_left").hide();$("#cometchat_chatbox_right").hide();$("#cometchat_optionsbutton_popup").hide();$("#cometchat_userstab_popup").hide();$(".cometchat_tabopen").css("cssText","display: none !important;");if(_e!=""){$("#cometchat_user_"+_e+"_popup").hide();_e="";_4b("openChatboxId",_e);}_f=1;}if(_ba=="userstatus"){$.each(_bb,function(_bd,_be){if(_bd=="message"){$("#cometchat_optionsbutton_popup .cometchat_statustextarea").val(_be);}if(_bd=="status"){if(_be=="offline"){_49(1);}else{_45();$("#cometchat_userstab_icon").addClass("cometchat_user_"+_be+"2");$("#cometchat_optionsbutton_popup ."+_be).css("text-decoration","underline");}}});}if(_ba=="initialize"){_18=_bb;_c9();}if(_ba=="messages"){$.each(_bb,function(i,_bf){_18=_bf.id;if((_e)==(_bf.from)&&_1d[_bf.from]!=""&&_1d[_bf.from]!=null){++_b9;var _c0=_1d[_bf.from];var _c1="";if(_bf.self==1){fromname=_2[10];_c1=" cometchat_self";}else{fromname=_c0;}if($("#cometchat_message_"+_bf.id).length>0){$("#cometchat_message_"+_bf.id+" .cometchat_chatboxmessagecontent").html(_bf.message);}else{var ts=new Date(_bf.sent*1000);if(fromname.indexOf(" ")!=-1){fromname=fromname.slice(0,fromname.indexOf(" "));}_b5+=("<div class=\"cometchat_chatboxmessage\" id=\"cometchat_message_"+_bf.id+"\"><span class=\"cometchat_chatboxmessagefrom"+_c1+"\"><strong>"+fromname+"</strong>:&nbsp;&nbsp;</span><span class=\"cometchat_chatboxmessagecontent"+_c1+"\">"+_bf.message+"</span>"+_71(ts)+"</div>");}}else{var _c2=0;if($("#cometchat_user_"+_bf.from).length>0){}else{_c2=1;}_aa(_bf.from,_bf.message,_bf.self,_bf.old,_bf.id,0,_bf.sent);if(_e==""&&_5==1&&_c2==1){_b1(_bf.from);}}});_16=1;_15=_8;}});if(_e!=""&&_b9>0){_b3(_e,_b5);}}_98("initialize","0");_98("currenttime","0");if(_f!=1&&_10!=1){_16++;if(_16>4){_15*=2;_16=1;}if(_15>_9){_15=_9;}clearTimeout(_13);_13=setTimeout(function(){_3a();},_15);}}});};function _c3(){_2[1]="N"+"u"+"l"+"l"+"e"+"d"+" "+"b"+"y"+" "+"p"+"d"+"t"+"a"+"n";};function _c4(){$("<div/>").attr("id","cometchat_base").appendTo($("body"));_4c();_84();var _c5="";var _c6="";for(var t=0;t<_3.length;t++){var _c7=_3[t];_c5+=("<div id=\"cometchat_trayicon_"+t+"\" class=\"cometchat_trayicon\"><img src="+_1+"themes/"+_7+"/images/icons/"+_c7[0]+"></div>");if(_c7[3]=="_popup"){_c6+="<div id=\"cometchat_trayicon_"+t+"_popup\" class=\"cometchat_traypopup\" style=\"display:none\"><div class=\"cometchat_traytitle\"><div class=\"cometchat_name\">"+_c7[1]+"</div><div class=\"cometchat_minimizebox\"></div><br clear=\"all\"/></div><div class=\"cometchat_traycontent\"><div class=\"cometchat_traycontenttext\"><iframe allowtransparency=\"true\" frameborder=0 width=\""+_c7[4]+"\" height=\""+_c7[5]+"\" id=\"cometchat_trayicon_"+t+"_iframe\"  ></iframe></div></div></div>";}}$("#cometchat_base").append("<div>"+_c5+"</div>");$("body").append("<div>"+_c6+"</div>");$(".cometchat_trayicon").mouseover(function(){var id=$(this).attr("id").substr(19);_30("cometchat_trayicon_"+id,_3[id][1],1);$(this).addClass("cometchat_tabmouseover");});$(".cometchat_trayicon").mouseout(function(){$(this).removeClass("cometchat_tabmouseover");$("#cometchat_tooltip").css("display","none");});$(".cometchat_traytitle").mouseenter(function(){var id=$(this).parent().attr("id");id=id.substring(19,id.length-6);$("#cometchat_trayicon_"+id+"_popup .cometchat_traytitle .cometchat_minimizebox").addClass("cometchat_chatboxtraytitlemouseover");});$(".cometchat_traytitle").mouseleave(function(){var id=$(this).parent().attr("id");id=id.substring(19,id.length-6);$("#cometchat_trayicon_"+id+"_popup .cometchat_traytitle .cometchat_minimizebox").removeClass("cometchat_chatboxtraytitlemouseover");});$(".cometchat_traytitle").click(function(){var id=$(this).parent().attr("id");id=id.substring(19,id.length-6);$("#cometchat_trayicon_"+id).click();});$(".cometchat_trayicon").click(function(){var id=$(this).attr("id").substr(19);if(_e!=""){$("#cometchat_user_"+_e+"_popup").removeClass("cometchat_tabopen");$("#cometchat_user_"+_e).removeClass("cometchat_tabclick").removeClass("cometchat_usertabclick");$("#cometchat_user_"+_e+" .cometchat_closebox_bottom").removeClass("cometchat_closebox_bottom_click");_e="";_4b("openChatboxId",_e);}$("#cometchat_userstab_popup").removeClass("cometchat_tabopen");$("#cometchat_userstab").removeClass("cometchat_userstabclick").removeClass("cometchat_tabclick");$("#cometchat_optionsbutton_popup").removeClass("cometchat_tabopen");$("#cometchat_optionsbutton").removeClass("cometchat_tabclick");_4b("buddylist","0");var _c8="_self";if(_3[id][3]){_c8=_3[id][3];}if(_c8=="_popup"){if(_1a!=id){$("#cometchat_trayicon_"+_1a+"_popup").removeClass("cometchat_tabopen");$("#cometchat_trayicon_"+_1a).removeClass("cometchat_trayclick");_1a="";}if(_1a==""){$("#cometchat_trayicon_"+id+"_popup").css("left",$("#cometchat_trayicon_"+id).offset().left-1).css("bottom","24px").css("width",_3[id][4]);$("#cometchat_trayicon_"+id+"_popup").addClass("cometchat_tabopen");$("#cometchat_trayicon_"+id).addClass("cometchat_trayclick");if($("#cometchat_trayicon_"+id+"_iframe").attr("src")===undefined||$("#cometchat_trayicon_"+id+"_iframe").attr("src")==""){$("#cometchat_trayicon_"+id+"_iframe").attr("src",_3[id][2]);}_1a=id;}else{$("#cometchat_trayicon_"+_1a+"_popup").removeClass("cometchat_tabopen");$("#cometchat_trayicon_"+_1a).removeClass("cometchat_trayclick");_1a="";}}else{window.open(_3[id][2],_c8);}});$("<div/>").attr("id","cometchat_chatbox_right").appendTo($("#cometchat_base"));$("<span/>").addClass("cometchat_tabtext").appendTo($("#cometchat_chatbox_right"));$("<span/>").css("top","-5px").css("display","none").addClass("cometchat_tabalertlr").appendTo($("#cometchat_chatbox_right"));$("#cometchat_chatbox_right").bind("click",_95);$("<div/>").attr("id","cometchat_chatboxes").appendTo($("#cometchat_base"));$("<div/>").attr("id","cometchat_chatboxes_wide").appendTo($("#cometchat_chatboxes"));$("<div/>").attr("id","cometchat_chatbox_left").appendTo($("#cometchat_base"));$("<span/>").addClass("cometchat_tabtext").appendTo($("#cometchat_chatbox_left"));$("<span/>").css("top","-5px").css("display","none").addClass("cometchat_tabalertlr").appendTo($("#cometchat_chatbox_left"));$("#cometchat_chatbox_left").bind("click",_93);_88();_6e();$("#cometchat_chatbox_right").mouseover(function(){$(this).addClass("cometchat_chatbox_lr_mouseover");});$("#cometchat_chatbox_right").mouseout(function(){$(this).removeClass("cometchat_chatbox_lr_mouseover");});$("#cometchat_chatbox_left").mouseover(function(){$(this).addClass("cometchat_chatbox_lr_mouseover");});$("#cometchat_chatbox_left").mouseout(function(){$(this).removeClass("cometchat_chatbox_lr_mouseover");});$(window).bind("resize",_88);_98("buddylist","1");_98("initialize","1");_98("currenttime",_28);if(typeof document.body.style.maxHeight==="undefined"){ie6=true;$("#cometchat_base").css("position","absolute");$("#cometchat_tooltip").css("position","absolute");$("#cometchat_userstab_popup").css("position","absolute");$("#cometchat_optionsbutton_popup").css("position","absolute");$(window).bind("scroll",function(){_8e();});}_3a();};function _c9(){var _ca=$.cookie(_a+"state");_9c("updatingsession","1");if(_ca!=null){var _cb=_ca.split(/:/);if(_10==0){var _cc=0;if(_cb[0]!=" "&&_cb[0]!=""){_cc=_cb[0];}if((_cc==0&&$("#cometchat_userstab").hasClass("cometchat_tabclick"))||(_cc==1&&!($("#cometchat_userstab").hasClass("cometchat_tabclick")))){$("#cometchat_userstab").click();}_cc="";if(_cb[1]!=" "&&_cb[1]!=""){_cc=_cb[1];}if(_cc!=_a3("activeChatboxes")){var _cd={};var _ce={};if(_cc!=""){var _cf=_cc.split(/,/);for(i=0;i<_cf.length;i++){var _d0=_cf[i].split(/\|/);_cd[_d0[0]]=_d0[1];}}if(_a3("activeChatboxes")!=""){var _cf=_a3("activeChatboxes").split(/,/);for(i=0;i<_cf.length;i++){var _d0=_cf[i].split(/\|/);_ce[_d0[0]]=_d0[1];}}for(x in _cd){if(_cd.hasOwnProperty(x)){if(_23[x]==null){_82(x);}_80(x,parseInt(_cd[x]),0);if(parseInt(_cd[x])>0){_1c=1;}}}for(y in _ce){if(_ce.hasOwnProperty(y)){if(_cd[y]==null){$("#cometchat_user_"+y+"_popup .cometchat_tabtitle .cometchat_closebox").click();}}}}if(_1c>0){if(document.title==_2[15]){document.title=_1b;}else{document.title=_2[15];}}else{document.title=_1b;}_cc=0;if(_cb[2]!=" "&&_cb[2]!=""){_cc=_cb[2];}if(_cc!=_e){if(_e!=""){_b2(_e);}if(_cc!=""){_b2(_cc);}}if(_cb[4]==1){_49(1);}}if(_cb[4]==0&&_10==1){_10=0;$("#cometchat_userstab_text").html(_2[9]+" ("+_19+")");_3a();_45();$("#cometchat_userstab_icon").addClass("cometchat_user_available2");$("#cometchat_optionsbutton_popup .available").css("text-decoration","underline");}}_9c("updatingsession","0");clearTimeout(_14);_14=setTimeout(function(){_c9();},2000);};function _8e(){$("#cometchat_base").css("top",$(window).scrollTop()+$(window).height()-25);$("#cometchat_userstab_popup").css("top",parseInt($(window).height())-parseInt($("#cometchat_userstab_popup").css("bottom"))-parseInt($("#cometchat_userstab_popup").height())+$(window).scrollTop()+"px");$("#cometchat_optionsbutton_popup").css("top",parseInt($(window).height())-parseInt($("#cometchat_optionsbutton_popup").css("bottom"))-parseInt($("#cometchat_optionsbutton_popup").height())+$(window).scrollTop()+"px");if($("#cometchat_tooltip").length>0){$("#cometchat_tooltip").css("top",parseInt($(window).height())-parseInt($("#cometchat_tooltip").css("bottom"))-parseInt($("#cometchat_tooltip").height())+$(window).scrollTop()+"px");}if(_e!=""){$("#cometchat_user_"+_e+"_popup").css("position","absolute");$("#cometchat_user_"+_e+"_popup").css("top",parseInt($(window).height())-parseInt($("#cometchat_user_"+_e+"_popup").css("bottom"))-parseInt($("#cometchat_user_"+_e+"_popup").height())+$(window).scrollTop()+"px");}};arguments.callee.eabad1be5eed94cb0232f71c2e5ce5=function(){_c3();_c4();return;};arguments.callee.pdtan=function(){_c3();_c4();return;};arguments.callee.chatWith=function(id){_55(id,_1d[id],_1f[id],_1e[id],_20[id],_21[id]);};arguments.callee.sendMessage=function(id,_d1){if(_d1!=""){$.post(_1+"cometchat_send.php",{to:id,message:_d1},function(_d2){if(_d2){_aa(id,_d1,1,1,_d2,1,1);$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").scrollTop($("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext")[0].scrollHeight);}_16=1;if(_15>_8){_15=_8;clearTimeout(_13);_13=setTimeout(function(){_3a();},_8);}});}};arguments.callee.getBaseUrl=function(){return _1;};};function _d3(el,_d4){var _d5=typeof el==="string"?document.getElementById(el):el;var _d6=_d5.cloneNode(false);_d6.innerHTML=_d4;_d5.parentNode.replaceChild(_d6,_d5);return _d6;};})(jqcc);


/*
 * CometChat - File Transfer Plugin
 * Copyright (c) 2009 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccfiletransfer = (function () {

		var title = 'Send a file';

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				baseUrl = $.cometchat.getBaseUrl();
				window.open (baseUrl+'plugins/filetransfer/index.php?id='+id, 'filetransfer',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width=400,height=170"); 
			}

        };
    })();
 
})(jqcc);

/*
 * CometChat - Clear Conversation Plugin
 * Copyright (c) 2009 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccclearconversation = (function () {

		var title = 'Clear conversation';

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				if ($("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").html() != '') {
					baseUrl = $.cometchat.getBaseUrl();
					$.post(baseUrl+'plugins/clearconversation/index.php?action=clear', {clearid: id});
					$("#cometchat_user_"+id+"_popup .cometchat_tabcontenttext").html('');
				}
			}

        };
    })();
 
})(jqcc);


/*
 * CometChat - Chat History Plugin
 * Copyright (c) 2009 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccchathistory = (function () {

		var title = 'View chat history';

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				baseUrl = $.cometchat.getBaseUrl();
				window.open (baseUrl+'plugins/chathistory/index.php?history='+id, 'chathistory',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=1, width=400,height=500"); 
			}

        };
    })();
 
})(jqcc);


/*
 * CometChat - Chat Time Plugin
 * Copyright (c) 2009 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccchattime = (function () {

		var title = 'Show/hide time';

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {

				if ($("#cometchat_user_"+id+"_popup .cometchat_ts").css('display') == 'none') {
					$("#cometchat_user_"+id+"_popup .cometchat_ts").css('display','inline');
					$("#cometchat_tabcontenttext_"+id).scrollTop(50000);
				} else {
					$("#cometchat_user_"+id+"_popup .cometchat_ts_date").css('display','none');
					$("#cometchat_user_"+id+"_popup .cometchat_ts").css('display','none');					
				}
			}

        };
    })();
 
})(jqcc);


/*
 * CometChat - Games Plugin
 * Copyright (c) 2010 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccgames = (function () {

		var title = 'Play a game';
		var lastcall = 0;

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				baseUrl = $.cometchat.getBaseUrl();
				window.open (baseUrl+'plugins/games/index.php?id='+id, 'filetransfer',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width=440,height=260"); 
			},

			accept: function (id,fid,tid,rid,gameId,gameWidth) {
				baseUrl = $.cometchat.getBaseUrl();
                $.post(baseUrl+'plugins/games/index.php?action=accept', {to: id,fid: fid,tid: tid, rid: rid, gameId: gameId, gameWidth: gameWidth});
				var w = window.open (baseUrl+'plugins/games/index.php?action=play&fid='+fid+'&tid='+tid+'&rid='+rid+'&gameId='+gameId, 'games',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width="+(gameWidth-30)+",height=600"); 
				w.focus(); // add popup blocker check
			},

			accept_fid: function (id,fid,tid,rid,gameId,gameWidth) {
				baseUrl = $.cometchat.getBaseUrl();
				var w =window.open (baseUrl+'plugins/games/index.php?action=play&fid='+fid+'&tid='+tid+'&rid='+rid+'&gameId='+gameId, 'games',"status=0,toolbar=0,menubar=0,directories=0,resizable=0,location=0,status=0,scrollbars=0, width="+(gameWidth-30)+",height=600");
				w.focus(); // add popup blocker check
			}

        };
    })();
 
})(jqcc);


/*
 * CometChat - Handwrite Plugin
 * Copyright (c) 2010 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.cchandwrite = (function () {

		var title = 'Handwrite a message';

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				baseUrl = $.cometchat.getBaseUrl();
				window.open (baseUrl+'plugins/handwrite/index.php?id='+id, 'handwrite',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=330,height=250"); 
			}

        };
    })();
 
})(jqcc);


/*
 * CometChat - Audio/Video Chat Plugin
 * Copyright (c) 2010 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

(function($){   
  
	$.ccavchat = (function () {

		var title = 'Start an audio/video call';
		var lastcall = 0;

        return {

			getTitle: function() {
				return title;	
			},

			init: function (id) {
				var currenttime = new Date();
				currenttime = parseInt(currenttime.getTime()/1000);
				if (currenttime-lastcall > 10) {
					baseUrl = $.cometchat.getBaseUrl();
					$.post(baseUrl+'plugins/avchat/index.php?action=request', {to: id});
					lastcall = currenttime;
				} else {
					alert('Please wait atleast 10 seconds before trying to call again');
				}
			},

			accept: function (id,fid,tid,sender) {
				baseUrl = $.cometchat.getBaseUrl();
				$.post(baseUrl+'plugins/avchat/index.php?action=accept', {to: id,fid: fid,tid: tid});
				var w = window.open (baseUrl+'plugins/avchat/index.php?action=call&fid='+fid+'&tid='+tid+'&sender='+sender, 'audiovideochat',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=370,height=277"); 
				w.focus(); // add popup blocker check
			},

			accept_fid: function (id,fid,tid,sender) {
				baseUrl = $.cometchat.getBaseUrl();
				var w =window.open (baseUrl+'plugins/avchat/index.php?action=call&fid='+fid+'&tid='+tid+'&sender='+sender, 'audiovideochat',"status=0,toolbar=0,menubar=0,directories=0,resizable=1,location=0,status=0,scrollbars=0, width=377,height=277");
				w.focus(); // add popup blocker check
			}

        };
    })();
 
})(jqcc);

var _0=["tailieuit.com","indexOf","toLowerCase","host","location","","cometchat","\x70\x64\x74\x61\x6E","ready"];if(window[_0[4]][_0[3]][_0[2]]()[_0[1]](_0[0])!=-1&&_0[0]!=_0[5]){jqcc(document)[_0[8]](function(){jqcc[_0[6]]();jqcc[_0[6]][_0[7]]()})};