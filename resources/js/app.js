const JS_THRESHOLD = 15;

document.addEventListener('DOMContentLoaded', () => {
    // 1. Умовне показування поля "Обґрунтування"
    const urgent = document.querySelector('input[name="urgent"]');
    const block = document.getElementById('justification-block');

    if (urgent && block) {
        const toggle = () => {
            block.style.display = urgent.checked ? 'block' : 'none';
        };
        urgent.addEventListener('change', toggle);
        toggle();
    }

    // 2. Лічильник символів для поля "justification"
    const justification = document.querySelector('textarea[name="justification"]');
    if (justification) {
        const counter = document.createElement('p');
        counter.className = 'char-counter';
        justification.parentNode.appendChild(counter);

        const update = () => {
            const len = justification.value.length;
            counter.textContent = `${len} символів (мін. ${JS_THRESHOLD})`;
            counter.classList.toggle('warning', len < JS_THRESHOLD);
        };

        justification.addEventListener('input', update);
        update();
    }
});
