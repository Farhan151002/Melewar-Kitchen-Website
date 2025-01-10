// change navbar style on scroll
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 100)
})

// show/hide nav menu
const menu = document.querySelector("nav-menu");
const menuBtn = document.querySelector("#open-menu-btn");
const closeBtn = document.querySelector("#close-menu-btn");

menuBtn.addEventListener('click', () => {
    menu.style.display = 'flex';
    closeBtn.style.display = 'inline-block';
    menuBtn.style.display = 'none';
})

//close nav menu
const closeNav = () => {
    menu.style.display = 'none';
    closeBtn.style.display = 'none';
    menuBtn.style.display = 'inline-block';
}

closeBtn.addEventListener('click', closeNav)


const viewUser = document.querySelector('.view-users-link');
const info = document.querySelector('.view-users-linkk');
info.classList.add('active');
viewUser.addEventListener('click',()=>{
    document.getElementById("myLink").click();
    info.classList.add('active');
    form.classList.remove('active');
    dlete.classList.remove('active');
    
})

//sinii
const person = document.getElementById('John');
const form = document.querySelector('.update-user-form');
//const dlete = document.querySelector('.delete-user-form');
const updateUser = document.querySelector('.update-users-link');

person.addEventListener('click',()=>{
    form.classList.toggle('active');
    dlete.classList.toggle('active');
})
updateUser.addEventListener('click',()=>{
    form.classList.remove('active');
    dlete.classList.remove('active');
})
//sini
document.getElementById("myLink").click();
function openMenu(evt, menuName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  
function doneupdate(){
    alert("Done Update Menu!!");
}
function doneadd(){
    alert("Done Add Menu!!");
}
function donedelete(){
    alert("Done Delete Menu!!");
}