  
/*   link.forEach(el => {
    el.addEventListener('click', () => {
     langEl.querySelector('.active').classList.remove('active');
     el.classList.add('active');})
    });
     */
/*   function changeLang() {
    document.getElementById('form_lang').submit();
}
 */
/* function selectLang() {
    document.getElementById('select_lang').submit();
} */

function changeLang(lang) {
    // Mettre à jour l'URL avec la nouvelle langue sélectionnée
    var currentUrl = window.location.href;
    var newUrl;

    if (currentUrl.indexOf('?') !== -1) {
        newUrl = currentUrl.replace(/lang=\w\w/g, 'lang=' + lang);
    } else {
        newUrl = currentUrl + '?lang=' + lang;
    }

    // Recharger la page avec la nouvelle URL
    window.location.href = newUrl;
}