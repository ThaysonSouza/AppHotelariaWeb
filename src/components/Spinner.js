export default function Spinner(message = "Carregando...") {
    const spinnerContainer = document.createElement('div');
    spinnerContainer.id = 'loadingSpinner';
    spinnerContainer.className = 'spinner-overlay';
    
    spinnerContainer.innerHTML = `
        <div class="text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">${message}</p>
        </div>
    `;

    const show = () => {
        document.body.appendChild(spinnerContainer);
    };

    const hide = () => {
        if (document.body.contains(spinnerContainer)) {
            document.body.removeChild(spinnerContainer);
        }
    };

    return { show, hide, element: spinnerContainer };
}

