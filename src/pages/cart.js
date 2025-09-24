import Header from "../components/header";

export default function renderCartPage(){

    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);
    
    const divRoot = document.getElementById('root')
    divRoot.innerHTML = '';

    const header = Header();
    header.appendChild(cabecalho);

    const footer = Footer();
    rodape.appendChild(footer);
    

}