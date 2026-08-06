let searchDebounceTimer;

function triggerSearchFocus() {
    const searchBox = document.getElementById('searchBoxAnimated');
    const input = document.getElementById('globalSearchInput');
    searchBox.classList.add('active');
    input.focus();
}

// Close search if clicked outside
document.addEventListener('click', function(e) {
    const searchBox = document.getElementById('searchBoxAnimated');
    const dropdown = document.getElementById('searchResultsDropdown');
    
    if (searchBox && dropdown) {
        if (!searchBox.contains(e.target) && !dropdown.contains(e.target)) {
            searchBox.classList.remove('active');
            dropdown.style.display = 'none';
        }
    }
});

function handleGlobalAjaxSearch(e) {
    const keyword = e.target.value.trim();
    const dropdown = document.getElementById('searchResultsDropdown');
    
    if (keyword.length < 2) {
        dropdown.style.display = 'none';
        return;
    }
    
    clearTimeout(searchDebounceTimer);
    
    dropdown.style.display = 'block';
    dropdown.innerHTML = '<div class="search-loading">Mencari...</div>';
    
    searchDebounceTimer = setTimeout(() => {
        // Prepare form data
        const formData = new URLSearchParams();
        formData.append('action', 'live_search');
        formData.append('keyword', keyword);
        
        // Fetch request using URL from wp_localize_script
        fetch(temaKustomData.ajaxurl, {
            method: 'POST',
            body: formData,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.length > 0) {
                let html = '';
                data.data.forEach(item => {
                    html += `
                        <a href="${item.url}" class="search-result-item">
                            <div class="search-result-title">${item.title}</div>
                            <div class="search-result-desc">${item.desc}</div>
                        </a>
                    `;
                });
                dropdown.innerHTML = html;
            } else {
                dropdown.innerHTML = '<div class="search-no-results">Tidak ada hasil ditemukan.</div>';
            }
        })
        .catch(err => {
            dropdown.innerHTML = '<div class="search-no-results">Terjadi kesalahan, coba lagi.</div>';
        });
    }, 400); // 400ms debounce
}
