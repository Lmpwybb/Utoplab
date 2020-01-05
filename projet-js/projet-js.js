const learner = [
	"Benjamin Gouget",
	"Florian Farris",
	"Said Zenafi",
	"Yannis Aouachria",
	"Pierre Denaes",
	"Morgan Trainoir",
	"Coralie Damery",
	"Quentin Robert",
	"Alexandre Chauvet",
	"Sebastien Cartoux",
	"Davis Haas",
	"Sofiane Sotehi",
	"Yoan Baldacchino",
	"Nicolas Degabriel",
	"Ayman Bratzu",
	"Quentin Queffurus",
	"Killian Pasquier",
	"Jérôme Laurent",
	"Jean-Daniel Pontremoli",
	"Marjorie Ngoupende",
	"Christophe Coutures",
	"Michel Christophe"
];

const randomName = function (){
	document.getElementById("display").innerHTML = learner[Math.floor(Math.random()*learner.length)]
};

const allName = function(){
	document.getElementById("display").innerHTML="";
	let ul = document.createElement('ul');
	document.getElementById('display').appendChild(ul);
	
	learner.forEach(function(name){
		let li = document.createElement('li');
		ul.appendChild(li);
		li.innerHTML += name;
});};
