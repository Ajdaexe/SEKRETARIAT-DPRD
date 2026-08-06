js_code = """
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
"""

with open(r'd:\APP\xampp2\htdocs\sekretariat-dprd\wp-content\themes\dprd-purbalingga\script.js', 'a', encoding='utf-8') as f:
    f.write("\n" + js_code)
