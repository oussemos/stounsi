//Ramil's script webform.js v 1.0 28 Aug 2008

// Copyright (c) 2008 Amersyanov Ramil (email: ram88+live.ru)


/*
	<div id="photo_upload">
		<table>
			<tr>
				<td>Text:</td> 
				<td><input type="text" name="text_number_"> </td>
				<td rowspan="2"><button id="remove_button">Remove this page</button></td>
			</tr>
			<tr>
				<td>Photo:</td>
				<td><input type="file" name="photo_upload_number_"></td>
			</tr>
		</table>
	</div>
		<button id="add_button">Add another page</button>
		
	<script>
		new Ramil_Webforms($('photo_upload'), 
		 {
		  removeButton: "remove_button", 
		  addButton: "add_button",
		  debug: true
		});
	</script>
*/

Ramil_Webforms = Class.create({
	initialize: function(element, options)
	{
		this.element = element;
		this.options = options;
		this.count = 0;
		this._allContainer = [];
		this.options._removeButtons = [];
	
		this.options.addButton = $(this.options.addButton);
		this.options.addButton.onclick = this.createContainer.bind(this);
		
		//hide container from DOM
		this.element.hide();
		//disable all inputs fields
		this.disableInputs(this.element);
		
		//create copy of this container
		this.createContainer();
	},
	
	tags: ['input', 'textarea', 'select', 'button'],
	
	test: function()
	{
		if (this.options.debug == true)
			alert(this.element.childNodes.length);
			
		//this.element.hide();
		for(i=0;i<this.element.childNodes.length; i++)
		{
			//��� ����
			alert(this.element.childNodes[i].tagName);

			if (this.element.childNodes[i].tagName !== undefined)
			{
				//��������� ������ ��������
				this.element.childNodes[i].setAttribute('author', 'Ramil');

				//���������� ���������
				//this.element.childNodes[i].attributes.length
				
				//��� ��������
				//this.element.childNodes[i].attributes[j].name

				//�������� ��������
				//this.element.childNodes[i].attributes[j].value

				//���������� � ������� ��������
				//toLowerCase()
				
				if (this.options.debug == true)
					alert("���������� ��������� = "+this.element.childNodes[i].attributes.length);
				
				for(j=0;j<this.element.childNodes[i].attributes.length; j++)
				{
					alert("Name = "+this.element.childNodes[i].attributes[j].name+"\r\nValue = "+this.element.childNodes[i].attributes[j].value);
				}
				
			}
		}
	},
	
	createContainer: function(e)
	{
		if (this.options.debug == true)
			alert("��� ���� = "+this.element.tagName.toLowerCase());
		
		var parentTagName = this.element.tagName.toLowerCase();
		
		var newElement = $(document.createElement(parentTagName));
		
		//set new ID for div
		newElement.id = this.element.id+"_"+this.count;
		//push in array
		this._allContainer.push(newElement);
		
		this.element.parentNode.insertBefore(newElement, this.element);
		
		if (this.options.debug == true)
			alert("����� ������� ���� = "+this.element.outerHTML);
		
		newElement.innerHTML = this.element.innerHTML;

		//get all input elements
		var inputs = this.getElements(newElement, false);
		
		$A(inputs).each(function (item)
		{
			//change 'name' attribute in finding elements
			if (item.tagName.toLowerCase() != 'button')
			{
				//get the 'name' attribute
				var name = item.getAttribute('name');
				//add counter to this name and set new name
				item.setAttribute('name', name+""+this.count);
			}
			else
				item.id = item.id+'_'+this.count;
		}.bind(this));
		
		this.enableInputs(newElement);
			
		var rmvButton = $(this.options.removeButton+'_'+this.count);
		//rmvButton.innerHTML = this.count;
		rmvButton.onclick = this.removeContainer.bind(this);
		//Event.observe(rmvButton, 'click', this.removeContainer, false);
		
		if (this.options.debug == true)
			alert("����� ������ ���� = "+newElement.outerHTML);

		//increase counter
		this.count++;
		
		if (e) Event.stop(e);
	}, 
	
	getElements: function(root, isRecursive)
	{
		if (isRecursive == false)
			this.result = [];

		for(var i=0;i<root.childNodes.length; i++)
		{
			var tempElement = root.childNodes[i];

			if (tempElement.tagName !== undefined)
			{
				if (this.tags.include(tempElement.tagName.toLowerCase()))
				{
					this.result.push(tempElement);
				}
				else
				{
					this.getElements(tempElement, true);
				}
			}
		}
		
		return this.result;
	},
	
	removeContainer: function(e)
	{
		var btn;
		//firefox, opera
		if(e && e.target)
			btn = e.target;
		//IE
		else if(window.event)
			btn = event.srcElement;

		var parent = this.findParent(btn);
		if (parent)
			parent.remove();

		if (e) Event.stop(e);
	},
	
	findParent: function(childElement)
	{
		while (childElement = childElement.parentNode)
		{
			if (childElement.id.indexOf(this.element.id)===0)
				return childElement;
		}
	},
	
	disableInputs: function(element)
	{
		//get all input elements
		var inputs = this.getElements(element, false);
		
		$A(inputs).each(function (item)
		{
			item.disabled = true;		
		}.bind(this));
	},
	
	enableInputs: function(element)
	{
		//get all input elements
		var inputs = this.getElements(element, false);
		
		$A(inputs).each(function (item)
		{
			item.disabled = false;		
		}.bind(this));
	}
});