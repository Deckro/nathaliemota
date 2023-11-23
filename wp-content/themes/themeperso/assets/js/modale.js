const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0]
const pasVisible = document.getElementsByClassName('pasvisible')[0]
const cadre = document.getElementsByClassName('cadre')[0]
const eye = document.getElementById('eye')
const lightBox = document.getElementsByClassName('lightbox')[0]
const formeContact = document.getElementsByClassName('formecontact')[0]
const modaleCacher = document.getElementsByClassName('modalecacher')[0]
const closeLightBox = document.getElementById('closelightbox')


modaleOuverture.addEventListener('click', function(){
    modaleOpen ()
})
pasVisible.addEventListener('click', function(){
    modaleClose ()
})

function modaleOpen(){
    modaleCacher.classList.add('formactive')
}
function modaleClose(){
    modaleCacher.classList.remove('formactive')
}


cadre.addEventListener('click', function(){
    openLightbox()
})
closeLightBox.addEventListener('click',function(){
    closeLightbox()
})



function openLightbox(){
    lightBox.classList.add('activebox')
}
function closeLightbox(){
    lightBox.classList.remove('activebox')
}