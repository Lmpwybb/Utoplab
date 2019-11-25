// Here the pageClasses are equal to the Classname send by the button
function turn(pageClassA, pageClassB) {
// Here we are creating constant who is query select the Classname send by the button
	const pageA = document.querySelector(pageClassA);
	const pageB = document.querySelector(pageClassB);
// Here we are switching divs by the constant previously created depending on this actual position
	if (pageA.style.display === "block") {
		pageA.style.display = "none";
	} 
	else {
		pageA.style.display = "block";
		pageB.style.display = "none";
	}
}
