// Buy dropdown - toggle on click with hover delay for smooth submenu access
const buyDropdown = document.getElementById('buyDropdown');
let hoverTimeout;
if (buyDropdown) {
    const buyBtn = buyDropdown.querySelector('.buy-btn');
    const categoryItems = buyDropdown.querySelectorAll('.category-item');
    const dropdownMenu = buyDropdown.querySelector('.buy-dropdown-menu');

    buyBtn?.addEventListener('click', function(e) {
        e.preventDefault();
        buyDropdown.classList.toggle('open');
    });

    categoryItems.forEach(item => {
        const label = item.querySelector('.category-label');
        const submenu = item.querySelector('.subcategory-menu');

        label?.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            item.classList.toggle('open');
        });

        item.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            item.classList.add('open');
        });

        item.addEventListener('mouseleave', () => {
            hoverTimeout = setTimeout(() => item.classList.remove('open'), 200);
        });

        submenu?.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            item.classList.add('open');
        });

        submenu?.addEventListener('mouseleave', () => {
            hoverTimeout = setTimeout(() => item.classList.remove('open'), 150);
        });
    });

    dropdownMenu?.addEventListener('mouseleave', () => {
        hoverTimeout = setTimeout(() => {
            categoryItems.forEach(i => i.classList.remove('open'));
        }, 150);
    });

    dropdownMenu?.addEventListener('mouseenter', () => {
        clearTimeout(hoverTimeout);
    });

    document.addEventListener('click', e => {
        if (!buyDropdown.contains(e.target)) {
            clearTimeout(hoverTimeout);
            buyDropdown.classList.remove('open');
            categoryItems.forEach(i => i.classList.remove('open'));
        }
    });
}
