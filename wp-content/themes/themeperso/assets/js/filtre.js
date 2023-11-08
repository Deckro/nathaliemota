const tout = document.getElementById('tout')
const photos = document.getElementsByClassName('photos')

tout.addEventListener('click', function(){
    affiche ()
})

function affiche (){
    for (let i = 0; i< photos.length; i++) {
    photos[i].classList.remove('cacher')
}}