const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0]
const pasVisible = document.getElementsByClassName('pasvisible')[0]
const middleContact = document.getElementById('middlecontact')
const eye = document.getElementsByClassName('eye')[0]
const cadre = document.getElementsByClassName('cadre')[0]
const lightBox = document.getElementsByClassName('lightbox')[0]
const formeContact = document.getElementsByClassName('formecontact')[0]
const modaleCacher = document.getElementsByClassName('modalecacher')[0]


modaleOuverture.addEventListener('click', function(){
    modaleOpen ()
})
pasVisible.addEventListener('click', function(){
    modaleClose ()
})
middleContact.addEventListener('click', function(){
    modaleOpen ()
})

function modaleOpen(){
    modaleCacher.classList.add('formactive')
}
function modaleClose(){
    modaleCacher.classList.remove('formactive')
}


eye.addEventListener('click', function(){
    lightbox()
})

function lightbox(){
    lightBox.classList.add('activebox')
}