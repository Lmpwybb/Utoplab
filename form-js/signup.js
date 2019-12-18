const colorError = "red";
const colorHelp = "green";
var errorPseudo;
var errorEmail;
var errorDate;
var errorConfPassword;

// Help for pseudo
var focusPseudo = document.querySelector("#pseudo");
var helpPseudo = document.querySelector("#helpPseudo");

focusPseudo.addEventListener("focus", function () {
	helpPseudo.textContent = "Entrez votre pseudo";
	helpPseudo.style.color = colorHelp;
});

// Check pseudo on blur
focusPseudo.addEventListener("blur", function () {
	let validPseudo = "";
	let pseudoException = focusPseudo.value;
	let forbidenPseudo = /\b(root|admin|dieu)\b/i;
	// Pseudo unauthorized
	if (forbidenPseudo.test(pseudoException)) {
		validPseudo = "Ce pseudo n'est pas disponible.";
		errorPseudo = true;
	}
	else {
		errorPseudo = false;
	}
	helpPseudo.textContent = validPseudo;
	helpPseudo.style.color = colorError;
});

// Help for Name
var focusName = document.querySelector("#name");
var helpName = document.querySelector("#helpName");

focusName.addEventListener("focus", function () {
	helpName.textContent = "Entrez votre nom.";
	helpName.style.color = colorHelp;
});

// Check on blur
focusName.addEventListener("blur", function () {
	helpName.textContent = "";
});

// Help for first name
var focusFn = document.querySelector("#first-name");
var helpFn = document.querySelector("#helpFn");

focusFn.addEventListener("focus", function () {
	helpFn.textContent = "Entrez votre prénom.";
	helpFn.style.color = colorHelp;
});

// Check on blur
focusFn.addEventListener("blur", function () {
	helpFn.textContent = "";
});

// Help for date
var focusDate = document.querySelector("#date");
var helpDate = document.querySelector("#helpDate");

focusDate.addEventListener("focus", function () {
	helpDate.textContent = "Entrez votre date de naissance.";
	helpDate.style.color = colorHelp;
});

// Check date on blur
focusDate.addEventListener("blur", function (date) {
	let validDate = "";
	let dateNotsure = focusDate.value;
	let formatDate = /^(0?[1-9]|[1-2][0-9]|3[0-1])[\/](0?[1-9]|1[0-2])[\/](19[1-9]\d|20[0-9]\d|2100)$/;
	let slash = date.target.value.split("/");
	let currentDate = new Date();
	let day = currentDate.getDate();
	let month = currentDate.getMonth()+1;
	let year = currentDate.getFullYear();
	// Date checking
	if (!formatDate.test(dateNotsure)) {
		validDate = "Ce format de date n'est pas valable.";
		errorDate = true;
	}
	else if ((year - 18) < slash[2]) {
		validDate = "Vous devez être majeur pour vous enregistrer.";
		errorDate = true;
	}
	else if ((year - 18) == slash[2] && month < slash[1]) {
		validDate = "Vous devez être majeur pour vous enregistrer.";
		errorDate = true;
	}
	else if ((year - 18) == slash[2] && month == slash[1] && day < slash[0]) {
		validDate = "Vous devez être majeur pour vous enregistrer.";
		errorDate = true;
	}
	else {
		errorDate = false;
	}
	helpDate.textContent = validDate;
	helpDate.style.color = colorError;
});

// Help for email
var focusEmail = document.querySelector("#email");
var helpEmail = document.querySelector("#helpEmail");

focusEmail.addEventListener("focus", function () {
	helpEmail.textContent = "Entrez votre courriel.";
	helpEmail.style.color = colorHelp;
});

// Check email on blur
focusEmail.addEventListener("blur", function () {
	let validEmail = "";
	let emailValue = focusEmail.value;
	let arobase = emailValue.split("@");
	let formatEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	// Email unauthorized
	if (emailValue == "root@paca.happy-dev.fr" || emailValue == "admin@paca.happy-dev.fr" || emailValue == "dieu@paca.happy-dev.fr") {
		validEmail = "Cette adresse email n'est pas disponible.";
		errorEmail = true;
	}
	// If email format is not respected 
	else if (!formatEmail.test(emailValue)) {
		validEmail = "Ce n'est pas une adresse email valide.";
		errorEmail = true;
	}
	// If 64 char precedes @
	else if (arobase[0].length > 64) {
		validEmail = "Ce n'est pas une adresse email valide, car il y a 64 caractères précédent le @.";
		errorEmail = true;
	}
	else {
		errorEmail = false;
	}
	helpEmail.textContent = validEmail;
	helpEmail.style.color = colorError;
});

// Help for password
var focusPassword = document.querySelector("#password");
var helpPassword = document.querySelector("#helpPassword");

focusPassword.addEventListener("focus", function () {
	helpPassword.textContent = "Entrez votre mot de passe.";
	helpPassword.style.color = colorHelp;
});

// Check on blur
focusPassword.addEventListener("blur", function () {
	helpPassword.textContent = "";
});

// Help for password confirmation
var focusConfpassword = document.querySelector("#confpassword");
var helpConfpassword = document.querySelector("#helpConfpassword");

focusConfpassword.addEventListener("focus", function () {
	helpConfpassword.textContent = "Confirmez votre mot de passe.";
	helpConfpassword.style.color = colorHelp;
});

// Check passwords on blur
focusConfpassword.addEventListener("blur", function () {
	let validPassword = "";
	if (focusConfpassword.value != focusPassword.value) {
		validPassword = "Les mots de passe ne correspondent pas.";
		errorConfPassword = true;
	}
	else {
		errorConfPassword = false;
	}
	helpConfpassword.textContent = validPassword;
	helpConfpassword.style.color = colorError;
});

var clickOnSubmit = document.querySelector("#form");
var helpSubmit = document.querySelector("#response");

// Check submit error on click
clickOnSubmit.addEventListener("submit", function (submit) {
	let checkForm = "";
	if (errorPseudo == true || errorEmail == true || errorDate == true || errorConfPassword == true) {
		checkForm = "Veuillez corriger les erreurs du formulaire.";
		helpSubmit.style.color = colorError;
	}
	else {
		checkForm = "Votre formulaire a bien été soumis.";
		helpSubmit.style.color = colorHelp;
	}
	submit.preventDefault();
	helpSubmit.textContent = checkForm;
});
