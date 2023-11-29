// modale contact 
const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0];
const pasVisible = document.getElementsByClassName('pasvisible')[0];
const formeContact = document.getElementsByClassName('formecontact')[0];
const modaleCacher = document.getElementsByClassName('modalecacher')[0];


modaleOuverture.addEventListener('click', function(){
    modaleOpen ();
})
pasVisible.addEventListener('click', function(){
    modaleClose ();
})

function modaleOpen(){
    modaleCacher.classList.add('formactive');
}
function modaleClose(){
    modaleCacher.classList.remove('formactive');
}

// lightbox 

let cadreList = document.getElementsByClassName('cadre');
for(i=0; i < cadreList.length; i++) {
        cadreList[i].addEventListener('click', function(e){
            let lightId = e.target.id.replace('photo', 'light')
            console.log(lightId);
        openLightbox(lightId);
    })
}

function openLightbox(lightId){
    console.log(lightId);

    let lightBox = document.getElementById(lightId);
    lightBox.classList.add('activebox');
    let close = lightBox.getElementsByClassName('closelightbox')[0];
    close.addEventListener('click',function(e){
        console.log(e.target)
        closeLightbox(lightBox);
    })
    
}
function closeLightbox(lightBox){
    lightBox.classList.remove('activebox');
}