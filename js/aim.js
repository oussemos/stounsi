/**
*
*  AJAX IFRAME METHOD (AIM)
*  http://www.webtoolkit.info/
*
**/

AIM = Class.create({
	initialize: function(element, options)
	{
		this.element = element;
		this.n = 'f' + Math.floor(Math.random() * 99999);
		//Object.extend(this.options, options || { });
		this.options = options || { };
	},
	
    frame : function() 
	{
        var d = $(document.createElement('div')); //style="display:none"
		d.onload = this.loaded.bind(this);
        d.innerHTML = '<iframe src="about:blank" id="'+this.n+'" name="'+this.n+'" onload="aim.loaded(\''+this.n+'\')"></iframe>';
        this.element.parentNode.insertBefore(d, this.element);
		//document.body.appendChild(d);

        //var i = document.getElementById(this.n);
        //if (c && typeof(c.onComplete) == 'function') {
            //i.onComplete = c.onComplete;
        //}

        return this.n;
    },

    form : function(f, name) {
        f.setAttribute('target', name);
    },

    submit : function() 
	{
        //AIM.form(f, AIM.frame(c));
		this.frame();
        if (this.options && typeof(this.options.onStart) == 'function') {
            return this.options.onStart();
        } else {
            return true;
        }
    },

    loaded : function(id) 
	{
		//alert(id);
        var i = document.getElementById(id);
        if (i.contentDocument) {
            var d = i.contentDocument;
        } else if (i.contentWindow) {
            var d = i.contentWindow.document;
        } else {
            var d = window.frames[id].document;
        }
        if (d.location.href == "about:blank") {
           // alert("return");
			return;
        }

        if (typeof(this.options.onComplete) == 'function') {
            this.options.onComplete(d.body.innerHTML);
        }
    },
	
	getFrameID: function()
	{
		return this.n;
	}

});