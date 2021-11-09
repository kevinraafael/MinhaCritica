function login() { 
	window.location.href = "..\\.\\Login\\index.html"
}
function goToHomePage() { 
	window.location.href = "..\\.\\Home\\index.html"
}
//Redirecionamento por filmes
function movieMenu() {
	window.location.href = "..\\.\\Movie\\suicideSquad.html" //mudar
}
function goToSuicideSquad() {
	window.location.href = "..\\.\\Movie\\suicideSquad.html"
}
function goToTheTallMan() {
	window.location.href = "..\\.\\Movie\\theTallMan.html"
}
function goToFreeGuy() {
	window.location.href = "..\\.\\Movie\\freeGuy.html"
}
function goToKingKongVs() {
	window.location.href = "..\\.\\Movie\\kingKongVsGodzilla.html"
}
function goToSpaceJam() {
	window.location.href = "..\\.\\Movie\\spaceJam.html"
}
function goToTheBox() {
	window.location.href = "..\\.\\Movie\\theBox.html"
}
function goTo3homensE1Destiono() {
	window.location.href = "..\\.\\Movie\\TheGoodTheBadAndTheUgly.html"
}
function goToThePurge() {
	window.location.href = "..\\.\\Movie\\thePurge.html"
}

function goToSpiderMan() {
	window.location.href = "..\\.\\Book\\Spider-Man.html"
}
/*
function perfil() {
	window.location.href = "..\\.\\Profile\\index.html"
}
function registration() {
	window.location.href = "..\\.\\registration\\index.html"
}
*/
function search() {
	if (event.keyCode == 13) {
		let search = document.getElementById("search").value; 
		window.location.href = "..\\.\\Search\\index.html?search="+search;	
	}
}
//TODO ainda posso usar este metodo para receber os valores da API ou do Banco
function getRequest() {
	let urlAtual = window.location.href;
	$('#result_pesq').html('Resultado para <strong>'+urlAtual.substring(urlAtual.indexOf('=')+1).replace("%20"," ")+'</strong>');
}