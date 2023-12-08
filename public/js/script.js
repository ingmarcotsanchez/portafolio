//Menu
let menuIcon = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}


/*script para el scroll */
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 100;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id +']').classList.add('active');
            });
            sec.classList.add('show-animate');
        }else{
            sec.classList.remove('show-animate');
        }
    });
    let header = document.querySelector('header');
    header.classList.toggle('sticky',window.scrollY > 100);

    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');
}
/*Script para la sección de skills*/
const tabs = document.querySelectorAll('[data-target]'),
        tabContent = document.querySelectorAll('[data-content]')

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const target = document.querySelector(tab.dataset.target)
            tabContent.forEach(tabContents => {
                tabContents.classList.remove('skills-active')
            })
            target.classList.add('skills-active')

            tabs.forEach(tab => {
                tab.classList.remove('skills-active')
            })
            tab.classList.add('skills-active')
        })
    })

/*Script para la sección del portafolio */
let mixerPortfolio = mixitup('.work-container', {
    selectors: {
        target: '.work-card'
    },
    animation: {
        duration: 300
    }
});

    const linkWork = document.querySelectorAll('.work-item')
    function activeWork(){
        linkWork.forEach(l=> l.classList.remove('active-work'))
        this.classList.add('active-work')
    }
    linkWork.forEach(l=>l.addEventListener("click", activeWork))

    /*Popup*/
    document.addEventListener("click", (e) => {
        if(e.target.classList.contains("work-button")){
            togglePortfolioPopup();
            portfolioItemDetails(e.target.parentElement);
        }
    })
    function togglePortfolioPopup(){
        document.querySelector(".portfolio-popup").classList.toggle("open");
    }

    document.querySelector(".portfolio-popup-close").addEventListener("click", togglePortfolioPopup)

    function portfolioItemDetails(portfolioItem){
        //console.log(portfolioItem)
        document.querySelector(".pp-thumbnail img").src = portfolioItem.querySelector(".work-img").src;
        document.querySelector(".portfolio-popup-subtitle span").innerHTML = portfolioItem.querySelector(".work-title").innerHTML;

        document.querySelector(".portfolio-popup-body").innerHTML = portfolioItem.querySelector(".portfolio-item-details").innerHTML;
    }
