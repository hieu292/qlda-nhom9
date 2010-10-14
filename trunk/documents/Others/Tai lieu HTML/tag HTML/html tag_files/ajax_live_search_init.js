/**
 * [AJAX] Live Search
 * Initialise Script
 * Version 4.0.0
 * @author mad@Max
 */
function AJAX_LiveSearch_Init(varname, textobjid, bb){
    if (!fetch_object("lsa_window")) {
        this.wobj = fetch_object("lsa_window");
        this.tobj = fetch_object(textobjid);
        this.tobj.value = vbphrase['live_search'];
        this.tobj.obj = this;
        
        this.tobjid = textobjid;
        this.vname = varname;
        if (location.href.search(/www\./) != -1) {
            if (bb.search(/www\./) != -1) {
                this.bb = bb;
            }
            else {
                this.bb = 'http://www.' + ((bb.substring(0,7) == 'http://') ? bb.substring(7) : bb);
            }
        }
        else {
            this.bb = (bb.search(/www\./) != -1) ? bb.replace(/www\./,'') : bb;
        }        
        this.tobj.onfocus = function(e){
            this.obj.active = true;
            this.obj.lsawinop();
        };
    }
}

AJAX_LiveSearch_Init.prototype.lsawinop = function(){
    this.tobj.value = '';
    this.tobj.value = vbphrase['lsa_loading'];
    var me = this;
    
    YAHOO.vBulletin.LoadScript(this.bb + "/clientscript/ajax_live_search.js", function(){
        if (typeof(YAHOO.util.DD) == 'undefined') {
            YAHOO.vBulletin.LoadScript("http://yui.yahooapis.com/2.7.0/build/dragdrop/dragdrop-min.js", function(){
                me.load();
            });
        }
        else {
            me.load();
        }
    });
};

AJAX_LiveSearch_Init.prototype.load = function(){
    YAHOO.util.Connect.asyncRequest("POST", this.bb + '/ajaxlivesearch.php?do=lsawin', {
        success: this.request,
        failure: vBulletin_AJAX_Error_Handler,
        timeout: vB_Default_Timeout,
        scope: this
    }, SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&do=lsawin");
};

AJAX_LiveSearch_Init.prototype.request = function(o){
    if (o.responseXML) {
        var getwin = o.responseXML.getElementsByTagName("lsagetwin")[0].firstChild.nodeValue;
        var div = document.createElement("div");
        div.id = "lsa_cont";
        div.style.position = "absolute";
        div.style.zIndex = 100;
        div.style.display = "none";
        div.innerHTML = getwin;
        document.body.appendChild(div);
        if (YAHOO.util.Dom.get("lsa_window")) {
            this.tobj.value = '';
            lsaget = new AJAX_LiveSearch(this.vname + 'get', this.tobjid, this.bb);
            var lsdd = new YAHOO.util.DD(div.id);
            lsdd.setHandleElId("lsadd");
            lsaget.winop();
            init_collapsers();
        }
    }
};