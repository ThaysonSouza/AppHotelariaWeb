export default function NavBar() {
    const navbar = document.createElement('div');
    navbar.className = "navbarTop"
    navbar.innerHTML = 
    `
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">
            <img src="public/assets/images/logoPreta.png" style = "width: 70px; height: 70px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Quartos</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Serviços
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Reservas</a></li>
                    <li><a class="dropdown-item" href="#">Solicitações</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Contato</a></li>
                </ul>
                </li>
 
                <li class="nav-item">
                <a class="nav-link" href="register">Cadastre-se</a>
                </li>
 
                <li class="nav-item">
                <a class="nav-link" href="register-room">Cadastrar Quarto</a>
                </li>
 
                <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
                </li>
            </ul>

            <a class="nav-link" href="cart">
                <i class="bi bi-cart fs-3 me-4"></i>
            </a>

            </div>
        </div>
    </nav>
    `;

    return navbar;
}