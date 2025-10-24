import Navbar from "../components/NavBar.js";
import Footer from "../components/Footer.js";
import LoginForm from "../components/loginForm.js";

export default function renderRegisterRoomPage() {
    const root = document.getElementById('main-content');
    root.innerHTML = '';

    // Navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    nav.appendChild(Navbar());

    // Título
    const title = document.createElement('h2');
    title.textContent = 'Cadastrar Novo Quarto';
    title.className = 'text-center mt-4 mb-3';

    // Formulário
    const formulario = LoginForm();
    

    // Adiciona ao root
    root.appendChild(title);
    root.appendChild(formulario);

    // Footer
    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    rodape.appendChild(Footer());
}
