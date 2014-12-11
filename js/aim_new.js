/**
*
*  AJAX IFRAME METHOD (AIM)
*  http://www.webtoolkit.info/
*
**/

/*

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
        d.innerHTML = '<iframe src="about:blank" style="display:none" id="'+this.n+'" name="'+this.n+'" onload="aim.loaded(\''+this.n+'\')"></iframe>';
        this.element.parentNode.insertBefore(d, this.element);
		document.body.appendChild(d);

        var i = document.getElementById(this.n);
        if (c && typeof(c.onComplete) == 'function') {
            i.onComplete = c.onComplete;
        }

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
*/
/**
*
*  AJAX IFRAME METHOD (AIM)
*  http://www.webtoolkit.info/
*
**/

function updStartCallback() {
				// make something useful before submit (onStart)
				return true;
			}

			function updCompleteCallback(response) {
				// make something useful after (onComplete)
				document.getElementById('nr').innerHTML = parseInt(document.getElementById('nr').innerHTML) + 1;
				document.getElementById('r').innerHTML = response;
			}


AIM = {

	frame : function(c) {

		var n = 'f' + Math.floor(Math.random() * 99999);
		var d = document.createElement('DIV');
		d.innerHTML = '<iframe style="display:none" src="about:blank" id="'+n+'" name="'+n+'" onload="AIM.loaded(\''+n+'\')"></iframe>';
		document.body.appendChild(d);

		var i = document.getElementById(n);
		if (c && typeof(c.onComplete) == 'function') {
			i.onComplete = c.onComplete;
		}

		return n;
	},

	form : function(f, name) {
		f.setAttribute('target', name);
	},

	submit : function(f, c) {
		AIM.form(f, AIM.frame(c));
		if (c && typeof(c.onStart) == 'function') {
			return c.onStart();
		} else {
			return true;
		}
	},

	loaded : function(id) {
		var i = document.getElementById(id);
		if (i.contentDocument) {
			var d = i.contentDocument;
		} else if (i.contentWindow) {
			var d = i.contentWindow.document;
		} else {
			var d = window.frames[id].document;
		}
		if (d.location.href == "about:blank") {
			return;
		}

		if (typeof(i.onComplete) == 'function') {
			i.onComplete(d.body.innerHTML);
		}
	}

}