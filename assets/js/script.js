const header = document.querySelector('header');
const sidebar = document.querySelector('aside');
const main = document.querySelector('main');
const footer = document.querySelector('footer');
const toggleSidebar = document.querySelector('#toggleSidebar');
const toggleClose = document.querySelector('#toggleClose');


toggleSidebar.addEventListener("click", () =>{
    sidebar.classList.toggle('active');
    header.classList.toggle('active');
    main.classList.toggle('active');
    footer.classList.toggle('active');
})