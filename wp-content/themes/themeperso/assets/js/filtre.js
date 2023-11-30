const tout = document.getElementById('tout')
const photos = document.getElementsByClassName('photos')
const filtres = document.getElementsByClassName('filtre')
const choix = document.getElementById('choix')

tout.addEventListener('click', function(){
    affiche ()
})

function affiche (){
    for (let i = 0; i< photos.length; i++) {
    photos[i].classList.remove('cacher')
}}

function filtre() {
    for (let i = 0; i< filtres.length; i++){
        filtres[i].addEventListener('change', function(){
            choix.submit()
        })
    }
}
filtre()

// slide image miniature 


let left = document.getElementById('left')
let right = document.getElementById('right')
let miniList = document.getElementsByClassName('miniature')
let currentSlide = 0

if(left){
left.addEventListener("click", function () {
    miniList[currentSlide].classList.remove('activemini')
	if (
		currentSlide <= 0
	){
		currentSlide = miniList.length-1
	}
	else {
		currentSlide = currentSlide-1
	}
    miniList[currentSlide].classList.add('activemini')
});}
if(right){
right.addEventListener("click", function () {
    miniList[currentSlide].classList.remove('activemini')
	if (
		currentSlide+1 >= miniList.length
	){
		currentSlide = 0
	}
	else {
		currentSlide = currentSlide+1
	}
    miniList[currentSlide].classList.add('activemini')
	console.log("pour verifier suivant")
});}


