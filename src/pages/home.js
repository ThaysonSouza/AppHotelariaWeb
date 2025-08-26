import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";

export default function renderHomePage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root')
    root.innerHTML = '';

    const hero = Hero();
    divRoot.appendChild(hero);

}