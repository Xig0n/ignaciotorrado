/*const switchButton = document.getElementById('switch');
 
switchButton.addEventListener('click', () => {
    document.body.classList.toggle('dark'); //toggle the HTML body the class 'dark'
    switchButton.classList.toggle('active');//toggle the HTML button with the id='switch' with the class 'active'
});*/


const switchButton = document.getElementById('switch');

const luna = document.getElementById("imgLuna");
const sol = document.getElementById("imgSol");
 
switchButton.addEventListener('click', () => {
    document.body.classList.toggle('dark'); //toggle the HTML body the class 'dark'
    luna.classList.toggle('oscuro');
    sol.classList.toggle('claro');
});