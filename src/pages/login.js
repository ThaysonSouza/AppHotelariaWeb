import LoginForm from "../components/loginForm.js";

export default function rederLoginPage() {
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = "";

    const formulario = LoginForm ();
    divRoot.appendChild(formulario);

}