import renderLoginPage from './pages/login.js';
import renderRegisterPage from './pages/register.js';
import renderHomePage from './pages/home.js';


//Configuração de rotas
const routes = {

    "/login": renderLoginPage,
    "/cadastro": renderRegisterPage,
    "/home": renderHomePage
    //Novas páginas aqui adicionadas conforme desenvolvidas
};

//Obtém o caminho atual a partir do hash da URL
function getPath() {
    //obetém o hash (ex. "#/login"), remove o # e tira espaços
    const url = (location.hash || "").replace(/^#/, "").trim();
    //retorna url se começar com "/", se não, retorna "/home" como padrão
    return url && url.startsWith("/") ? url : "/home"; //retorna url limpa
}

//Decide o que renderizar com base na rota atual
function renderRoutes() {
    const url = getPath(); //Lê a rota atual, ex: "/register"
    const render = routes[url] || routes["/home"]; //Busca esta rota no mapa
    render(); //Executa a funcção de render na pagina atual
}


window.addEventListener("hashchange", renderRoutes);
//Renderizaçõo
document.addEventListener('DOMContentLoaded', renderRoutes);