// modale contact 
const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0];
const pasVisible = document.getElementsByClassName('pasvisible')[0];
const formeContact = document.getElementsByClassName('formecontact')[0];
const modaleCacher = document.getElementsByClassName('modalecacher')[0];


modaleOuverture.addEventListener('click', function(ev){
    const refField = document.querySelector("input[name='your-subject']")
    refField.value = ''
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


// lightbox change slide

let lightBoxs = document.querySelectorAll('.photos:not(.cacher) .lightbox')
const lightBoxS = document.getElementsByClassName('lightbox_right')
const lightBoxP = document.getElementsByClassName('lightbox_left')
console.log(lightBoxP, lightBoxS)


tout.addEventListener('click', function(){
    lightBoxs = document.querySelectorAll('.photos:not(.cacher) .lightbox')
})
function findcurrentBox(){
    for(i=0; i < lightBoxs.length; i++){
        if(lightBoxs[i].classList.contains('activebox')){
            return i 
        }
    }
}

for(i=0; i < lightBoxP.length; i++){
    lightBoxP[i].addEventListener("click", function () {
        let currentBox = findcurrentBox()
        closeLightbox(lightBoxs[currentBox])
        if (
            currentBox <= 0
        ){
            currentBox = lightBoxs.length-1
        }
        else {
            currentBox = currentBox-1
        }
        openLightbox(lightBoxs[currentBox].id)
    });}

for(i=0; i < lightBoxS.length; i++){   
    lightBoxS[i].addEventListener("click", function () {
        let currentBox = findcurrentBox()
        closeLightbox(lightBoxs[currentBox])
        if (
            currentBox+1 >= lightBoxs.length
        ){
            currentBox = 0
        }
        else {
            currentBox = currentBox+1
        }
        openLightbox(lightBoxs[currentBox].id)
    });}


