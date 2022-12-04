export default function initMenu(app) {
    //Mobile Menu
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const rightHeaderItem = document.querySelector('.main-header .right');

    function handleMobileMenu() {
        rightHeaderItem.classList.toggle('active');
    }

    mobileMenuToggle.addEventListener('click',handleMobileMenu);

    if(app) {
        //Aside Menu
        const asideNav = document.querySelector('aside.side-nav');
        const asideNavLinks = asideNav.querySelectorAll('.nav li a');
        const asideMenuToggle = asideNav.querySelector('.toggle-nav');
        const headerTasksTitle = document.querySelector('.header-tasks .info-text');
        const currentUrl = window.location.href;
        const queryIndex = currentUrl.indexOf('query');
        const queryText = currentUrl.slice(queryIndex).trim();

        function handleAsideMenu() {
            app.classList.toggle('side-disabled');
        }

        asideMenuToggle.addEventListener('click',handleAsideMenu);

        asideNavLinks.forEach(link => {
            const dataQuery = link.dataset.query.trim();
            const dataText = link.dataset.text.trim();
            if(dataQuery === queryText) link.classList.add('active');
            if(link.classList.contains('active')) headerTasksTitle.innerText = dataText;
        })

        //Profile
        const profileToggle = document.querySelector('.main-header .profile');
        const profileDropdown = profileToggle.querySelector('.dropdown-profile');

        function handleProfile() {
            profileDropdown.classList.toggle('active');
        }

        profileToggle.addEventListener('click',handleProfile)
    }
    
}