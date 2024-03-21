


 const langEl = document.querySelector('.langWrap')
 const link = document.querySelectorAll('.trad')
 const title1El = document.querySelector('.title1')
 const subt1El = document.querySelector('.subtitle1')
 const cadrEl = document.querySelector('.cadre')
 const cadr2El = document.querySelector('.cadre2')
 const lundEl = document.querySelector('.lundi')
 const mardEl = document.querySelector('.mardi')
 const mercredEl = document.querySelector('.mercredi')
 const jeudEl = document.querySelector('.jeudi')
 const vendEl = document.querySelector('.vendredi')
 const samedEl = document.querySelector('.samedi')
 const dimEl = document.querySelector('.dimanche')
 const closEl = document.querySelector(".close")
 const tar1El = document.querySelector('.tarif1')
 const tar2El = document.querySelector('.tarif2')
 const tar3El = document.querySelector('.tarif3')
 const frEl = document.querySelector('.free')
 const title2El = document.querySelector('.title2')
 const subt2El = document.querySelector('.subtitle2')
 const menuEl = document.querySelector('.menu')
 const reduirEl = document.querySelector('.reduire')
 const homEl = document.querySelector('.home')
 const infoEl = document.querySelector('.info')
 const expoEl = document.querySelector('.expo')
 const artEl = document.querySelector('.artist')
 const workEl = document.querySelector('.work')
 const mentionEl = document.querySelector('.mention')

 link.forEach(el => {
   el.addEventListener('click', () => {
    langEl.querySelector('.active').classList.remove('active');
    el.classList.add('active');
    const attr = el.getAttribute('language');
        updateElementText(title1El, data[attr].title1);
        updateElementText(subt1El, data[attr].subtitle1);
        updateElementText(cadrEl, data[attr].cadre);
        updateElementText(cadr2El, data[attr].cadre2);
        updateElementText(lundEl, data[attr].lundi);
        updateElementText(mardEl, data[attr].mardi);
        updateElementText(mercredEl, data[attr].mercredi);
        updateElementText(jeudEl, data[attr].jeudi);
        updateElementText(vendEl, data[attr].vendredi);
        updateElementText(samedEl, data[attr].samedi);
        updateElementText(dimEl, data[attr].dimanche);
        updateElementText(closEl, data[attr].close);
        updateElementText(tar1El, data[attr].tarif1);
        updateElementText(tar2El, data[attr].tarif2);
        updateElementText(tar3El, data[attr].tarif3);
        updateElementText(frEl, data[attr].free);
        updateElementText(title2El, data[attr].title2);
        updateElementText(subt2El, data[attr].subtitle2);
        updateElementText(menuEl, data[attr].menu);
        updateElementText(reduirEl, data[attr].reduire);
        updateElementText(homEl, data[attr].home);
        updateElementText(infoEl, data[attr].info);
        updateElementText(expoEl, data[attr].expo);
        updateElementText(artEl, data[attr].artist);
        updateElementText(workEl, data[attr].work);
        updateElementText(mentionEl, data[attr].mention);
   })
 }) 
 function updateElementText(element, text) {
    if (element) {
        element.textContent = text;
    }
}
 
  let data = {
    "french":
    {
      "title1": "- Nous trouver -",
      "subtitle1": "Au sein de la ville de Blois...",
      "cadre": "Visite",
      "cadre2": "Horaires, accès et tarifs",
      "lundi": "Lundi",
      "mardi": "Mardi",
      "mercredi": "Mercredi",
      "jeudi": "Jeudi",
      "vendredi": "Vendredi",
      "samedi": "Samedi",
      "dimanche": "Dimanche",
      "close": "Fermé",
      "tarif1": "Plein tarif",
      "tarif2": "Tarif réduit",
      "tarif3": "- de 18 ans",
      "free": "Gratuit",
      "title2": "- Nos artistes -",
      "subtitle2": "Et leurs oeuvres",
      "menu": "Menu",
      "reduire": "Reduire",
      "home": "Accueil",
      "info": "Infos pratiques",
      "expo": "Les expositions",
      "artist": "Artistes",
      "work": "Oeuvres",
      "mention": "Mentions légales"
    },
    "english":
    {
      "title1": "- Find us -",
      "subtitle1": "Within the city of Blois...",
      "cadre": "Visit",
      "cadre2": "Schedules, access and prices",
      "lundi": "Monday",
      "mardi": "Tuesday",
      "mercredi": "Wednesday",
      "jeudi": "Thursday",
      "vendredi": "Friday",
      "samedi": "Saturday",
      "dimanche": "Sunday",
      "close": "Closed",
      "tarif1": "Full price",
      "tarif2": "Reduced price",
      "tarif3": "-  18 years old",
      "free": "Free",
      "title2": "- Our artists -",
      "subtitle2": "And their works",
      "menu": "Menu",
      "reduire": "Close",
      "home": "Home",
      "info": "Practical information",
      "expo": "Expositions",
      "artist": "Artists",
      "work": "Works",
      "mention": "Legal Notice"
    },
    "deutsh":
    {
      "title1": "- Finde us -",
      "subtitle1": "Innerhalb der Stadt Blois...",
      "cadre": "Besuchen",
      "cadre2": "Fahrpläne, Zugang und Preise",
      "lundi": "Montag",
      "mardi": "Dienstag",
      "mercredi": "Mittwoch",
      "jeudi": "Donnerstag",
      "vendredi": "Freitag",
      "samedi": "Samstag",
      "dimanche": "Sonntag",
      "close": "Geschlossen",
      "tarif1": "Voller Preis",
      "tarif2": "Reduzierter Preis",
      "tarif3": "-  18 Jahre alt",
      "free": "frei",
      "title2": "- unsere Künstler -",
      "subtitle2": "Und ihre Werke",
      "menu": "Speisekarte",
      "reduire": "Schließen",
      "home": "Startseite",
      "info": "Praktische Information",
      "expo": "Ausstellungen",
      "artist": "Künstler",
      "work": "Kunstwerk",
      "mention": "Impressum"
    },
    "russian":
    {
      "title1": "- Найди нас -",
      "subtitle1": "В городе Blois...",
      "cadre": "Visit",
      "cadre2": "Расписание, доступ и цены",
      "lundi": "понедельник",
      "mardi": "вторник",
      "mercredi": "Среда",
      "jeudi": "Четверг",
      "vendredi": "Четверг",
      "samedi": "Суббота",
      "dimanche": "Воскресенье",
      "close": "закрывать",
      "tarif1": "Полная стоимость",
      "tarif2": "Уменьшенный",
      "tarif3": "-  18 лет",
      "free": "бесплатно",
      "title2": "- наши художники -",
      "subtitle2": "и их работы",
      "menu": "Меню",
      "reduire": "Закрывать",
      "home": "Добро пожаловать",
      "info": "Практическая информация",
      "expo": "Выставки",
      "artist": "Художники",
      "work": "Работает",
      "mention": "Официальное уведомление"
    },
    "chinese":
    {
      "title1": "- 找到我们 -",
      "subtitle1": "Blois 市内",
      "cadre": "访问",
      "cadre2": "时间表、访问和价格",
      "lundi": "周一",
      "mardi": "周二",
      "mercredi": "周三",
      "jeudi": "周四",
      "vendredi": "星期五",
      "samedi": "周六",
      "dimanche": "星期日",
      "close": "关闭",
      "tarif1": "全价",
      "tarif2": "减价",
      "tarif3": "-  18岁",
      "free": "自由的",
      "title2": "- 我们的艺术家  -",
      "subtitle2": "以及他们的作品",
      "menu": "菜单",
      "reduire": "关闭",
      "home": "欢迎",
      "info": "实用信息",
      "expo": "展览",
      "artist": "艺术家",
      "work": "作品",
      "mention": "法律声明"
    },
  } 
   
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
function selectLang() {
    document.getElementById('select_lang').submit();
}