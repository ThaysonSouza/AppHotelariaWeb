import Navbar from "../components/NavBar.js";
import Footer from "../components/Footer.js";
import Grid from "../components/grid.js";

export default function renderCarPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';

    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    const grid = Grid();
    grid.style.marginTop = '10%';
    divRoot.appendChild(grid);


    const foot = document.getElementById('rodape');
    foot.innerHTML = '';
        
    const footer = Footer();
    foot.appendChild(footer);
}