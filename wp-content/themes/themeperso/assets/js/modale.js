const modaleOuverture = document.getElementsByClassName('modale_ouverture')[0]
const formeContact = document.getElementsByClassName('formecontact')[0]

modaleOuverture.addEventListener('click', function(){
    modale ()
})

function modale(){
    console.log(formeContact)
    formeContact.classList.add('formactive')
}