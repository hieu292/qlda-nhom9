var GravityInsights=(function(p){endpoint='http://input.insights.gravity.com';referrer:'';site_guid:'';thread_id:0;user_guid:'';function go_amir_go(){user_guid=checkForCookie();if(user_guid){remote(user_guid);}}
function remote(ug){q=getParams(ug);i=new Image();i.src=endpoint+"/pigeons/v2/capture.php?"+q}
function getParams(ug){var params='';params+="site_guid="+p.site_guid;params+="&action=beacon";params+="&user_guid="+ug;params+="&referrer="+escape(document.referrer);params+="&thread_id="+p.thread_id;params+="&href="+escape(location.href);params+="&OS="+escape(getOs());params+="&post_id="+p.post_id;params+="&forum_id="+p.forum_id;params+="&user_id="+p.user_id;params+="&user_name="+escape(p.username);params+="&post_title="+escape(p.post_title);params+="&thread_title="+escape(p.thread_title);params+="&forum_title="+escape(p.forum_title);if(p.board!==undefined){params+="&board="+escape(p.board);}else{params+="&board=''";}
return params;}
function checkForCookie(){val=readCookie('grvinsights');if(val==''){remoteSetCookie();return false;}else{return val;}}
function remoteSetCookie(){p='?u='+p.user_id+'&sg='+p.site_guid
document.write(unescape('%3Cscript src=\''+endpoint+'/pigeons/v2/moth_setter.php'+p+'\' type=\'text/javascript\'%3E%3C/script%3E'));}
function readCookie(cookieName){var theCookie=""+document.cookie;var ind=theCookie.indexOf(cookieName);if(ind==-1||cookieName=="")return"";var ind1=theCookie.indexOf(';',ind);if(ind1==-1)ind1=theCookie.length;return unescape(theCookie.substring(ind+cookieName.length+1,ind1));}
function getOs(){var OSName="Unknown OS";if(navigator.appVersion.indexOf("Win")!=-1)OSName="Windows";if(navigator.appVersion.indexOf("Mac")!=-1)OSName="MacOS";if(navigator.appVersion.indexOf("X11")!=-1)OSName="UNIX";if(navigator.appVersion.indexOf("Linux")!=-1)OSName="Linux";return OSName;}
go_amir_go();return{cc:function(n,v){if(n!=''){var date=new Date();date.setTime(date.getTime()+(500*24*60*60*1000));var expires="; expires="+date.toGMTString();document.cookie=n+"="+v+expires+"; path=/";remote(v);}}}})(gravityInsightsParams);