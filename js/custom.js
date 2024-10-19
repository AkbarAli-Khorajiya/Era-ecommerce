const navlink = document.querySelectorAll('.nav-item');

navlink.forEach(nav =>{
    nav.addEventListener('click',()=>{
        document.querySelector('.active').classList.remove('active');
        nav.classList.add('active');
    });
})

const section = document.querySelectorAll('.section');

window.addEventListener('scroll',checkbox);

checkbox();

function checkbox() {
    const trig = window.innerHeight * 1.5;

    section.forEach(sec =>{
        const secTop = sec.getBoundingClientRect().top;

        if(secTop < trig){
            sec.classList.add('show');
        }
        else{
            sec.classList.remove('show');
        }
    })
    
}