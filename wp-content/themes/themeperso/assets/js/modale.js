const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0]
const pasVisible = document.getElementsByClassName('pasvisible')[0]

modaleOuverture.addEventListener('click', function(){
    modale ()
})
pasVisible.addEventListener('click', function(){
    modale ()
})

function modale(){
    console.log(pasVisible)
    pasVisible.classList.toggle('formactive')
}