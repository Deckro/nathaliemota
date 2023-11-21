const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0]
const pasVisible = document.getElementsByClassName('pasvisible')[0]
const middleContact = document.getElementById('middlecontact')

modaleOuverture.addEventListener('click', function(){
    modale ()
})
pasVisible.addEventListener('click', function(){
    modale ()
})
middleContact.addEventListener('click', function(){
    modale ()
})

function modale(){
    pasVisible.classList.toggle('formactive')
}