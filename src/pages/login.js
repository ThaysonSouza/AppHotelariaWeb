import { loginRequest } from "../api/authAPI.js";
import LoginForm from "../components/loginForm.js";
import Navbar from "../components/Navbar.js";

export default function renderLoginPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const formulario = LoginForm();
    formulario.appendChild(btnVoltar);

    //Pegando inputs e botao do form(email, senha e submit)
    const contentForm =  formulario.querySelector('form');
    const inputEmail = contentForm.querySelector('input["type=email"]');
    const inputSenha = contentForm.querySelector('input["type=password"]');
    const bnt = contentForm.querySelector('button["type=submit"]');

    //Monitora o clique no botao para acionar um evento de submeter os dados do form
    contentForm.addEventListener("submit", async(e) => {
        e.preventDefault();
        const email = inputEmail.value.trim();
        const senha = inputSenha.value.trim();

        try{
            const result = await loginRequest(email, senha);
            console.log("login realizado com sucesso!");
            window.location.pathname = /primesite/home
        }
        catch{
            console.log("Erro inesperado!");

        }
    })


    // Adiciona o link para a página de cadastro
    const btnVoltar = document.createElement('a');
    btnVoltar.textContent = "Register";
    btnVoltar.href = "register";
    btnVoltar.className = 'btn btn-link mt-2';
    btnVoltar.style.textDecoration = 'none';

}