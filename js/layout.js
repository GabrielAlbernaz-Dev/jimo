export default function initLayout(app,header) {
    if(app) {
        const headerHeight = header.offsetHeight;
        app.style.height = `calc(100vh - ${headerHeight}px)`
    }
}