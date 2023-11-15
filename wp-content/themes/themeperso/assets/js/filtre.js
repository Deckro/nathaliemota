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
            console.log('moi')
            choix.submit()
        })
    }
}
filtre()