;(function($){

  var btnMenu = $('#btn-menu'),
      menu = $('.header__menu'),
      header = $('.header'),
      navegador ='desktop'
      loc = location,
      main_url = loc.protocol + "//" + loc.host + "/zonaalta/";
     

    


      btnMenu.on('click', function(){

          header.toggleClass('header--active');


      });

    
    
    //SCROLL WINDOW FUNCTIONALITY

    $(window).scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('.header').addClass("header--fixed");
          } else {
              $('.header').removeClass("header--fixed");
          }
      });

    //  FUNCTION RESIZE BROWSER
     resize(); 
    $(window).resize(resize);

    function resize () {
         var slider = $('.main__slider__slide');

      
        slider.height(getWindowHeight());

        if($(window).width() < 1024){
          navegador = 'mobile';

        }else
        {
          navegador ='desktop';
          header.addClass('header--active');
        }

      } 


    // radio player 
    
    window.soundManager = new SoundManager();

    // Configure soundManager
    soundManager.setup({
      debugMode: false,
      flashLoadTimeout: 0,
      flashVersion: 9,
      preferFlash: false,
      url: main_url + "wp-content/themes/zonaalta/radio/swf/",
      useHighPerformance: true,
      waitForWindowLoad: false,
      onready: function() {
        soundManager.createSound({
          id: "webradio",
          url: [{
            type: "audio/mpeg",
            url: "http://stereo.wavestreamer.com:7667/1/;stream/"
            

          }],
          autoLoad: ( navegador != "desktop" ) ? false : true,
          autoPlay: ( navegador != "desktop" ) ? false : true,
          multiShot: false,
          onconnect: function( bConnect ) {
            setButtonStop();          },
          onfailure: function() {
            setButtonError();           },
          onload: function( bSuccess ) {
            if( bSuccess == true ) {
              setButtonStop();            } else {
              setButtonError();             }
          },
          onplay: function() {
            setButtonPreloader();                     }
        });
      },
      ontimeout: function() {
                 //setButtonError();
              }
    });

    // Define the buttons
    function setButtonError() {
      $( "#sm-button" ).attr( "src", main_url +"wp-content/themes/zonaalta/img/play.png" ).attr( "alt", "Error" );
      ga( "send", "event", { eventCategory: "Player", eventAction: "Error" } );
      // logStreamError( "46592", "desktop" );
    }
    function setButtonFlash() {
      $( "#sm-button" ).attr( "src", "http://cdn.radiosfm.org/images/button-get-flash-player.png" ).attr( "alt", "Flash" ).attr( "style", "width:160px !important; height:41px !important;" );
    }
    function setButtonPlay() {
      $( "#sm-button" ).attr( "src", main_url +"wp-content/themes/zonaalta/img/play.png" ).attr( "alt", "Sonar" );
    }
    function setButtonPreloader() {
      $( "#sm-button" ).attr( "src", main_url +"wp-content/themes/zonaalta/img/preloader.gif" ).attr( "alt", "Cargando..." );
    }
    function setButtonStop() {
      $( "#sm-button" ).attr( "src", main_url +"wp-content/themes/zonaalta/img/pause.png" ).attr( "alt", "Parar" );
    }

    // Set the controls
    $( "#sm-button" ).on( "click", function() {

      if ( $( this ).attr( "alt" ) == "Flash" ) {
        window.open( 'http://www.adobe.com/go/getflashplayer' );
      } else if ( $( this ).attr( "alt" ) == "Sonar" ) {
        setButtonStop();
        soundManager.play( "webradio" ); //( navegador != "desktop" ) ? soundManager.play( "webradio" ) : soundManager.unmute( "webradio" );
      } else if ( $( this ).attr( "alt" ) == "Inicio" ) {
        setButtonPreloader();
        ( navegador != "desktop" ) ? soundManager.play( "webradio" ) : '';
      } else if ( $( this ).attr( "alt" ) == "Parar" ) {
        setButtonPlay();
        soundManager.unload( "webradio" ); //( navegador != "desktop" ) ? soundManager.unload( "webradio" ) : soundManager.mute( "webradio" );
      }
    });   





})(jQuery);

function getScrollerWidth() {
  var scr = null;
  var inn = null;
  var wNoScroll = 0;
  var wScroll = 0;

  // Outer scrolling div
  scr = document.createElement('div');
  scr.style.position = 'absolute';
  scr.style.top = '-1000px';
  scr.style.left = '-1000px';
  scr.style.width = '100px';
  scr.style.height = '50px';
  // Start with no scrollbar
  scr.style.overflow = 'hidden';

  // Inner content div
  inn = document.createElement('div');
  inn.style.width = '100%';
  inn.style.height = '200px';

  // Put the inner div in the scrolling div
  scr.appendChild(inn);
  // Append the scrolling div to the doc
  document.body.appendChild(scr);

  // Width of the inner div sans scrollbar
  wNoScroll = inn.offsetWidth;
  // Add the scrollbar
  scr.style.overflow = 'auto';
  // Width of the inner div width scrollbar
  wScroll = inn.offsetWidth;

  // Remove the scrolling div from the doc
  document.body.removeChild(
    document.body.lastChild);

  // Pixel width of the scroller
  return (wNoScroll - wScroll);
}

function getWindowHeight() {
  var windowHeight=0;
  if (typeof(window.innerHeight)=='number') {
    windowHeight=window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight=document.body.clientHeight;
      }
    }
  }
  return windowHeight;
}

function getWindowWidth() {
  var windowWidth=0;
  if (typeof(window.innerWidth)=='number') {
    windowWidth=window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth=document.body.clientWidth;
      }
    }
  }
  return windowWidth;
}