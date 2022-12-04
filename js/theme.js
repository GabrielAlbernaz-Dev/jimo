export default function initThemes() {
    const btnToggleTheme = document.querySelector('.main-header .switch');
    const html  = document.documentElement;
    const switchInput = document.querySelector('.main-header .switch input');
    const storageThemeColor = localStorage.getItem('themeColor');

    function handleSwitch() {
        html.classList.toggle('dark');

        if(html.classList.contains('dark')) localStorage.setItem('themeColor','dark');
        else localStorage.removeItem('themeColor');
    }

    window.addEventListener('load',()=> {
        if(storageThemeColor) {
            html.classList.add('dark');
            switchInput.checked = true;
        };
    });


    btnToggleTheme.addEventListener('change', handleSwitch);
    
}