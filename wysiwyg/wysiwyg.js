
function iFrameOn() {
	
	richTextField.document.designMode = 'On';
		
}

function iBold() {
	
	richTextField.document.execCommand('bold', false, null);
	
}

function iItalic() {
	
	richTextField.document.execCommand('italic', false, null);
}

function iUnderline() {
	
	richTextField.document.execCommand('underline', false, null);
	
}

function iHighlight() {
	
	richTextField.document.execCommand('bold', false, null);
	
}

function iFontStyle() {
	
	var font_name = prompt('Enter font style:', '');
	richTextField.document.execCommand('FontName', false, font_name);
}

function iFontSize() {
	
	var size = prompt('Enter a size 1-7', '');
	richTextField.document.execCommand('FontSize', false, size);
}

function iFontColor() {
	
	var color = prompt('Define a basic color or apply a hexadecimal color mode for advanced colors:', '');
	richTextField.document.execCommand('FontColor', false, color);
}

function iAlignLeft() {
	
	richTextField.document.execCommand('JustifyLeft', false, null);
}

function iAlignCenter() {
	
	richTextField.document.execCommand('JustifyCenter', false, null);
}

function iAlignRight() {
	
	richTextField.document.execCommand('JustifyRight', false, null);
}

function iIndent() {
	
	richTextField.document.execCommand('indent', false, null);
	
}

function iOutdent() {
	
	richTextField.document.execCommand('outdent', false, null);
}

function iUnorderedList() {
	
	richTextField.document.execCommand('InsertUnorderedList', false, 'newUL');
	
}

function iOrdereredList() {
	
	richTextField.document.execCommand('InsertOrderedList', false, 'newOL');
	
}


function iMargin() {
	
	
}

/*function submit_form() {
	
	var iForm = document.getElementById("p_form");
	iForm.elements["documentBody"].value = window.frames['richTextField'].document.body.innerHTML;
	iForm.submit();
}*/




