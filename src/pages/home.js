import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import Footer from "../components/footer.js";

export default function renderHomePage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root')
    root.innerHTML = '';

    const hero = Hero();
    divRoot.appendChild(hero);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);
    

}