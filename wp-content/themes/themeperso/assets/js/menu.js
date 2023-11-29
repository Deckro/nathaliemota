var sidenav = document.getElementById('sidenav');
var openBtn = document.getElementById('openBtn');
var closeBtn = document.getElementById('closeBtn');

openBtn.addEventListener('click', function(){
    openBtnNav()
})
closeBtn.addEventListener('click', function (){
    closeBtnNav()
})

function openBtnNav (){
    sidenav.classList.add('active2')
    openBtn.classList.add('active2')
    closeBtn.classList.add('active2')
}

function closeBtnNav (){
    sidenav.classList.remove('active2')
    openBtn.classList.remove('active2')
    closeBtn.classList.remove('active2')
}