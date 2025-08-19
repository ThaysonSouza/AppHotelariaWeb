export default function LoginForm() {
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    // Cria o container do card
    const container = document.createElement('div');
    container.className = 'card p-4 shadow-lg';
    container.style.width = '100%';
    container.style.maxWidth = '400px';
    divRoot.appendChild(container);

    // Adiciona o título
    const titulo = document.createElement('h1');
    titulo.textContent = 'Faça login';
    titulo.className = 'titulo text-center mb-4';
    container.appendChild(titulo);

    // Cria o formulário
    const formulario = document.createElement('form');
    formulario.className = 'd-flex flex-column';

    // Campo de email
    const email = document.createElement('input');
    email.type = 'email';
    email.placeholder = "Digite seu e-mail";
    email.className = 'form-control mb-3';
    formulario.appendChild(email);

    // Campo de senha
    const password = document.createElement('input');
    password.type = 'password';
    password.placeholder = "Digite sua senha";
    password.className = 'form-control mb-3';
    formulario.appendChild(password);

    // Botão de submit
    const btn = document.createElement('button');
    btn.type = 'submit';
    btn.textContent = "Entrar";
    btn.className = 'btn btn-primary';

    formulario.appendChild(btn);
    container.appendChild(formulario);

    return container; // Retorna o container com todo o conteúdo
}
