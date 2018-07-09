$(document).ready(function () {

    var relativePosition = 0;
    var range = new Number(3);
    var fadeSpeed = 800;
    var clickDisabled = false;
    var anzahlArtikelImSlider = new Number(document.getElementById("numberOfRandomArticles").value);

    /*
    $(window).resize(function () {
        if ($(window).width() < 768) {
            range = 2;
        }
        else if ($(window).width() < 500) {
            range = 1;
        }
        else {
            range = 3;
        }
    });
    */
    //QUelle: http://www.chrisbuttery.com/articles/fade-in-fade-out-with-javascript/
    function fadeOut(el){
        el.style.opacity = 1;

        (function fade() {
            if ((el.style.opacity -= .8) < 0) {
                el.style.display = "none";
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }

// fade in

    function fadeIn(el, display){
        el.style.opacity = 0;
        el.style.display = display || "block";

        (function fade() {
            var val = parseFloat(el.style.opacity);
            if (!((val += .1) > 1)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }
 /////Ende der Quelle: http://www.chrisbuttery.com/articles/fade-in-fade-out-with-javascript/

    //Initialisierung der benötigten Elemente für den Slider
    var articles = $(".randomArticle");
    var slots = $(".randomArticleSlot");

    slots[0].appendChild(articles[0]);
    slots[1].appendChild(articles[1]);
    slots[2].appendChild(articles[2]);

    for (i=range; i< anzahlArtikelImSlider  ;i++){
        articles[i].remove();
    }

    for (i=0; i< range  ;i++){
        articles[i].style.display = "block";
    }

    //Die eigentliche Funktionalität hinter dem Slider
    //slotNr: Gibt an in welchem randomArticleSlot der Artikel angezeigt werden soll
    //richtung: je nachdem ob der "linke" oder "rechte" Knopf gedrückt wird, muss der Slider andere Operationen durchführen

    function switchArticle(slotNr,richtung){
            fadeOut(slots[slotNr]);
            slots[slotNr].removeChild( articles[(relativePosition + slotNr) % anzahlArtikelImSlider]);
            slots[slotNr].appendChild( articles[(relativePosition + slotNr + richtung*range +anzahlArtikelImSlider) % anzahlArtikelImSlider]);
            fadeIn(slots[slotNr]);
    }

    //Blockt die Klick-funktionalität, damit es keine Probleme mit der Variable 'relativePosition' gibt.
    function isClickDisabled(){
        if (clickDisabled){
            return 1;
        }else{
            clickDisabled = true;
            setTimeout(function(){clickDisabled = false;}, 300);
            return 0;
        }
    }

    function displayArticles(richtung){

        var x = new Number(richtung);
        switchArticle(0,x);

        setTimeout(function () {
            switchArticle(1, x);
        }, 100);

        setTimeout(function () {
            switchArticle(2, x);
            relativePosition = (relativePosition + x*range +anzahlArtikelImSlider) % anzahlArtikelImSlider;
        }, 200);
    }

    $("#rightArrow").click(function () {

        if (isClickDisabled()){
            return ;
        }

        displayArticles(1);
    });

    $("#leftArrow").click(function () {

        if (isClickDisabled()){
            return ;
        }

        displayArticles(-1);
    });
})