import renderLoginPage from './pages/login.js';
import renderRegisterPage from './pages/register.js';

const currentPage = window.location.pathname.split('/').pop();

if (currentPage === 'login.html') {
    renderLoginPage();
} else if (currentPage === 'register.html') {
    renderRegisterPage();
}
