const page = document.body.dataset.page || 'beranda';

// Modals
document.querySelectorAll('[data-modal-open]').forEach(el => 
    el.addEventListener('click', () => {
        const modal = document.getElementById(el.dataset.modalOpen);
        if(modal) modal.showModal();
    })
);

document.querySelectorAll('[data-modal-close]').forEach(el => 
    el.addEventListener('click', () => el.closest('dialog')?.close())
);

// Menu Toggle (Mobile)
const menuBtn = document.getElementById('menuBtn');
const navLinks = document.getElementById('navLinks');
if(menuBtn && navLinks) {
    menuBtn.addEventListener('click', () => navLinks.classList.toggle('open'));
}

// Dropdown Toggle (Mobile)
document.querySelectorAll('.dropdown > a').forEach(a => 
    a.addEventListener('click', e => {
        if(innerWidth <= 980){
            e.preventDefault();
            a.parentElement.classList.toggle('open');
        }
    })
);

// Toast Function
window.showToast = function(msg){
    document.querySelector('.toast')?.remove();
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    document.body.append(t);
    setTimeout(() => t.remove(), 3200);
}

document.querySelectorAll('[data-toast]').forEach(el => 
    el.addEventListener('click', () => showToast(el.dataset.toast))
);

// Intersection Observer (Scroll Reveal)
const io = new IntersectionObserver(es => 
    es.forEach(e => {
        if(e.isIntersecting) e.target.classList.add('show');
    }), {threshold: .08}
);

document.querySelectorAll('.reveal').forEach(el => io.observe(el));

// Client-side filtering logic for documents (if tables are rendered by WP)
document.addEventListener('DOMContentLoaded', () => {
    // PPID Filter
    const ppidSearch = document.getElementById('ppidSearch');
    const filterButtons = document.querySelectorAll('.filter-tabs button');
    
    if (filterButtons.length > 0) {
        filterButtons.forEach(b => {
            b.addEventListener('click', () => {
                document.querySelectorAll('.filter-tabs button').forEach(x => x.classList.remove('active'));
                b.classList.add('active');
                filterTable('ppidTable', ppidSearch?.value || '', b.dataset.filter);
            });
        });
    }

    if (ppidSearch) {
        ppidSearch.addEventListener('input', () => {
            const activeFilterBtn = document.querySelector('.filter-tabs button.active');
            const cat = activeFilterBtn ? activeFilterBtn.dataset.filter : 'all';
            filterTable('ppidTable', ppidSearch.value, cat);
        });
    }

    // SAKIP Filter
    const sakipSearch = document.getElementById('sakipSearch');
    const sakipCategory = document.getElementById('sakipCategory');

    const updateSakip = () => {
        filterTable('sakipTable', sakipSearch?.value || '', sakipCategory?.value || 'all');
    };

    if (sakipSearch) sakipSearch.addEventListener('input', updateSakip);
    if (sakipCategory) sakipCategory.addEventListener('change', updateSakip);

    // Generic Table Filter Function
    function filterTable(tableId, query, category) {
        const tbody = document.getElementById(tableId);
        if (!tbody) return;
        const rows = tbody.querySelectorAll('tr');
        query = query.toLowerCase();
        
        let hasVisible = false;
        rows.forEach(row => {
            if (row.classList.contains('no-results')) return; // skip placeholder
            
            const title = row.querySelector('strong')?.textContent.toLowerCase() || '';
            const rowCat = row.dataset.category || 'all';
            
            const matchesQuery = title.includes(query);
            const matchesCat = (category === 'all' || rowCat === category);
            
            if (matchesQuery && matchesCat) {
                row.style.display = '';
                hasVisible = true;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Show/hide no results row
        const noResults = tbody.querySelector('.no-results');
        if (noResults) {
            noResults.style.display = hasVisible ? 'none' : '';
        }
    }
});


// Nav Active State Enforcer
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('header nav a');
    if (!navLinks.length) return;
    
    // Reset any server-side active class just in case it's wrong
    navLinks.forEach(link => link.classList.remove('active'));
    
    const path = window.location.pathname.toLowerCase();
    
    if (path.includes('profil') || path.includes('profile')) {
        if(navLinks[1]) navLinks[1].classList.add('active');
    } else if (path.includes('kontak')) {
        if(navLinks[2]) navLinks[2].classList.add('active');
    } else if (path.includes('ppid')) {
        if(navLinks[3]) navLinks[3].classList.add('active');
    } else if (path.includes('sakip')) {
        if(navLinks[4]) navLinks[4].classList.add('active');
    } else if (path.includes('dlantunan')) {
        if(navLinks[5]) navLinks[5].classList.add('active');
    } else {
        if(navLinks[0]) navLinks[0].classList.add('active');
    }
});
