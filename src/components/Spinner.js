export default function Spinner(message = "Carregando...") {
    const spinnerContainer = document.createElement('div');
    spinnerContainer.id = 'loadingSpinner';
    spinnerContainer.className = 'spinner-overlay';
    
    spinnerContainer.innerHTML = `
        <div class="spinner-content text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">${message}</p>
        </div>
    `;

    let showAt = 0;
    const MIN_VISIBLE_MS = 500; // garante que o spinner apareça perceptivelmente

    const show = () => {
        showAt = performance.now();
        if (!document.body.contains(spinnerContainer)) {
            document.body.appendChild(spinnerContainer);
        }
    };

    const hide = () => {
        const elapsed = performance.now() - showAt;
        const delay = Math.max(0, MIN_VISIBLE_MS - elapsed);
        setTimeout(() => {
            if (document.body.contains(spinnerContainer)) {
                document.body.removeChild(spinnerContainer);
            }
        }, delay);
    };

    return { show, hide, element: spinnerContainer };
}

