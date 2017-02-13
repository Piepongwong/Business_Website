//associativeLinkArray's elements consist out of two dimensional arrays, first is link, second is name
//returns a dom object

function createDropdown(menuIconPath, twoDimensionalLinkArray) { 

	linkObjectArray = [];

	var finalDom = document.createElement("div");
	finalDom.className = "dropdown";
	
	var aMenuIcon = document.createElement("img");
	aMenuIcon.src = menuIconPath;
	aMenuIcon.className = "dropbtn";
	aMenuIcon.width = "20";

	var dropCon = document.createElement("div");
	dropCon.className = "drop-content";

	for(var i = 0; i < twoDimensionalLinkArray.length; i++) {
		var aLink = document.createElement('a');
		aLink.href = twoDimensionalLinkArray[i][0];
		aLink.innerHTML = twoDimensionalLinkArray[i][1];

		linkObjectArray.push(aLink); 
	};

	for(var i = 0; i < linkObjectArray.length; i++) {
		dropCon.appendChild(linkObjectArray[i]);
	}

	finalDom.appendChild(aMenuIcon);
	finalDom.appendChild(dropCon);

	return finalDom;
}