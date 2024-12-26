const sidebar = document.querySelector('#sidebar'); 
const toggleSidebar = document.querySelector('#toggleSidebar');
const toggleClose = document.querySelector('#toggleClose');


toggleSidebar.addEventListener("click", () =>{
    sidebar.style.width = "200px";
    toggleSidebar.style.display = "none";
    header.style.justifyContent = "end";
})
toggleClose.addEventListener("click", ()=>{
    sidebar.style.width = "0";
    toggleSidebar.style.display = "flex";
    header.style.justifyContent = "space-around";
})

