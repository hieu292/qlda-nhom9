/*!======================================================================*\
|| #################################################################### ||
|| # vBulletin 4.0.2 Patch Level 4
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2000-2010 vBulletin Solutions Inc. All Rights Reserved. ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- VBULLETIN IS NOT FREE SOFTWARE ---------------- # ||
|| # http://www.vbulletin.com | http://www.vbulletin.com/license.html # ||
|| #################################################################### ||
\*======================================================================*/

vB_XHTML_Ready.subscribe(init_reputation_popupmenus);

function init_reputation_popupmenus(baseNode)
{
	if (!YAHOO.lang.isUndefined(YAHOO.vBulletin.vBPopupMenu))
	{
		var menus = YAHOO.util.Dom.getElementsByClassName("reputationpopupmenu", undefined, baseNode);
		for (var i = 0; i < menus.length; i++)
		{
			var menuobj = new vB_ReputationPopupMenu(menus[i], YAHOO.vBulletin.vBPopupMenu);
			YAHOO.vBulletin.vBPopupMenu.register_menuobj(menuobj);
		}
	}
	else
	{
		console.log('Popup menu init in wrong order -- reputation popup init');
	}
}


function vB_ReputationPopupMenu(container, factory)
{
	this.init(container, factory);
	if (container.attributes && container.attributes.rel && container.attributes.rel.value)
	{
		this.postid = container.attributes.rel.value;
	}
	else if (container.title)
	{
		this.postid = container.title;
	}
	else
	{
		window.status = container.parentNode.title = "No Reputation set.";
	}
}

vB_ReputationPopupMenu.prototype = new PopupMenu();

// #############################################################################
// vB_Reputation_Handler
// #############################################################################


/**
* Submit OnReadyStateChange callback. Uses a closure to keep state.
* Remember to use me instead of "this" inside this function!
*/
vB_ReputationPopupMenu.prototype.handle_submit = function(ajax)
{
	if (ajax.responseXML)
	{
		this.close_menu();
		// check for error first
		var error = ajax.responseXML.getElementsByTagName('error');
		if (error.length)
		{
			alert(error[0].firstChild.nodeValue);
		}
		else
		{
    		var postid = ajax.responseXML.getElementsByTagName("postid")[0];
    		var rep = ajax.responseXML.getElementsByTagName("html")[0];
    		var divid = 'rep_comment_' + postid.firstChild.data;
    		var postdivid = 'post_message_' + postid.firstChild.data;
    		var totalid = 'totalcm' + postid.firstChild.data;
            var oTable = document.getElementById(divid);
			var oTotal = document.getElementById(totalid);
            if (!oTable)
            {
                document.getElementById(postdivid).innerHTML += '<div id="rep_comment_'+ postid.firstChild.data+'" class="rep_comments">'+ rep.firstChild.data+'</div>';
            }
			else{
				oTable.innerHTML = rep.firstChild.data + oTable.innerHTML;
				if(oTotal) oTotal.innerHTML = parseFloat(oTotal.innerHTML) + 1;
			}
			//force a reload of the rep menu on the next activation so that
			//the duplicate error will show.
			this.menu.parentNode.removeChild(this.menu);
			this.menu = null;

			//alert(repinfo.firstChild.nodeValue);
		}
	}
}

