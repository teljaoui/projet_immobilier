const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        bulletClass: "swiper-pagination-bullet",
        bulletActiveClass: "swiper-pagination-bullet-active",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
});

const bullets = document.querySelectorAll('.swiper-pagination-bullet');
bullets.forEach(bullet => bullet.classList.add('bg-primary'));

swiper.on('slideChange', () => {
    document.querySelectorAll('.swiper-pagination-bullet').forEach((bullet, index) => {
        if (index === swiper.realIndex) {
            bullet.classList.add('bg-primary');
        } else {
            bullet.classList.remove('bg-primary');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleFilters');
    const closeButton = document.getElementById('closeFilters');
    const filterForm = document.getElementById('filterForm');
    const filterButtonText = document.getElementById('filterButtonText');
    const filterIcon = document.getElementById('filterIcon');

    function showFilters() {
        filterForm.classList.remove('hidden');
        filterForm.classList.add('animate-slideDown');
        filterButtonText.textContent = 'Masquer les filtres';
        filterIcon.classList.add('rotate-180');
    }

    function hideFilters() {
        filterForm.classList.add('hidden');
        filterForm.classList.remove('animate-slideDown');
        filterButtonText.textContent = 'Afficher les filtres';
        filterIcon.classList.remove('rotate-180');
    }

    toggleButton.addEventListener('click', function () {
        if (filterForm.classList.contains('hidden')) {
            showFilters();
        } else {
            hideFilters();
        }
    });

    closeButton.addEventListener('click', function () {
        hideFilters();
    });

    const urlParams = new URLSearchParams(window.location.search);
    const hasFilters = Array.from(urlParams.keys()).some(key =>
        ['transaction_type', 'type_id', 'city', 'price_min', 'price_max', 'surface_min', 'bedrooms_min', 'bathrooms_min', 'rooms_min'].includes(key)
    );

    if (hasFilters) {
        showFilters();
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    }
});


function getFavorites() {
    const favorites = localStorage.getItem('favorites');
    return favorites ? JSON.parse(favorites) : [];
}

function saveFavorites(favorites) {
    localStorage.setItem('favorites', JSON.stringify(favorites));
}

function isFavorite(propertyId) {
    const favorites = getFavorites();
    return favorites.some(fav => fav.id == propertyId);
}

function toggleFavorite(property) {
    let favorites = getFavorites();
    const index = favorites.findIndex(fav => fav.id == property.id);

    if (index > -1) {
        favorites.splice(index, 1);
        updateFavoriteButton(property.id, false);
        showNotification('Retiré des favoris', 'error');
    } else {
        favorites.push({
            id: property.id,
            title: property.title,
            city: property.city,
            price: property.price,
            image: property.image
        });
        updateFavoriteButton(property.id, true);
        showNotification('Ajouté aux favoris', 'success');
    }

    saveFavorites(favorites);
    updateFavoriteCount();

    if (window.location.pathname.includes('favorites')) {
        loadFavoritesPage();
    }
}

function removeFavorite(propertyId) {
    let favorites = getFavorites();
    favorites = favorites.filter(fav => fav.id != propertyId);
    saveFavorites(favorites);

    showNotification('Favori supprimé avec succès', 'error');
    loadFavoritesPage();
    updateFavoriteCount();
}

function updateFavoriteButton(propertyId, isFav) {
    const btn = document.getElementById(`favorite-btn-${propertyId}`);
    if (btn) {
        const icon = btn.querySelector('i');
        if (isFav) {
            btn.classList.remove('bg-gray-100', 'text-gray-700');
            btn.classList.add('bg-red-100', 'text-red-600');
            if (icon) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
            }
        } else {
            btn.classList.remove('bg-red-100', 'text-red-600');
            btn.classList.add('bg-gray-100', 'text-gray-700');
            if (icon) {
                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
            }
        }
    }
}

function showNotification(message, type) {
    const container = document.getElementById('alert-container');

    if (!container) {
        console.error('Conteneur d\'alertes introuvable');
        return;
    }

    const alert = document.createElement('div');
    alert.className = `${type === 'success'
            ? 'bg-green-50 border-green-500'
            : 'bg-red-50 border-red-500'
        } border-l-4 p-4 rounded  w-full flex items-center justify-between`;

    alert.innerHTML = `
        <div class="flex items-center gap-3 flex-1">
            <i class="fa-solid ${type === 'success'
            ? 'fa-check-circle text-green-500'
            : 'fa-exclamation-circle text-red-500'
        }"></i>
            <p class="${type === 'success'
            ? 'text-green-700'
            : 'text-red-700'
        } text-sm">${message}</p>
        </div>
    `;

    container.appendChild(alert);

    setTimeout(() => {
        if (alert.parentElement) {
            alert.remove();
        }
    }, 5000);
}


function updateFavoriteCount() {
    const favorites = getFavorites();
    const countElement = document.getElementById('favorite-count');
    const badgeElement = document.getElementById('favorite-badge');

    if (countElement) {
        countElement.textContent = favorites.length;
    }

    if (badgeElement) {
        badgeElement.textContent = favorites.length;
        badgeElement.style.display = favorites.length > 0 ? 'inline-block' : 'none';
    }
}

function loadFavoritesPage() {
    const favorites = getFavorites();
    const tbody = document.getElementById('favorites-tbody');
    const emptyDiv = document.getElementById('empty-favorites');
    const tableContainer = document.getElementById('favorites-table-container');
    const clearAllBtn = document.getElementById('clear-all-btn');
    const countElement = document.getElementById('favorites-count');

    if (!tbody) return;

    if (favorites.length === 0) {
        if (emptyDiv) emptyDiv.classList.remove('hidden');
        if (tableContainer) tableContainer.classList.add('hidden');
        if (clearAllBtn) clearAllBtn.classList.add('hidden');
        return;
    }

    if (emptyDiv) emptyDiv.classList.add('hidden');
    if (tableContainer) tableContainer.classList.remove('hidden');
    if (clearAllBtn) clearAllBtn.classList.remove('hidden');
    if (countElement) countElement.textContent = favorites.length;

    tbody.innerHTML = favorites.map((fav, index) => `
        <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 whitespace-nowrap text-gray-700">${index + 1}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <img src="${fav.image}" alt="${fav.title}" class="w-16 h-16 object-cover rounded-lg shadow">
            </td>
            <td class="px-6 py-4">
                <a href="bien/${fav.id}" class="font-semibold text-gray-800 hover:text-primary transtion duration-500">${fav.title}</a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fa-solid fa-location-dot text-[#ff551a]"></i>
                    <span>${fav.city}</span>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="font-bold text-[#ff551a]">${new Intl.NumberFormat('fr-FR').format(fav.price)} DH</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <button onclick="removeFavorite('${fav.id}')" 
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition inline-flex items-center gap-2">
                    <i class="fa-solid fa-trash"></i>
                    Retirer
                </button>
            </td>
        </tr>
    `).join('');
}

function clearAllFavorites() {
    if (confirm('Êtes-vous sûr de vouloir supprimer tous vos favoris ?')) {
        localStorage.removeItem('favorites');
        showNotification('Tous les favoris ont été supprimés', 'error');
        loadFavoritesPage();
        updateFavoriteCount();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    updateFavoriteCount();
    if (window.location.pathname.includes('favorites')) {
        loadFavoritesPage();
    }
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    favoriteButtons.forEach(btn => {
        const propertyId = btn.id.replace('favorite-btn-', '');
        if (isFavorite(propertyId)) {
            updateFavoriteButton(propertyId, true);
        }
    });
});


function previewMainImage(event) {
    const preview = document.getElementById('mainImagePreview');
    preview.innerHTML = '';
    
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative inline-block';
            div.innerHTML = `
                <img src="${e.target.result}" class="h-48 w-auto object-cover rounded-lg shadow-lg ring-4 ring-[#ff551a]">
                <div class="absolute top-2 left-2 bg-[#ff551a] text-white text-xs px-3 py-1 rounded-full flex items-center gap-1">
                    <i class="fa-solid fa-star"></i>
                    Image principale
                </div>
                <button type="button" onclick="removeMainImage()" 
                    class="absolute top-2 right-2 bg-white rounded-full p-2 text-red-500 hover:text-red-700 shadow-lg transition">
                    <i class="fa-solid fa-times"></i>
                </button>
            `;
            preview.appendChild(div);
        };
        
        reader.readAsDataURL(file);
    }
}

function removeMainImage() {
    const input = document.getElementById('main_image');
    input.value = '';
    document.getElementById('mainImagePreview').innerHTML = '';
}

function previewImages(event) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    const files = event.target.files;
    
    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative group';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg shadow">
                    <div class="absolute top-2 right-2 bg-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                        <button type="button" onclick="removeImage(${index})" class="text-red-500 hover:text-red-700 w-6 h-6 flex items-center justify-center">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                        Image ${index + 1}
                    </div>
                `;
                preview.appendChild(div);
            };
            
            reader.readAsDataURL(file);
        });
    }
}

function removeImage(index) {
    const input = document.getElementById('images');
    const dt = new DataTransfer();
    const files = input.files;
    
    for (let i = 0; i < files.length; i++) {
        if (i !== index) {
            dt.items.add(files[i]);
        }
    }
    
    input.files = dt.files;
    previewImages({ target: input });
}