/**
* Populate OnReadyStateChange callback. Uses a closure to keep state.
* Remember to use me instead of "this" inside this function!
*/
vB_ReputationPopupMenu.prototype.handle_menu_load  = function(ajax)
{
	if (ajax.responseXML)
	{
		if (!this.menu)
		{
			// Create new div to hold reputation menu html
			this.menu = document.createElement('div');
			this.menu.id = this.divname;

			YAHOO.util.Dom.addClass(this.menu, "popupbody");
			YAHOO.util.Dom.addClass(this.menu, "popuphover");

			this.container.appendChild(this.menu);
			YAHOO.util.Event.on(this.menu, "keypress", this.repinput_onkeypress, this, true);
		}

		// check for error first
		var error = ajax.responseXML.getElementsByTagName('error');
		if (error.length)
		{
			this.menu.innerHTML = '<div class="blockbody"><div class="blockrow">' + error[0].firstChild.nodeValue + '</div></div>';
		}
		else
		{
			this.menu.innerHTML = ajax.responseXML.getElementsByTagName('reputationbit')[0].firstChild.nodeValue;

			var inputs = fetch_tags(this.menu, 'input');
			for (var i = 0; i < inputs.length; i++)
			{
				if (inputs[i].type == 'submit')
				{
					var sbutton = inputs[i];
					var button = document.createElement('input');
					button.type = 'button';
					button.className = sbutton.className;
					button.value = sbutton.value;
					YAHOO.util.Event.addListener(button, 'click', vB_ReputationPopupMenu.prototype.submit_onclick, this, true);
					sbutton.parentNode.insertBefore(button, sbutton);
					sbutton.parentNode.removeChild(sbutton);
					button.name = sbutton.name;
					button.id = sbutton.name + '_' + this.postid
				}
			}

			this.activate_menu();
			this.open_menu(ajax.argument.e);
		}
	}
}

/**
* Handles click events on reputation submit button
*/

vB_ReputationPopupMenu.prototype.submit_onclick = function (e)
{
	this.submit();
	YAHOO.util.Event.preventDefault(e);
	return false;
}

/**
*	Catches the keypress of the reputation controls to keep them from submitting to inlineMod
*/
vB_ReputationPopupMenu.prototype.repinput_onkeypress = function (e)
{
	switch (e.keyCode)
	{
		case 13:
		{
			YAHOO.util.Event.stopEvent(e);
			this.submit_onclick(e);
			return false;
		}
		default:
		{
			return true;
		}
	}
}

/**
* Queries for proper response to reputation, response varies
*
*/

vB_ReputationPopupMenu.prototype.load_menu = function(e)
{
	// IE loses the event in the argument call below so we send a copy
	var eventCopy = {};
	for (var i in e)
	{
		eventCopy[i] = e[i];
	}
	YAHOO.util.Connect.asyncRequest("POST", "reputation.php?p=" + this.postid, {
		success: this.handle_menu_load,
		failure: this.handle_ajax_error,
		timeout: vB_Default_Timeout,
		scope: this,
		argument: {e:eventCopy}
	}, SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&p=" + this.postid + "&ajax=1");
}

/**
* Handles AJAX Errors
*
* @param	object	YUI AJAX
*/
vB_ReputationPopupMenu.prototype.handle_ajax_error = function(ajax)
{
	//TODO: Something bad happened, try again
	vBulletin_AJAX_Error_Handler(ajax);
};

/**
* Submits reputation
*
*/
vB_ReputationPopupMenu.prototype.submit = function()
{
	this.psuedoform = new vB_Hidden_Form('reputation.php');
	this.psuedoform.add_variable('ajax', 1);
	this.psuedoform.add_variables_from_object(this.menu);

	YAHOO.util.Connect.asyncRequest("POST", "reputation.php?do=addreputation&p=" + this.psuedoform.fetch_variable('p'), {
		success: this.handle_submit,
		failure: this.handle_ajax_error,
		timeout: vB_Default_Timeout,
		scope: this
	}, SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&" + this.psuedoform.build_query_string());
}
function viewallcm(postid)
{
	postidsave = postid;
	fetch_object("cmloading").style.display = "";
	cmAjax = new vB_AJAX_Handler(true);
	cmAjax.onreadystatechange(cmResponse);
	cmAjax.send('ajax.php', 'do=listcm&p='+postid);
}
function cmResponse()
{
	if (cmAjax.handler.readyState == 4 && cmAjax.handler.status == 200)
	{
		fetch_object("cmloading").style.display = "none";
		fetch_object("viewallcm"+postidsave).style.display = "none";
		fetch_object("rep_comment_"+postidsave).innerHTML = cmAjax.handler.responseText;
	}
}

/*======================================================================*\
|| ####################################################################
|| # Downloaded: 23:14, Sun Mar 28th 2010
|| # CVS: $RCSfile$ - $Revision: 26385 $
|| ####################################################################
\*======================================================================*/

